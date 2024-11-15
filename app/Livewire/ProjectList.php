<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectList extends Component
{
    public $category = "All";

    public function render()
    {
        $projects = Project::all();
        $title = "Manage All the Projects";



            $filtered = $projects->reject(function ($p) use ($a) {
                if (in_array($p['title'], [
                    "Support",
                    "Time Away",
                    "Drupal Updates",
                    "Internal Projects and Training",
                    "Support &#038; Patches &#038; Updates (Drupal &#038; WordPress)"
                ])) {
                    return true;
                }

                if ($category != "All") {
                    $categories = $p['categories']['nodes'];
                    foreach ($categories as $c) {
                        if ($c['name'] == $a['category']) {
                            return false;
                        }
                    }
                    return true;
                }
                return false;
            })->sortBy("title");



            $drupal = $projects->where('title', "Drupal Updates")->first();
            $support = $projects->where('title', "Support &#038; Patches &#038; Updates (Drupal &#038; WordPress)")->first();
            $timeaway = $projects->where('title', "Time Away")->first();
            $internal = $projects->where('title', "Internal Projects and Training")->first();

            foreach ($filtered as $p) {
                $markup .= "<div class='projectarea'>";
                $markup .= generate_markup_for_project($p);
                $markup .= "<div><button type='button' class='totalsbutton' data-projectid='{$p["projectId"]}'>Totals</button></div><div class='totals hidden' data-projectid='{$p["projectId"]}'></div>";
                $markup .= "</div>"; // projectarea
            }

            $markup .= "<hr/>";

            if ($drupal) {
                $markup .= generate_markup_for_project($drupal);
            }
            if ($support) {
                $markup .= generate_markup_for_project($support);
            }
            if ($timeaway) {
                $markup .= generate_markup_for_project($timeaway);
            }
            if ($internal) {
                $markup .= generate_markup_for_project($internal);
            }


        return view('livewire.project-list', compact('projects'))->layout('layouts.app');
    }
}
