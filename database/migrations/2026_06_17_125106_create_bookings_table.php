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
     Schema::create('bookings', function (Blueprint $table) {
    $table->id();

    $table->foreignId('item_id')
          ->constrained()
          ->onDelete('cascade');

    $table->foreignId('owner_id')
          ->constrained('users')
          ->onDelete('cascade');

    $table->foreignId('renter_id')
          ->constrained('users')
          ->onDelete('cascade');

    $table->date('start_date');
    $table->date('end_date');

    $table->decimal('total_amount', 10, 2);
    $table->decimal('security_deposit', 10, 2);

    $table->integer('days')->nullable();

$table->decimal('subtotal', 10, 2)->nullable();

$table->decimal('delivery_charges', 10, 2)
      ->default(0);

$table->enum('delivery_method', [
    'pickup',
    'delivery'
])->nullable();

$table->text('delivery_address')->nullable();

$table->text('notes')->nullable();


    $table->enum('status', [
        'pending',
        'approved',
        'rejected',
        'completed',
        'handed_over',
        'returned',
    
    ])->default('pending');

    $table->timestamp('handed_over_at')->nullable();
$table->timestamp('returned_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
