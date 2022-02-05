<?php

namespace Database\Seeders;

use App\Models\Absent;
use Illuminate\Database\Seeder;

class AbsentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Absent::factory(10)->create();
    }
}
