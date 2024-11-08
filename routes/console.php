<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Category;
use App\Models\Term;
use App\Models\Post;
use App\Models\Postmeta;
use App\Models\Prodallocation;
use App\Models\Allocation;
use App\Models\Resource;
use App\Models\Project;
use App\Models\Taxonomy;
use App\Models\Relationship;
use Illuminate\Support\Facades\DB;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('dbconvert', function () {

    // make the resources
    $posts = Post::where ('post_type', 'wgc_resource')->get();
    foreach ($posts as $post) {
        $parts = explode(' - ',$post->post_title);
        $name = $parts[0];
        $type = $parts[1]??"Unknown";
        $bg = Postmeta::where('post_id', $post->ID)->where('meta_key', 'background_color')->first()->meta_value ?? '#FFFFFF';
        $tc = Postmeta::where('post_id', $post->ID)->where('meta_key', 'text_color')->first()->meta_value ?? '#000000';
        Resource::insert([
            'id' => $post->ID,
            'name' => $name,
            'resourcerole' => $type,
            'color' => $bg,
            'textcolor' => $tc,
            'archived' => $post->post_status == 'publish' ? 0 : 1,
            'created_at' => $post->post_date,
            'updated_at' => $post->post_modified,
        ]);
    }

    // make the projects
    $posts = Post::where ('post_type', 'wgc_project')->get();
    foreach ($posts as $post) {
        $taxid = Relationship::where('object_id', $post->ID)->first()->term_taxonomy_id ?? 0;
        $categoryid = Taxonomy::where('term_taxonomy_id', $taxid)->first()->term_id ?? 0;
        $category = Term::where('term_id', $categoryid)->first()->name ?? 'Unknown';
        Project::insert([
            'id' => $post->ID,
            'name' => $post->post_title,
            'category' => $category,
            'archived' => $post->post_status == 'publish' ? 0 : 1,
            'created_at' => $post->post_date,
            'updated_at' => $post->post_modified,
        ]);
    }

    //make the allocations
    $allocations = Prodallocation::all();
    foreach ($allocations as $allocation) {
        Allocation::insert([
            'id' => $allocation->id,
            'project_id' => $allocation->project_id,
            'resource_id' => $allocation->resource_id,
            'hours' => $allocation->hours,
            'startdate' => $allocation->startdate,
        ]);
    }
});

