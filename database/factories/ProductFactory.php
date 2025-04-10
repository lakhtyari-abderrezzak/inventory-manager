<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'sku' => strtoupper(Str::random(10)), // Random unique SKU 
            'category_id' => Category::inRandomOrder()->value('id'),
            'supplier_id' => Supplier::inRandomOrder()->value('id'),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 1000), // Random price between 1 and 1000
            'cost_price' => $this->faker->randomFloat(2, 1, 500), // Random cost price between 1 and 500
            'quantity' => $this->faker->numberBetween(0, 100), // Random quantity between 0 and 100
            'low_stock_alert' => $this->faker->numberBetween(1, 10), // Random low stock alert threshold
            'unit' => $this->faker->randomElement(['pcs', 'kg', 'liters']), // Random unit
            'image_path' => $this->faker->imageUrl(640, 480, 'products', true), // Random image URL
            'barcode' => $this->faker->ean13(), // Generate a random barcode
            'is_active' => $this->faker->boolean(70),
        ];
    }
}