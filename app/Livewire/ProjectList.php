<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectList extends Component
{
    public function render()
    {
        $projects = Project::all();
        return view('livewire.project-list', compact('projects'))->layout('layouts.app');
    }
}
