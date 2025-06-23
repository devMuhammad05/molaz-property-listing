<?php

use App\Enums\Status;
use App\Enums\PropertyType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->string('slug');
            $table->string('image');
            $table->string('video_url')->nullable();
            $table->string('city');
            $table->string('address');
            $table->decimal('amount', 14, 2);
            $table->string('intervals')->default('month');
            $table->string('tags')->nullable();
            $table->enum('status', Status::values())->default(Status::AVAILABLE);
            $table->enum('property_type', PropertyType::values());
            $table->string('other_images')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
