<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = $this->faker->randomFloat(2, 10, 100); 
        $quantity = $this->faker->numberBetween(1, 5);
        $total = $price * $quantity;

        return [
            'order_id' => Order::inRandomOrder()->value('id') ?? Order::factory()->create()->id, 
            'product_id' => Product::inRandomOrder()->value('id') ?? Product::factory()->create()->id, 
            'quantity' => $quantity,
            'price' => $price,
            'total' => $total,
        ];
    }
    
}
