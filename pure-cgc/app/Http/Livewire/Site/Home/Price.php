<?php

namespace App\Http\Livewire\Site\Home;

use Livewire\Component;
use App\Models\PaymentPlan;
use App\Models\SettingMs;

class Price extends Component
{
    public $payment,$whatsapp_num;

    public function render()
    {
        $this->whatsapp_num=SettingMs::select('whatsapp')->find(1)->pluck('whatsapp');
        $this->payment=Paymentplan::select('id', 'name', 'name_en', 'img', 'price', 'price_ryial', 'price_dolar', 'discount', 'color', 'time', 'type', 'number_questions', 'details', 'details_en', 'tag', 'tag_en', 'category_id')->where(['is_active'=>'Y'])->inRandomOrder('id')->take(5)->get();
        return view('livewire.site.home.price');
    }
}
