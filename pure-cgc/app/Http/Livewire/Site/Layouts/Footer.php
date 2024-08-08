<?php

namespace App\Http\Livewire\Site\Layouts;

use Livewire\Component;
use App\Models\SettingMs;
use App\Models\Category;
use App\Models\Maillist;
use App\Models\SocialMedia;

class Footer extends Component
{
    public $success,$error,$setting_footer,$email,$categories,$socials,$facebook,$twitter,$linkedin,$instagram;
    public function render()
    {
        $this->setting_footer = SettingMs::where('id', 1)->first();

        $this->categories = Category::where('type', 0)->select('id', 'name', 'name_en')->get();
        $this->socials = SocialMedia::where(['is_active'=>'Y'])->get();
        // dd($socials);
        return view('livewire.site.layouts.footer');
    }
    public function subscribe()
    {
        // dd('xx');
        $this->validate([
            'email' => 'required|email',
        ],[
            'email.required' =>  $this->dispatchBrowserEvent('swal:modal' , [
                'type' => 'error',
                'title' =>  __('ms_lang.email is required'),
                'text' => ''
            ]),

            'email.email' =>   $this->dispatchBrowserEvent('swal:modal' , [
                'type' => 'error',
                'title' =>  __('ms_lang.please enter valid email'),
                'text' => ''
            ]),



        ]);

        $mail =  Maillist::create(['email' => $this->email]);
        if($mail)
        {
            $this->dispatchBrowserEvent('swal:modal' , [
              'type' => 'success',
              'title' => __('ms_lang.Subscribed Successfully') ,
              'text' => ''
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:modal' , [
                'type' => 'danger',
                'title' => 'Subscribed Failed',
                'text' => ''
              ]);
        //  $this->error = 'There is an error';
        }
         $this->reset('email');
    }
}
