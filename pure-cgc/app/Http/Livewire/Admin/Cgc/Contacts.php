<?php

namespace App\Http\Livewire\Admin\Cgc;

use Livewire\Component;
use App\Models\User;
use App\Models\Category;
use App\Models\CountriesCity;
use App\Models\Role;
use App\Models\TeamUser;
use App\Models\UserCategory;
use App\Models\UsersDetail;
use Exception;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Contacts extends Component
{
    use WithPagination;

    use WithFileUploads;
    public $search = '',$search2='',$search3='';
    protected $paginationTheme = 'bootstrap';

    protected  $contacts,$groups,$category_id;
    public $name,$last_name ,$user,$category_id2;
    public $email,$update=false;
    public $mobile;
    public $profile_photo_path;
    public $role_id;
    public $member_plan;
    public $password,$edit_user;
    public $password_confirmation;
    public $edit_object,$group_id;
    public $edit_id,$country_id,$conact_id
    ,$city_id
    ,$nationality_id,$contactId
    ,$job_title
    ,$organizer,$countries
    ,$cites
    ,$notes,$step=1,$show_group_users;
    public $group_name,$group_users;

    // protected $rules = [
    //     'name' => 'required|max:200',
    //     'last_name' => 'required|max:200',
    //     'email' => 'required|string|email|max:191|unique:users,email',
    //     'mobile' => 'required|string|max:25|unique:users,mobile',
    //     'organizer' => 'required|max:200',
    //     'group_id' => 'required|max:200',
    //     'country_id' => 'required|max:200',
    //     'city_id' => 'required|max:200',
    //     'nationality_id' => 'required|max:200',
    //     'job_title' => 'required|max:200',
    // ];
    protected $listeners=[
        'getObject' => 'get_object'

    ];
    public function mount()
    {
        $this->user= User::where('role_id',1)->first();

        $this->countries= CountriesCity::where('parent_id',0)->get();


    }
    public function saveGroup()
    {

        $this->validate([
            'group_name' => 'required|string|max:255|unique:categories,name',
        ], [
            'group_name.required' => 'The group name is required.',
            'group_name.unique' => 'The group name is exist.',


        ]);

        Category::create([
            'name' => $this->group_name,
            'type'=>11
        ]);
        session()->flash('message', 'group created successfully.');
        $this->group_name='';
        $this->mount();


    }
    public function view_members($category_id)
    {
        $this->category_id2=$category_id;
        $category = Category::with('users')->findOrFail($category_id);

        $g_users = $category->users;

        $this->group_users=$g_users;
        $this->show_group_users=1;

    }
    public function view_search_members()
    {
        if ($this->search3 != '') {
            // dd('');
                $category = Category::findOrFail($this->category_id2);
                $g_users = $category->users()->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search3 . '%');
                })->get();

                $this->group_users = $g_users;

            }
            else{
                if ($this->category_id2) {
                    $category = Category::with('users')->findOrFail($this->category_id2);

                    $g_users = $category->users;

                    $this->group_users=$g_users;
                    $this->show_group_users=1;            }

            }

    }
    public function step($step_id)
    {
        $this->step=$step_id;

    }
    public function return_to_groups()
    {
        $this->show_group_users=0;
    }
    public function render()
    {

        // if ($this->search3 != '') {
        //     $category = Category::findOrFail($this->category_id2);
        //     $g_users = $category->users()->whereHas('user', function ($query) {
        //         $query->where('name', 'like', '%' . $this->search3 . '%');
        //     })->get();

        //     $this->group_users = $g_users;

        // }
        // else{
        //     if ($this->category_id2) {
        //         $category = Category::with('users')->findOrFail($this->category_id2);

        //         $g_users = $category->users;

        //         $this->group_users=$g_users;
        //         $this->show_group_users=1;            }

        // }


        // else{
        //     dd($this->category_id2);
        //     $category = Category::with('users')->findOrFail($this->category_id2);
        //     $g_users = $category->users;

        //     $this->group_users = $g_users;

        // }

        $this->contacts = User::with('user_detail')->where('role_id', 1)
        ->where(function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('mobile', 'like', '%' . $this->search . '%');
        })
        ->paginate(9);
        if ($this->country_id) {
            $this->cites= CountriesCity::where('parent_id',$this->country_id)->get();
        }
        // $this->groups= Category::where('type',11)->get();
        $this->groups = Category::where('type', 11)
        ->where(function($query) {
            $query->where('name', 'like', '%' . $this->search2 . '%');
        })
        ->paginate(8);

        return view('livewire.admin.cgc.contacts',
        [
            'contacts'=>$this->contacts,
            'groups'=>$this->groups,
            // dd($contacts)

        ])->extends('admin.layouts.app',['script_editor'=>true,'script_datatables'=>true]);
    }
    public function takeId2($id)
    {
        $this->conact_id = $id;
        $this->step=1;
        $this->edit_user=User::where('role_id',1)->find($id);
        $this->loadContact($id);

    }


    public function takeId($id)
    {
        $this->conact_id = $id;


    }
    public function deletecontact()
    {
        User::find($this->conact_id)->delete();
        $this->mount();
        session()->flash('message', 'contact deleted successfully.');

    }
    public function showDetails($userId)
    {
        // Fetch user details based on $userId
        $this->user = User::with('user_detail')->findOrFail($userId); // Adjust this based on your User model setup
        // dd($this->user);
    }
    public function saveContact()
    {

        // dd();
        $this->validate([
            'name' => 'required|max:200',
            'last_name' => 'required|max:200',
            'email' => 'required|string|email|max:191|unique:users,email',
            'mobile' => 'required|string|max:25|unique:users,mobile',
            'organizer' => 'required|max:200',
            'group_id' => 'required|max:200',
            'country_id' => 'required|max:200',
            'city_id' => 'required|max:200',
            'nationality_id' => 'required|max:200',
            'job_title' => 'required|max:200',
        ], [
            'name.required' => 'The first name is required.',
            'name.max' => 'The first name cannot exceed 200 characters.',
            'last_name.required' => 'The last name is required.',
            'last_name.max' => 'The last name cannot exceed 200 characters.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email.',
            'email.max' => 'The email address cannot exceed 191 characters.',
            'email.unique' => 'The email address has already been taken.',
            'mobile.required' => 'The phone number is required.',
            'mobile.max' => 'The phone number cannot exceed 25 characters.',
            'mobile.unique' => 'The phone number has already been taken.',
            'organizer.required' => 'The organization/company name is required.',
            'organizer.max' => 'The organization/company name cannot exceed 200 characters.',
            'group_id.required' => 'Please select a group.',
            'group_id.max' => 'The group cannot exceed 200 characters.',
            'country_id.required' => 'The country is required.',
            'country_id.max' => 'The country cannot exceed 200 characters.',
            'city_id.required' => 'The city is required.',
            'city_id.max' => 'The city cannot exceed 200 characters.',
            'nationality_id.required' => 'The nationality is required.',
            'nationality_id.max' => 'The nationality cannot exceed 200 characters.',
            'job_title.required' => 'The job title is required.',
            'job_title.max' => 'The job title cannot exceed 200 characters.',
        ]);
                $data = new User;
                $data->name = $this->name;
                $data->last_name = $this->last_name;
                $data->email = $this->email;
                $data->mobile = $this->mobile;
                // dd( $this->profile_photo_path);
                if( $this->profile_photo_path)
                {
                    $img=$this->profile_photo_path;
                    $file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$img->getClientOriginalExtension();
                    $file_sml_name_img = 'thumbnail_'.$file_name;
                    $destinationPath = public_path('/uploads');
                    $destinationPath_smll = public_path('/uploads/thumbnail');
                    // to finally create image instances
                    //$image = $manager->make($destinationPath."/".$file_name);
                    $image_data = Image::make($img->getRealPath());
                    // now you are able to resize the instance
                    $image_data->resize(768,1024);
                    // and insert a watermark for example
                    $waterMarkUrl = public_path('uploads/logo.png');
                    $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
                    // finally we save the image as a new file
                    $img_name = $image_data->save($destinationPath."/".$file_name);
                    ///small img
                    $image_small_data = Image::make($img->getRealPath());
                    // now you are able to resize the instance
                    $image_small_data->resize(190,250);
                    // and insert a watermark for example
                    $waterMarkUrl = public_path('uploads/logo.png');
                    $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
                    // finally we save the image as a new file
                    $img_sml_name = $image_small_data->save($destinationPath_smll."/".$file_sml_name_img);
                    // exit create img
                    $data['profile_photo_path'] = $file_name;

                }
                $data->role_id = 1;
                $data->member_plan = 'Member';
                $data_saved = $data->save();


                if ($data_saved) {
                    // Create a new UsersDetail
                    $user_details = new UsersDetail;
                    $user_details->user_id = $data->id; // Link the user details to the user
                    $user_details->country_id = $this->country_id;
                    $user_details->city_id = $this->city_id;
                    $user_details->nationality_id = $this->nationality_id;
                    $user_details->job_title = $this->job_title; // Corrected 'job_titlt' to 'job_title'
                    $user_details->organizer = $this->organizer;
                    $user_details->notes = $this->notes;
                    $user_details->save();

                    // Create a new UserCategory
                    $user_category = new UserCategory;
                    $user_category->user_id = $data->id; // Link the user to the category
                    $user_category->category_id = $this->group_id; // Assuming $this->group_id is set
                    $user_category->save();
                    session()->flash('added', 'Contact added successfully!');

                    // dd($user_category->category_id);
                }
            // } catch (Exception $e) {
                // Handle the exception
                // error_log($e->getMessage());
                // Optionally, you can add more error handling logic here
            // } finally {
                // Reset the properties
                $this->name = null;
                $this->last_name = null;
                $this->email = null;
                $this->mobile = null;
                $this->country_id = null;
                $this->city_id = null;
                $this->nationality_id = null;
                $this->job_title = null;
                $this->organizer = null;
                $this->notes = null;
                $this->group_id = null; // Also reset the category_id
                $this->step=2;
            // }
        }

        public function loadContact($contactId)
        {
            $this->update=true;
            $contact = User::findOrFail($contactId);

            $this->contactId = $contact->id;
            $this->name = $contact->name;
            $this->last_name = $contact->last_name;
            $this->email = $contact->email;
            $this->mobile = $contact->mobile;
            $this->profile_photo_path = $contact->profile_photo_path;

            $details = $contact->user_detail;
            // dd($contact);
            if ($details) {
                $this->country_id = $details->country_id;
                $this->city_id = $details->city_id;
                $this->nationality_id = $details->nationality_id;
                $this->job_title = $details->job_title;
                $this->organizer = $details->organizer;
                $this->notes = $details->notes;
            }
// dd($contact);
//             $category = $contact->users->first();
//             if ($category) {
//                 $this->group_id = $category->category_id;
//             }
        }
        public function updateContact()
        {
            $data = User::findOrFail($this->contactId);
            $data->name = $this->name;
            $data->last_name = $this->last_name;
            $data->email = $this->email;
            $data->mobile = $this->mobile;

            if ($this->profile_photo_path!= $data->profile_photo_path ) {
                $img = $this->profile_photo_path;
                $file_name = date('Y_m_d_h_i_s_') . Str::slug($this->name) . '.' . $img->getClientOriginalExtension();
                $file_sml_name_img = 'thumbnail_' . $file_name;
                $destinationPath = public_path('/uploads');
                $destinationPath_smll = public_path('/uploads/thumbnail');

                $image_data = Image::make($img->getRealPath());
                $image_data->resize(768, 1024);
                $waterMarkUrl = public_path('uploads/logo.png');
                $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
                $img_name = $image_data->save($destinationPath . "/" . $file_name);

                $image_small_data = Image::make($img->getRealPath());
                $image_small_data->resize(190, 250);
                $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
                $img_sml_name = $image_small_data->save($destinationPath_smll . "/" . $file_sml_name_img);

                $data['profile_photo_path'] = $file_name;
            }

            $data->role_id = 1;
            $data->member_plan = 'Member';
            $data_saved = $data->save();

            if ($data_saved) {
                $user_details = UsersDetail::updateOrCreate(
                    ['user_id' => $data->id],
                    [
                        'country_id' => $this->country_id,
                        'city_id' => $this->city_id,
                        'nationality_id' => $this->nationality_id,
                        'job_title' => $this->job_title,
                        'organizer' => $this->organizer,
                        'notes' => $this->notes,
                    ]
                );

                // $user_category = UserCategory::updateOrCreate(
                //     ['user_id' => $data->id],
                //     ['category_id' => $this->group_id]
                // );
            }

            session()->flash('message', 'Contact updated successfully!');

            $this->resetFields();
        }
        private function resetFields()
        {
            $this->name = null;
            $this->last_name = null;
            $this->email = null;
            $this->mobile = null;
            $this->country_id = null;
            $this->city_id = null;
            $this->nationality_id = null;
            $this->job_title = null;
            $this->organizer = null;
            $this->notes = null;
            $this->group_id = null;
            $this->step = 2;
        }




}
