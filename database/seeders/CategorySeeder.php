<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert( ['name' => 'CD Internal' ]);
        Category::insert( ['name' => 'On Hold' ]);
        Category::insert( ['name' => 'Onboarding' ]);
        Category::insert( ['name' => 'Production' ]);
        Category::insert( ['name' => 'Support' ]);
        Category::insert( ['name' => 'Uncategorized' ]);
        Category::insert( ['name' => 'UX' ]);
        Category::insert( ['name' => 'WA' ]);


    }
}
