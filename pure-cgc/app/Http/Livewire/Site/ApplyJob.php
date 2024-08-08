<?php

namespace App\Http\Livewire\Site;
use Livewire\WithFileUploads;

use App\Models\JobApply;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ApplyJob extends Component
{
    use WithFileUploads;

    public
        $name,
        $phone,
        $cv,
        $job_id,
        $email,
        $mobile,
        $address,
        $national_id,
        $marital_status,
        $gender,
        $summary,
        $birth_date,
        $expected_sal,
        $experience_years,$success;
    public function mount($id , Request $request)
    {
        // dd($request->id);
        $this->job_id = $request->id;
    }

    public function render()
    {
        return view('livewire.site.apply-job')->extends('livewire.site.layouts.app');
    }

    public function store()
    {

        // dd($this->job_id);
        $this->validate([
            'name'  => 'required|string',
            'cv' => 'required|file|max:5000|mimes:pdf,docx,doc',
            'job_id' => 'required|numeric',
            'email' => 'required|email',
            'phone' =>'required',
            // 'address' => 'required|string',
            // 'national_id' => 'required',
            'marital_status' => 'required',
            'gender' => 'required',
            'birth_date' => 'required|date',
            'expected_sal' => 'required|numeric',
            'experience_years' => 'required|numeric'
        ],
        [
            'name.required' => __('ms_lang.name is required'),
            'name.string' => __('ms_lang.name must be text'),
            'marital_status.required' => __('ms_lang.milatry_status_is_required'),
            'national_id.required' => __('ms_lang.national_id_required'),
            'job_id.required' => __('ms_lang.job_is_required'),
            'job_id.numeric' => __('ms_lang.you_must_choose_job'),
            'email.required' => __('ms_lang.email is required'),
            'email.email' => __('ms_lang.email must be valid'),
            'mobile.required' => __('ms_lang.phone is required'),
            'mobile.regex' => __('ms_lang.phone_must_be_number'),
            'mobile.min' => __("ms_lang.phone mustn't be less than 7"),
            'mobile.max' => __('ms_lang.phone must be less than 25'),
            'cv.required' => __('ms_lang.you_must_enter_cv'),
            'cv.file' => __('ms_lang.cv_must_be_file'),
            'address.required' => __('ms_lang.address_is_required'),
            'address.string' => __('ms_lang.address_must_be_text'),
            'birth_date.required' => __('ms_lang.birth_date_is_required'),
            'birth_date.date' => __('ms_lang.birth_date_must_be_date'),
            'gender.required' => __('ms_lang.gender_is_required'),
            'gender.numeric' => __('ms_lang.you_must_choose_gender'),
            'expected_sal.required' => __('ms_lang.expected_salary_is_required'),
            'expected_sal.numeric' => __('ms_lang.expected_salary_is_numeric'),
            'experience_years.required' => __('ms_lang.experience_years_is_required'),
            'experience_years.numeric' => __('ms_lang.experience_years_must_be_numeric')
        ]
    );
    if ($this->cv->isValid()) {
        $fileName = date('Y_m_d_h_i_s_') . Str::slug($this->name) . '.' . $this->cv->getClientOriginalExtension();
        Storage::disk('uploads')->put($fileName, file_get_contents($this->cv->path()));

        $filePath = Storage::disk('uploads')->path($fileName);


    }
// dd('');
        // $fileName = date('Y_m_d_h_i_s_').$this->cv->getClientOriginalName();
        // // $this->cv->getClientOriginalExtension();
        //     $destinationPath = public_path('/uploads');
        //     $filePath = $destinationPath. "/".  $fileName;
        //     $this->cv->move($destinationPath, $fileName);

            // $fileName = date('Y_m_d_h_i_s_').str_slug($this->name).'.'.$this->cv->getClientOriginalExtension();
            // $destinationPath = public_path('/uploads');
            // $filePath = $destinationPath. "/".  $fileName;
            // $this->cv->move($destinationPath, $fileName);
            // $data->img = $file_name;
        // $this->cv->move(public_path('cvs') , $fileName);

        JobApply::create([
            'name'  => $this->name,
            'cv' => $fileName,
            'job_id' => $this->job_id,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'national_id' => '000000000',
            'marital_status' => $this->marital_status,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'expected_sal' => $this->expected_sal,
            'experience_years' => $this->experience_years
        ]);
        session()->flash('success_message','successfully sent');

        // $this->success = "Application sent successfully";

        // $this->resetInputs();

    }

    public function resetInputs()
    {
        $this->reset(
        'name',
        'cv',
        // 'job_id',
        'email',
        'phone',
        'address',
        'national_id',
        'marital_status',
        'gender',
        'birth_date',
        'expected_sal',
        'experience_years','success');
    }
}
