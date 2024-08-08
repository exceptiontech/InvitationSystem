<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Deleted extends Component
{
    public function render()
    {
        $deleted = Category::onlyTrashed()->get();
        return view('livewire.admin.categories.deleted',['results'=>$deleted])->extends('admin.layouts.app');
    }

    public function full_delete($id=0)
    {
        $data= Category::whereId($id)->forcedelete();
    }

    public function un_delete($id)
    {
        $data=Category::onlyTrashed()->whereId($id)->first();
        if($data->deleted_at != null)
        {
            $data->deleted_at=null;
        }
        $data->save();
    }
}
