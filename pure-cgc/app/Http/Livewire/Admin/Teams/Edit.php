<?php

namespace App\Http\Livewire\Admin\Teams;


use App\Models\PureTeam;
use Livewire\Component;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $name, $name_en, $Specialization, $Specialization_en, $img, $twitter, $facebook, $linkedin,
        $instagram, $details, $details_en;
    public $edit_object;
    public $edit_id;
    protected $listeners = [
        'getObject' => 'get_object'
    ];
    public function mount()
    {
        if ($this->edit_id > 0) {
            $this->edit_object = PureTeam::where('deleted_at', null)->find($this->edit_id);
        } else {
            $add_object = new PureTeam();
            $this->edit_object = $add_object->get_new();
        }
        //dd($this->edit_object);
    }
    public function render()
    {
        return view('livewire.admin.teams.edit', [
            'edit_object' => $this->edit_object,
        ])->extends('admin.layouts.app');
    }
    public function get_object($edit_object)
    {
        $this->edit_object = $edit_object;
        $this->edit_id = $this->edit_object['id'];
        // $this->category_id=$this->edit_object['category_id'];
        $this->name = $this->edit_object['name'];
        $this->name_en = $this->edit_object['name_en'];
        $this->Specialization = $this->edit_object['Specialization'];
        $this->Specialization_en = $this->edit_object['Specialization_en'];
        $this->twitter = $this->edit_object['twitter'];
        $this->facebook = $this->edit_object['facebook'];
        $this->linkedin = $this->edit_object['linkedin'];
        $this->instagram = $this->edit_object['instagram'];
        $this->details = $this->edit_object['details'];
        $this->details_en = $this->edit_object['details_en'];
        $this->img = $this->edit_object['img'];
        // $this->details=$this->edit_object['details'];
        // $this->details_en=$this->edit_object['details_en'];
    }

    // to insert or update one
    public function store_update()
    {
        $this->validate([
            'name'      =>  'required|max:200',
            'name_en' => 'required|max:200',
            'details' => 'nullable|string|max:250',
            'details_en' => 'nullable|string|max:250',
            'Specialization' => 'required|string|max:50',
            'Specialization_en' => 'required|string|max:50',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
        ]);
        if ($this->edit_id > 0) {
            $data = PureTeam::find($this->edit_id);
        } else {
            $data = new PureTeam();
        }
        if ($data->img != $this->img) {
            $img = $this->img;
            $file_name = date('Y_m_d_h_i_s_') . Str::slug($this->name) . '.' . $img->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            // to finally create image instances
            //$image = $manager->make($destinationPath."/".$file_name);
            $image_data = Image::make($img->getRealPath());
            // now you are able to resize the instance
            //$image_data->resize(1024,768);
            // and insert a watermark for example
            // $waterMarkUrl = public_path('uploads/watermark1.png');
            // $image_data->insert($waterMarkUrl, 'bottom-right', 10, 10);
            // finally we save the image as a new file
            $img_name = $image_data->save($destinationPath . "/" . $file_name);
            ///small img
            // now you are able to resize the instance

            // and insert a watermark for examplemohamed elhaba mohamed-e
            // $waterMarkUrl = public_path('uploads/watermark1.png');
            // $image_small_data->insert($waterMarkUrl, 'bottom-right', 5, 5);
            // finally we save the image as a new file
            // exit create img
            if (is_null($data->img) == 0) {
                @unlink("./uploads/" . $data->img);
            }

            $data->img = $file_name;
        }


        // $data->category_id=(int)$this->category_id;
        $data->name = $this->name;
        $data->name_en = $this->name_en;
        $data->Specialization = $this->Specialization;
        $data->Specialization_en = $this->Specialization_en;
        $data->twitter = $this->twitter;
        $data->facebook = $this->facebook;
        $data->linkedin = $this->linkedin;
        $data->instagram = $this->instagram;
        $data->details = $this->details;
        $data->details_en = $this->details_en;
        $object_added = $data->save();
        $this->emit('objectEdit', $object_added);
    }

    // to reset inputs after insert
    public function reset_inputs()
    {
        $this->edit_id = null;
        $this->name = null;
        $this->name_en = null;
        $this->Specialization = null;
        $this->Specialization_en = null;
        $this->img = null;
        $this->twitter = null;
        $this->facebook = null;
        $this->linkedin = null;
        $this->instagram = null;
        $this->details = null;
        $this->details_en = null;
    }
}
