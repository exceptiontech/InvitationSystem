<?php

namespace App\Http\Livewire\Admin\Cgc;

use App\Models\Category;
use Livewire\Component;

class AddGroup extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    public function saveGroup()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'type'=>11
        ]);

        $this->emit('groupAdded');

        $this->reset('name');

        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.admin.cgc.add-group');
    }
}
