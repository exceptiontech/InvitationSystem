<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Admin\User;
use App\Models\TeamUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Guard;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $title_page,$type,$role_id,$role_name;
    public $showForm;
    public $showFormEdit;
    public $showDeleted;
    public $btn_kwrd;
    public $edit_object;
    protected $listeners=[
        'objectAdded'=>'refresh_results',
        'objectEdit'=>'refresh_edited'
    ];
    public function mount($type=0,$role_id=0)
    {
        $this->type=$type;
        $this->role_id=$role_id;
        $this->role_name=Role::select('name','name_ar')->find($this->role_id);
        $this->title_page=__('ms_lang.show').' : ';
        $this->title_page.= Auth::user()->user_lang=='ar'? $this->role_name->name_ar : $this->role_name->name;
        $this->showForm=false;
        $this->showFormEdit=false;
        $this->showDeleted=false;
        $this->btn_kwrd = trans('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';

    }
    public function render()
    {
        //dd(TeamUser::all());
        $results=User::with('user_role')->where('id','>',1)->whereNotNull('name')->whereRoleId($this->role_id)->orderBy('id','DESC')->paginate(50);
        //dd($results);
        return view('livewire.admin.users.users',[
            'results'=>$results,
            'title_page'=>$this->title_page
            ])->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }
    public function create_form() 
    {
        $this->showForm=!$this->showForm;
        $this->showFormEdit=false;
        if($this->btn_kwrd == __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>')
        {
            $this->title_page='Add Employees';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Employees';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function deleted()
    {
        $this->showDeleted=!$this->showDeleted;
        $this->showForm=false;
        $this->showFormEdit=false;
        if($this->showDeleted == true)
        {
            $this->title_page='Deleted Employees';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Employees';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }
    public function edit_form($id=0)
    {
        //dd($id);
        $this->showFormEdit=!$this->showFormEdit;
        $this->showForm=false;
        $edit_object = User::find($id);
        if($edit_object)
        {
            $this->emit('getObject',$edit_object);
        }

        //dd($this->edit_object);
        if($this->showFormEdit == true)
        {
            $this->title_page='Edit Employee';
            $this->btn_kwrd=__('ms_lang.btn_view_all').' <i class="icon-xl fas fa-list text-danger"></i>';
        }
        else
        {
            $this->title_page='View Employees';
            $this->btn_kwrd = __('ms_lang.btn_add_new').' <i class="icon-xl fas fa-pencil-ruler"></i>';
        }
    }

    public function refresh_results($obj)
    {
        session()->flash('success_message','successfully doing');
        $this->showForm=false;

    }

    public function refresh_edited()
    {
        session()->flash('success_message','successfully updated');
        $this->showForm=false;
        $this->showFormEdit=false;
    }

    public function active_ms($id=0)
    {
        $data= User::select('id','is_active')->find($id);
        if($data->is_active == 'Y')
        {
            $data->is_active='N';
        }
        else
        {
            $data->is_active ='Y';
        }
        $data->save();
    }

    public function assign_2role($id=0)
    {
        $user= User::find($id);
        $role= Role::first();
        // dd($id);
        // $permissions= Permission::get();
        // $role->syncPermissions($permissions);
        $user->assignRole($role->name);
        //dd(Guard::getDefaultName(static::class));
        //$role = Role::findByName('writer');
        //$user->assignRole('مدير الموقع');
        //$role->givePermissionTo('edit articles');
    }
    public function change_member_plan($id=0)
    {
        $data= User::find($id);
        if($data->change_user_type >0 )
        {
            $data->role_id=$data->change_user_type;
            $data->change_user_type=0;
            $data->is_connect='Y';
            $data->save();
            $title="تغيير العضويه";
            $mesg="عميلنا العزيز تم الموافقة علي تغيير العضويه برجاء تسجيل الدخول مره اخري";
            @sendMessage_onesignal_2app(1, $title,$mesg,@$data->profile_photo_path,'','',[],[$data->onesignal_id]);
        }
    }

    public function delete_ms($id=0)
    {
        //dd($id);
        $data= User::select('id','deleted_at')->find($id);
        if($data->deleted_at == null)
        {
            $data->deleted_at=now();
        }
        else
        {
            $data->deleted_at =null;
        }
        $data->save();
    }
}
