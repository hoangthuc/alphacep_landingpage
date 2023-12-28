<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(
            ['name'=>'PBS','address'=>'415 E Airport Fwy<br>Suite 450<br>Irving TX, 75062'],
        );
        Location::factory()->count(1)->create();
    }
}
