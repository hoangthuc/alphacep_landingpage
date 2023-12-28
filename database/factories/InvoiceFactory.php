<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\WorkOrder;
use App\Models\User;
use App\Models\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $order = WorkOrder::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        $location = Location::inRandomOrder()->first();
        $String10 = Str::random(10);
        $product_items = [
            ['id'=>$product->id, 'name'=>$product->name, 'cost'=>$product->cost, 'unit'=> $product->unit, 'qty'=> 1]
        ];
        $line_items = [
            ['name'=>fake()->text(20), 'cost'=>fake()->randomFloat(2, 0, 1000), 'unit'=> null, 'qty'=> 1],
            ['name'=>fake()->text(20), 'cost'=>fake()->randomFloat(2, 0, 1000), 'unit'=> null, 'qty'=> 3],
            ['name'=>fake()->text(20), 'cost'=>fake()->randomFloat(2, 0, 1000), 'unit'=> null, 'qty'=> 1],
        ];
        $subtotal = $product_items[0]['cost'];
        foreach($line_items as $item){
            $subtotal += $item['cost'];
        }
        $convenience_fee_disable = true;
        $convenience_fee = 10;
        $tax_total = 10;
        $amount = $subtotal + $convenience_fee + $tax_total;
        return [
            'type' => 'cash',
            'status' => 0, // 0: new, 1: processing, 2:sent, 3: failed, 4: completed
            'public_id' => $String10,
            'work_order_id' => isset($order->id)?$order->id:null,
            'user_id' => isset($user->id)?$user->id:null,
            'description' => fake()->sentence(),
            'payer_name' => fake()->name(),
            'payer_phone' => fake()->phoneNumber(),
            'payer_email' => fake()->email(),
            'comments' => fake()->text(50),
            'info_invoice' => fake()->sentence(),
            'location_id' => isset($location->id)?$location->id:null,
            'subtotal'=> $subtotal,
            'convenience_fee_disable'=> $convenience_fee_disable,
            'convenience_fee'=> $convenience_fee,
            'tax_total'=> $tax_total,
            'amount'=> $amount,
            'note_void'=> fake()->sentence(),
        ];
    }
}
