<?php

namespace App\Http\Livewire\Site\Home;


use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\PaymentPlan;
use App\Models\Portfolio as ModelsPortfolio;



class Home extends Component
{
    public $articles,$categories,$success,$payment,$portfolios,$services;
    // public $feautures, $counts,$result_briefs,$result_services,$result_why_us,$portfolios ,$home_photo,$home_sliders,$our_services, $work_samples;
    // public $result_services_colors = ['icon-box-pink', 'icon-box-cyan', 'icon-box-blue', 'icon-box-green'];

    public function render()
    {

        $this->articles = Article::take(3)->get();
        $this->categories  = Category::all();
        $this->payment=Paymentplan::take(5)->get();
        $this->portfolios=ModelsPortfolio::with('category')->Active()->OrderDesc()->get();
        $this->services = Category::take(4)->get();



        // $results=StaticPage::whereIn('id',[1,2,3])->get();
        // dd($results);
        // $this->home_sliders=ArtMin::Active()->OrderDesc()->where('type','slider')->take(10)->first();
        // $why_we=StaticPage::where('id',3)->first();
        // $about=StaticPage::where('id',7)->first();
        // $photo=Gallery::where('type', 0)->inRandomOrder()->first();
        // $this->home_photo=RelatedLinks::where('name','why_us_photo')->get();
        // $this->result_services=ArtMin::Active()->OrderDesc()->where('type','briefs')->take(4)->get();
        // $this->result_briefs=Category::Active()->OrderDesc()->where('type','0')->take(10)->get();
        // $this->our_services = Artmin::Active()->OrderDesc()->where('type', 'services')->take(4)->get();
        // $this->our_services = Category::Active()->where('type','0')->take(4)->get();
        // $this->result_why_us=ArtMin::Active()->OrderDesc()->where('type','why-us')->take(10)->first();
        // $this->feautures=ArtMin::Active()->OrderDesc()->where('type','services')->take(10)->get();
        // $this->work_samples = ArtMin::Active()->OrderDesc()->where('type', 'work_sample')->get();
        // $this->portfolios=Portfolio::Active()->OrderDesc()->where('type','0')->take(10)->get();
        // $this->counts=Count::get();
                // dd($this->portfolios);

        return view('livewire.site.home.home')->extends('livewire.site.layouts.app');
    }

    public function contact()
    {
       $this->validate([
        'name' =>'required|string|max:255',
        'email' =>'required|email',
        'phone' =>'required|min:7|max:25',
        'subject' =>'required|string',
        'message' =>'required|string',
       ],[
        'name.required' => __('ms_lang.name is required'),
        'name.string' => __('ms_lang.name must be text'),
        'name.max' => __('ms_lang.name must be less than 225'),
        'email.required' => __('ms_lang.email is required'),
        'email.email' => __('ms_lang.email must be valid'),
        'phone.required' => __('ms_lang.phone is required'),
        'phone.min' => __("ms_lang.phone mustn't be less than 7"),
        'phone.max' => __('ms_lang.phone must be less than 25'),
        'subject.required' => __('ms_lang.subject is required'),
        'subject.string' => __('ms_lang.subject must be text'),
        'message.required' => __('ms_lang.message is required'),
        'message.string' => __('ms_lang.message must be text'),
       ]);

       ContactUs::create([
        'name' => $this->name,
        'email' => $this->email,
        'phone' => $this->phone,
        'subject' => $this->subject,
        'message' => $this->message,
       ]);
$this->success = 'Successfully sent';
       $this->reset([
        'name' , 'email' , 'phone' , 'subject' , 'message'
       ]);
    }
}
