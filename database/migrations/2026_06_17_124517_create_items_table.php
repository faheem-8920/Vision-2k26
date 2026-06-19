<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('rent_price_per_day', 10, 2);
            $table->decimal('security_deposit', 10, 2);
            $table->decimal('replacement_cost', 10, 2);
            $table->string('city');
            $table->string('address');
            $table->integer('quantity')->default(1);

        
            $table->enum('status', [
        'available',
        'rented',
        'inactive'
    ])->default('available');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
