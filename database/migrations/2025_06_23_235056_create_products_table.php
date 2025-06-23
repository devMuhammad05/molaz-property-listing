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
            $table->string('image');
            $table->string('slug');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
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
