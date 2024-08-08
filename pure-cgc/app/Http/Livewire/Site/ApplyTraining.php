<?php

namespace App\Http\Livewire\Site;

use App\Models\Field;
use App\Models\Hiring;
use Livewire\Component;
use Intervention\Image\Facades\Image;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ApplyTraining extends Component
{
    use WithFileUploads;

    public $fields,$success, $type ,$name ,$email,$phone,$field_id ,$cv ,$address ,$birth_date  ,$gender , $summary;
    public function render()
    {
        $this->type=2;
        $this->fields = Field::all();
        return view('livewire.site.apply-training')->extends('livewire.site.layouts.app');
    }

    public function store()
    {

    // There is an error in uploading cv file

        $this->validate([
            // 'type' =>'required|numeric' , //
            'name' =>'required|string' , //
            'email' =>'required|email' ,//
            'phone' =>'required',

            'field_id' =>'required|numeric' , //
            'cv' => 'required|file|max:5000|mimes:pdf,docx,doc',
            'address'  =>'required|string' , //
            'birth_date'  =>'required|date', //
            'gender'  =>'required|numeric', //
            'summary' =>'required|string' //
        ],[
            'type.required' => __('ms_lang.type is required'),
            'type.numeric' => __('ms_lang.please choose from options'),
            'name.required' => __('ms_lang.name is required'),
            'name.string' => __('ms_lang.name must be text'),
            'email.required' => __('ms_lang.email is required'),
            'email.email' => __('ms_lang.email must be valid'),
            'phone.required' => __('ms_lang.phone is required'),
            'phone.regex' => __('ms_lang.phone_must_be_number'),
            'phone.min' => __("ms_lang.phone mustn't be less than 7"),
            'phone.max' => __('ms_lang.phone must be less than 25'),
            'field_id.required' => __('ms_lang.you_must_choose_your_field'),
            'field_id.numeric' => __('ms_lang.you_must_choose_from_options'),
            'cv.required' => __('ms_lang.you_must_enter_cv'),
            'cv.file' => __('ms_lang.cv_must_be_file'),
            'address.required' => __('ms_lang.address_is_required'),
            'address.string' => __('ms_lang.address_must_be_text'),
            'birth_date.required' => __('ms_lang.birth_date_is_required'),
            'birth_date.date' => __('ms_lang.birth_date_must_be_date'),
            'gender.required' => __('ms_lang.gender_is_required'),
            'gender.numeric' => __('ms_lang.you_must_choose_gender'),
            'summary.required' => __('ms_lang.summary_is_required'),
            'summary.string' => __('ms_lang.summary_must_be_string')
        ]);
        // dd('xxx');

        // $uniqueFileName = time().'.'.$this->cv->extension();
        // $oldPath = $this->cv->getPathName();
        // $uniqueFileName = uniqid() . $this->cv->getClientOriginalName() . '.' . $this->cv->getClientOriginalExtension();
        //   $uniqueFileName = time().'.'.$this->cv->extension() ;
        //   $this->cv->move(public_path('uploaded_cvs') , $uniqueFileName);
        //   $destinationPath = public_path('/uploads_cvs');
        //   $this->cv->save($destinationPath."/".$uniqueFileName);
        // $this->cv->store($destinationPath);
        // $this->cv->move(public_path('files').$uniqueFileName);
        if ($this->cv->isValid()) {
            $fileName = date('Y_m_d_h_i_s_') . Str::slug($this->name) . '.' . $this->cv->getClientOriginalExtension();
            Storage::disk('uploads')->put($fileName, file_get_contents($this->cv->path()));

            $filePath = Storage::disk('uploads')->path($fileName);


        }
        //   file_name = date('Y_m_d_h_i_s_').Str::slug($this->name).'.'.$this->cv->getClientOriginalExtension();
        // $destinationPath = public_path('/uploads');
        // $image_data = Image::make($this->cv->getRealPath());
        // $img_name = $image_data->save($destinationPath."/".$file_name);
        Hiring::create([
            'type'  => $this->type,
            'name'  => $this->name,
            'email' => $this->email ,
            'phone' => $this->phone ,
            'field_id' => $this->field_id ,
            'cv' => $fileName,
            'address' => $this-> address,
            'birth_date' => $this->birth_date ,
            'gender' => $this->gender ,
            'summary' => $this->summary
        ]);
        session()->flash('success_message','successfully sent');

        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->reset(
            'fields',
            'success',
            'type' ,
            'name' ,
            'email',
            'phone',
            'field_id' ,
            'cv' ,
            'address' ,
            'birth_date'  ,
            'gender' ,
             'summary');
    }
}
