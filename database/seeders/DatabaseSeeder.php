<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Unit;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItems;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Category::factory(5)->create();
        Unit::factory(5)->create();
        Customer::factory(5)->create();
        Supplier::factory(5)->create();
        Product::factory(30)->create(); 
        Order::factory(10)->create();
        OrderItems::factory(50)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('123'),
        ]);
    }
}
