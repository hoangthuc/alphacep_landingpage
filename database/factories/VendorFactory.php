<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $String10 = Str::random(10);
        return [
            'public_id' => $String10,
            'carrier_name' => fake()->name(),
            'driver_email' => fake()->email(),
            'driver_phone' => fake()->unique()->e164PhoneNumber(),
            'contact_name' => fake()->name(),
            'contact_phone' => fake()->unique()->e164PhoneNumber(),
            'contact_email' => fake()->email(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'company_name' => fake()->company(),
            'company_address' => fake()->address(),
            'email' => fake()->email(),
            'phone_number' => fake()->unique()->e164PhoneNumber(),
            'ein_number' => fake()->randomNumber(),
            'information_about_parts_department' => fake()->boolean(true),
            'information_on_preferred_credit_card_processor' => fake()->boolean(true),
            'information_on_breakdown_software' => fake()->boolean(true),
        ];
    }
}
