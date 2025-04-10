<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'supplier_name' => $this->faker->company(), // Generate a random supplier name
            'primary_contact_name' => $this->faker->name(), // Generate a random contact name
            'email' => $this->faker->unique()->safeEmail(), // Generate a unique email
            'phone' => $this->faker->unique()->phoneNumber(), // Generate a unique phone number
            'address' => $this->faker->address(), // Generate a random address
            'city' => $this->faker->city(), // Generate a random city
            'country' => $this->faker->country(), // Generate a random country
            'is_active' => $this->faker->boolean(90), // 90% chance of being active
        ];
    }
}
