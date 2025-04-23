<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_number' => 'ORD-' . strtoupper($this->faker->bothify('####??')),
            'customer_id' => Customer::inRandomOrder()->value('id') ?? Customer::factory()->create()->id, // Ensure a valid customer_id
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled']),
            'total_amount' => $this->faker->randomFloat(2, 20, 500), 
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid', 'refunded']),
        ];
    }
}
