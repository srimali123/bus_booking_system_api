<?php

namespace Database\Seeders;

use App\Models\routes_table;
use Database\Factories\routes_tableFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(routes_tableSeeder::class);
    }
}
