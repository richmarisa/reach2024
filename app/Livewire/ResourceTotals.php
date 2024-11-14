<?php

namespace App\Livewire;

use Livewire\Component;

class ResourceTotals extends Component
{
    public function render()
    {
        $resources = Resource::where('archived', 0)->orderBy('title')->get();
        $resource_ids = $resources->pluck('id');




        return view('livewire.resource-totals');
    }
}


// get 14 mondays starting with the monday of the current week

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



/*
   

    $date_tds = collect($mondays)->map(function($monday, $index) {
        return "<td class='bold ctr'>$monday</td>";
    })->implode("");

    $names = $resources->pluck("name")->unique()->sort();


    
    foreach ($names as $name) {
        $tabletop = <<<TABLETOP

        <h3 id='$name'>$name</h3>
        <table class='persontable'>
        <tr><td style="min-width:250px;"">Project</td>$date_tds</tr>
TABLETOP;
        $lines = "";
        foreach ($projects as $p) {
            $allocations = $wpdb->get_results('
                SELECT project_id, hours, note, resource_id, startdate
                FROM wgc_allocations 
                WHERE project_id = ' . $p["projectId"]
                );
            $allocations = new Collection($allocations);
            foreach ($p["resources"] as $r) {
                if ($r["name"] == $name) {
                    $alloc = $allocations->where("resource_id", $r["resourceId"]);
                    $lines .= "<tr>";
                    $lines .= "<td class='bold'>{$p["title"]}</td>";
                    foreach ($dates as $date) {
                        $datealloc = $alloc->where("startdate", $date)->first();
                        //var_dump($datealloc); echo "<br>";
                        if ($datealloc && $datealloc->hours > 0) {
                            $lines .= "<td class='ctr'>{$datealloc->hours}</td>";
                        } else {
                            $lines .= "<td></td>";
                        }
                    }
                    $lines .= "</tr>";
                }
            }
        }
        $markup .= "$tabletop$lines</table>";

        
    }



    if (is_array($resources)) {

        foreach ($resources as $resource) {
            $notes = [];
            $hours = [];
            $alloc = $allocations->where("resource_id", $resource["resourceId"]);
            foreach ($dates as $date) {
                $datealloc = $alloc->where("startdate", $date)->first();
                if ($datealloc) {
                    $notes[] = $datealloc->note;
                    $hours[] = $datealloc->hours;
                } else {
                    $notes[] = "";
                    $hours[] = "";
                }  
            }

            $table_data[] = array_merge([$resource["resourceId"], "", ""], $notes);
            $table_data[] = array_merge([$resource["resourceId"], $resource["role"], $resource["name"]], $hours);  
        }
    }






return $markup;



}
add_shortcode( 'resource_totals', 'resource_totals_shortcode');

*/