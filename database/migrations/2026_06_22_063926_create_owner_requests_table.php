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
    Schema::create('owner_requests', function (Blueprint $table) {

        $table->id();

        $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->string('cnic')->unique();
        $table->string('phone');
        $table->string('city');
        $table->text('address');

        $table->string('cnic_front');
        $table->string('cnic_back');

        $table->string('proof_type')->default('cnic');

        $table->enum('status', [
            'pending',
            'approved',
            'rejected'
        ])->default('pending');

        $table->text('admin_note')->nullable();

        $table->timestamp('approved_at')->nullable();

        $table->foreignId('approved_by')
            ->nullable()
            ->constrained('users')
            ->nullOnDelete();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner_requests');
    }
};
