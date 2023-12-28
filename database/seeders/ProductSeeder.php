<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name'=>'Fullbay Total $185SC /$185HR 2 HR Min Plus Drive time', 'cost'=>'813.35'],
            ['name'=>'Fullbay Total $185SC - $185HR 2 HR Min Plus Drive time W/Computer Fee', 'cost'=>'963.02'],
            ['name'=>'Fullbay Total $185SC $225HR 2 HR Min Plus Drive time', 'cost'=>'947.59'],
            ['name'=>'Fullbay Total $185SC - $225HR 2 HR Min Plus Drive time W/Computer Fee', 'cost'=>'1103.6'],
            ['name'=>'Fullbay Total ', 'cost'=>'0']
        ];
        foreach($products as $item){
            Product::create($item);
        }
    }
}
