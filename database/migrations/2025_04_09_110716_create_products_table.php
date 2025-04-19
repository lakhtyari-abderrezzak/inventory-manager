<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->unique();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers', 'id')->onDelete('set null');
            $table->foreignId('unit_id')->nullable()->constrained('units', 'id')->onDelete('set null');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2)->check('price >= 0');
            $table->decimal('cost_price', 10, 2)->nullable();
            $table->integer('quantity')->default(0)->check('quantity >= 0');
            $table->integer('low_stock_alert')->nullable()->check('low_stock_alert >= 0');
            $table->string('unit')->default('pcs');
            $table->string('image_path', 255)->nullable();
            $table->string('barcode')->nullable()->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
