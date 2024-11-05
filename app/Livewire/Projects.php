<?php

namespace App\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Project;
use Flux;

class Projects extends Component
{
    use WithPagination;
    public $name;
    public $category = "";
    public $archived = false;
    public $project_id;

    public $sortBy = 'name';
    public $sortDirection = 'asc';

    public $showEditModal = false;
    public $modalMessage = "";

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function sort($column) {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function archive($id) {
        $project = Project::find($id);
        $project->archived = 1;
        $project->save();
    }

    public function new() {
        $this->name = "";
        $this->showEditModal = true;
        $this->modalMessage = "New Project";
        Flux::modal('edit-project')->show();
    }

    public function edit($id) {
        $project = Project::find($id);
        $this->name = $project->name;
        $this->category = $project->category;
        $this->archived = $project->archived;
        $this->showEditModal = true;
        $this->project_id = $id;
        $this->modalMessage = "Edit Project";
        Flux::modal('edit-project')->show();
    }

    public function submitModal() {

        $this->validate();

        if ($this->project_id == 0) {
            Project::create([
                'name' => $this->name,
                'category' => $this->category,
                'archived' => $this->archived,
            ]);
        } else {
            $project = Project::find($this->project_id);
            $project->name = $this->name;
            $project->category = $this->category;
            $project->archived = $this->archived;
            $project->save();
        }
        Flux::modal('edit-project')->close();
    }

    public function render()
    {
        $projects = Project::orderBy($this->sortBy, $this->sortDirection)->paginate(10);
        $categories = \App\Models\Category::all()->pluck('name');

        return view('livewire.projects', ['projects' => $projects, 'categories'=>$categories])->layout('layouts.app');
    }
}
