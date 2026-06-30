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
        
    Schema::create('reports', function (Blueprint $table) {
    $table->id();

    $table->foreignId('reporter_id')
          ->constrained('users')
          ->onDelete('cascade');

    $table->foreignId('reported_user_id')
          ->constrained('users')
          ->onDelete('cascade');

    $table->foreignId('item_id')
          ->nullable()
          ->constrained()
          ->onDelete('cascade');

    $table->foreignId('booking_id')
          ->nullable()
          ->constrained()
          ->onDelete('cascade');

    $table->string('report_type'); // User, Item, Booking

    $table->string('subject');

    $table->text('reason');

    $table->text('admin_response')->nullable();

    $table->enum('priority', [
        'low',
        'medium',
        'high'
    ])->default('medium');

    $table->enum('status', [
        'pending',
        'in_progress',
        'resolved',
        'rejected'
    ])->default('pending');

    $table->timestamp('resolved_at')->nullable();

    $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
