<?php

namespace Database\Seeders;

use App\Models\routes_table;
use Illuminate\Database\Seeder;

class routes_tableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    routes_table::factory()->times(5)->create();
    }
}
