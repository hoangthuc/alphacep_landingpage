<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WorkOrder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActionOrder>
 */
class ActionOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $order = WorkOrder::inRandomOrder()->first();
        return [
            'work_order_id' => isset($order->id)?$order->id:null,
            "name" => fake()->text(30),
            "description" => fake()->text(100)
        ];
    }
}
