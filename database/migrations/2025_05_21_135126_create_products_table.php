<?php

use App\Enums\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('slug');
            $table->enum('category', Category::values());
            $table->string('description');
            $table->decimal('amount', 14, 2);
            $table->string('city')->nullable();
            $table->string('condition')->nullable();
            $table->string('seller')->nullable();
            $table->string('other_images')->nullable();
            $table->string('units_left');
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
