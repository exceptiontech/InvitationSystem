<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SeoPage extends Component
{

    public string $pageName = 'about-page';
    public string $keywords;
    public string $englishKeywords;
    public $description;
    public $englishDescription;

    public function mount() {
        $page = \App\Models\SeoPage::where('table_name', $this->pageName)->first();
        $this->keywords = $page->keywords ?? '';
        $this->englishKeywords = $page->keywords_en ?? '';
        $this->description = $page->description?? '';
        $this->englishDescription = $page->description_en?? '';
    }

    public function store()
    {
        $page = \App\Models\SeoPage::where('table_name', $this->pageName);
        if ($page->exists())
            $page->update([
                'table_name' => $this->pageName,
                'keywords' => $this->keywords,
                'keywords_en' => $this->englishKeywords,
                'description' => $this->description,
                'description_en' => $this->englishDescription,
            ]);
        else
            \App\Models\SeoPage::create([
                'table_name' => $this->pageName,
                'keywords' => $this->keywords,
                'keywords_en' => $this->englishKeywords,
                'description' => $this->description,
                'description_en' => $this->englishDescription,
            ]);
    }

    public function changePageName() {
        $page = \App\Models\SeoPage::where('table_name', $this->pageName)->first();
        $this->keywords = $page->keywords ?? '';
        $this->englishKeywords = $page->keywords_en ?? '';
        $this->description = $page->description?? '';
        $this->englishDescription = $page->description_en?? '';
    }
    public function render()
    {
        return view('livewire.admin.seo-page.create')
            ->extends('admin.layouts.app');
    }

}
