<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use \App\Models\ResourceRole;

class ResourceRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resourcerole::insert(['role' => 'Support']);
        Resourcerole::insert(['role' => 'Developer']);
        Resourcerole::insert(['role' => 'Designer']);
        Resourcerole::insert(['role' => 'UX']);
        Resourcerole::insert(['role' => 'ProjMgr']);
        Resourcerole::insert(['role' => 'WA' ]);
    }
}
