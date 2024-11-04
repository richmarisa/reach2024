<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Resource;
use Flux;

class Resources extends Component
{
    use WithPagination;
    public $name;
    public $resourcerole;
    public $color;
    public $textcolor;
    public $resource_id;

    public $sortBy = 'name';
    public $sortDirection = 'asc';

    public $showEditModal = false;
    public $modalMessage = "";

    protected $rules = [
        'name' => 'required|min:3',
        'resourcerole' => 'required|min:2',
    ];

    public function sort($column) {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function delete($id) {
        Resource::find($id)->delete();
    }

    public function new() {
        $this->name = "";
        $this->resourcerole = null;
        $this->color = "";
        $this->textcolor = "";
        $this->showEditModal = true;
        $this->resource_id = 0; // new is 0
        $this->modalMessage = "New Resource";
        Flux::modal('edit-resource')->show();

    }

    public function edit($id) {
        $resource = Resource::find($id);
        $this->name = $resource->name;
        $this->resourcerole = $resource->resourcerole;
        $this->color = $resource->color;
        $this->textcolor = $resource->textcolor;
        $this->showEditModal = true;
        $this->resource_id = $id;
        $this->modalMessage = "Edit Resource";
        Flux::modal('edit-resource')->show();
    }


    public function submitModal() {

        $this->validate();

        if ($this->resource_id == 0) {
            Resource::create([
                'name' => $this->name,
                'resourcerole' => $this->resourcerole,
                'color' => $this->color,
                'textcolor' => $this->textcolor
            ]);
        } else {
            $resource = Resource::find($this->resource_id);
            $resource->name = $this->name;
            $resource->resourcerole = $this->resourcerole;
            $resource->color = $this->color;
            $resource->textcolor = $this->textcolor;
            $resource->save();
        }
        Flux::modal('edit-resource')->close();
    }

    public function render()
    {
        $resources = Resource::orderBy($this->sortBy, $this->sortDirection)->paginate(10);
        $resourceroles = \App\Models\Resourcerole::all()->pluck('role');
        return view('livewire.resources', ['resources' => $resources, 'resourceroles' => $resourceroles])->layout('layouts.app');
    }

}
