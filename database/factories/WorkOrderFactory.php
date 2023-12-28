<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;
use App\Models\WorkOrderTemplate;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkOrder>
 */
class WorkOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * status: Waiting for payment, pending job, repair, review, and completed.
     */
    public function definition()
    {
        $template = WorkOrderTemplate::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $location = Location::inRandomOrder()->first();
        $String10 = Str::random(10);
        return [
            'public_id' => $String10,
            'work_order_template_id' => isset($template->id)?$template->id:null,
            'user_id' => isset($user->id)?$user->id:null,
            'location_id' => isset($location->id)?$location->id:null,
            'work_order_reference' => fake()->text(20),
            'carrier_name' => fake()->name(),
            'driver_name' => fake()->name(),
            'driver_email' => fake()->email(),
            'driver_phone' => fake()->unique()->e164PhoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'dispatch_phone_number' => fake()->unique()->e164PhoneNumber(),
        ];
    }
}
