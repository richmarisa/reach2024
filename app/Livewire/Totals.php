<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;
use App\Models\Resource;
use App\Models\Allocation;

class Totals extends Component
{
   
    public function render()
    {
        // create an array of mondays starting with the monday of the current week and 13 more
        $mondays = [];
        $dates = [];
        $today = date("Y-m-d");
        $dayofweek = date("w", strtotime($today));
        $monday = date("Y-m-d", strtotime($today . " -" . ($dayofweek-1) . " days"));
        for ($i = 0; $i < 14; $i++) {
            $mondays[] = date("M j", strtotime($monday . " +" . $i . " weeks"));
            $dates[] = date("Y-m-d", strtotime($monday . " +" . $i . " weeks"));
        }

        $mondays = $dates;

        $projects = Project::all();
        $resources = Resource::all();

        $resourcebynae = [];
        
        $resources = Resource::orderBy("name")->get();

        $allocations = Allocation::where("startdate", ">=", $dates[0])
            ->where("startdate", "<=", $dates[13])
            ->get();

        print_r($dates);
        print_r($allocations);

        $people = [];
        foreach ($resources as $resource) {
            $hours = [];
            for ($i = 0; $i < 14; $i++) {
                $hours[] = $allocations->where("resource_id", $resource->id)
                    ->where("startdate", $dates[$i])
                    ->sum("hours");
            }
            $people[$resource->name] = $hours;
        }
        
        return view('livewire.totals', compact('people','mondays'))->layout('layouts.app');
    }
}
