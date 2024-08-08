<?php

namespace App\Http\Livewire\Site\Layouts;

use App\Models\SeoPage;
use App\Models\SettingMs;
use App\Models\SocialMedia;
use Livewire\Component;

class Header extends Component
{
    public $meta = [];
    private $urlMetaLookup = [
        '/' => 'home-page',
        '/about' => 'about-page',
        '/services' => 'services-page',
        '/portofilo' => 'portofilo-page',
        '/blogs/0' => 'blog-page',
        '/jobs' => 'jobs-page',
        '/contact-us' => 'contact-page',
    ];

    public function mount()
    {
        $this->lookup(request()->getRequestUri());
    }

    private function lookup($uri)
    {
        if (array_key_exists($uri, $this->urlMetaLookup)) {
            $keywords = SeoPage::where(
                'table_name',
                $this->urlMetaLookup[$uri]
            )->firstOrFail()->keywords;

            $description = SeoPage::where(
                'table_name',
                $this->urlMetaLookup[$uri]
            )->firstOrFail()->description;

            $this->meta = [
                'keywords' => $keywords,
                'description' => $description,
            ];
        }
    }

    public function render()
    {
        $settings = SettingMs::where('id', 1)->first();
        $socials = SocialMedia::whereIn('id', [1, 2, 3])->get();
        return view('livewire.site.layouts.header', compact('settings', 'socials'));
    }

}
