<?php

namespace App\Http\Livewire\Admin\Cgc;

use App\Models\User;
use App\Models\UsersDetail;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class Moderators extends Component
{
    use WithFileUploads;

    public $results, $role_id, $data,$password,$password_confirmation
    , $user_details
    , $showForm
    , $showFormEdit, $showFormE, $name, $edit,$showFormEP
    , $last_name, $date,$moderatorId
    , $email,$type=0
    , $mobile
    , $job_title ,$profile_photo_path;

    public function mount()
    {
        $this->role_id = 6;
        $this->showForm = false;
        $this->showFormEdit = false;

        $this->results = User::whereRoleId($this->role_id)->orderBy('id', 'DESC')->get();

    }
    public function active_edit($id=0)
    {
    if ($id != 0) {
        $this->edit = true;
        $this->data = User::where('id', $id)->first();
        $this->name = $this->data->name;
        $this->last_name = $this->data->last_name;
        $this->email = $this->data->email;
        $this->mobile = $this->data->mobile;
        $this->role_id = $this->data->role_id;
        $this->date = $this->data->created_at;
        // $this->password = $this->data->password;
        $this->user_details = UsersDetail::where('user_id', $id)->first();
        $this->job_title = $this->user_details->job_title;
        $this->type=1;

    }

    $this->showForm = true;
    $this->showFormE = true;
        if ($id != 0) {
            $this->edit = true;
            $this->data = User::where('id', $id)->first();

            $this->type=1;

        }
        $this->showForm = true;
    $this->showFormEP = true;



    }

    public function takeId($id)
    {
        $this->moderatorId = $id;
    }

    public function deleteModerator()
    {
        User::find($this->moderatorId)->delete();
        $this->mount();
        session()->flash('message', 'moderator deleted successfully.');

    }
    public function savemoderator()
    {
        // dd($this->password);

        if ($this->edit == true) {


                $this->data->name = $this->name;
                if($this->password != '')
                {
                    $this->validate([
                        'password' => 'nullable|between:8,30',
                        'password_confirmation' => 'nullable|same:password',
                    ]);

                    $this->data->password=Hash::make($this->password);
                }
                $this->data->last_name = $this->last_name;
                $this->data->email = $this->email;
                $this->data->mobile = $this->mobile;
                $this->data->created_at = $this->date;
                if ($this->profile_photo_path) {
                                        // dd($this->profile_photo_path);

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

                   $this->data->profile_photo_path = $file_name;
                }
                $data_saved = $this->data->save();

                if ($data_saved) {
                    $this->user_details->job_title = $this->job_title; // Corrected 'job_titlt' to 'job_title'
                    $this->user_details->save();

                }

                session()->flash('message', 'moderator updated successfully.');
                $this->name = null;
                $this->last_name = null;
                $this->email = null;
                $this->mobile = null;
                $this->job_title = null;


        } else {

            $this->validate([
                'name' => 'required|max:200',
                'last_name' => 'required|max:200',
                'email' => 'required|string|email|max:191|unique:users,email',
                'mobile' => 'required|string|max:25|unique:users,mobile',
                // 'job_title' => 'required|max:200',
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
                'job_title.required' => 'The job title is required.',
                'job_title.max' => 'The job title cannot exceed 200 characters.',
            ]);
            try {
                $data = new User;
                if($this->password != '')
                {
                    // dd($this->password);
                    $this->validate([
                        'password' => 'nullable|between:8,30',
                        'password_confirmation' => 'nullable|same:password',
                    ]);

                    $data->password=Hash::make($this->password_confirmation);
                }
                $data->name = $this->name;
                if($this->password != '')
                {
                    $data->password=Hash::make($this->password);
                }
                $data->last_name = $this->last_name;
                $data->email = $this->email;
                $data->mobile = $this->mobile;
                $data->role_id = $this->role_id; // Assuming role_id is a static value
                $data->member_plan = 'Member'; // Assuming member_plan is a static value
                $data->created_at = $this->date;
                if ($this->profile_photo_path) {
                    // dd($this->profile_photo_path);
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
                $data_saved = $data->save();

                if ($data_saved) {
                    // Create a new UsersDetail
                    $user_details = new UsersDetail;
                    $user_details->user_id = $data->id; // Link the user details to the user
                    $user_details->job_title = $this->job_title; // Corrected 'job_titlt' to 'job_title'
                    $user_details->save();

                }
            } catch (Exception $e) {
                // Handle the exception
                error_log($e->getMessage());
                // Optionally, you can add more error handling logic here
            } finally {
                session()->flash('message', 'moderator added successfully.');
                $this->name = null;
                $this->last_name = null;
                $this->email = null;
                $this->mobile = null;
                $this->job_title = null;

            }
        }
        $this->mount();

    }
    public function ViewDetails($value,$id=0)
    {
        if ($id != 0) {
            $this->edit = true;
            $this->data = User::where('id', $id)->first();
            $this->name = $this->data->name;
            $this->last_name = $this->data->last_name;
            $this->email = $this->data->email;
            $this->mobile = $this->data->mobile;
            $this->role_id = $this->data->role_id;
            $this->date = $this->data->created_at;
            $this->user_details = UsersDetail::where('user_id', $id)->first();
            $this->job_title = $this->user_details->job_title;

        }
        $this->showForm = true;
        $this->showFormE = $value;

    }

    public function back()
    {
        // dd($value);
        $this->mount();
        $this->edit=false;

//         $this->showForm = false;
//         $this->showFormE = false;
// dd($this->showForm);

    }
    public function render()
    {
// dd($this->results);
        return view('livewire.admin.cgc.moderators')->extends('admin.layouts.app', ['script_editor' => true, 'script_datatables' => true]);
    }
}
