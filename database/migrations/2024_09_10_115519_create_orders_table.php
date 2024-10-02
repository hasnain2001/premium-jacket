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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('order_number')->unique();
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('pending');

            // Adding new fields for shipping and payment details
            $table->string('email')->nullable(); // Email address
            $table->string('first_name')->nullable(); // First Name
            $table->string('last_name')->nullable(); // Last Name
            $table->string('address')->nullable(); // Shipping Address
            $table->string('city')->nullable(); // City
            $table->string('state')->nullable(); // State
            $table->string('zip')->nullable(); // ZIP Code
            $table->string('phone')->nullable(); // Phone Number
            $table->string('country')->nullable(); // Country/Region
            $table->string('shipping_option')->nullable(); // Shipping Option
            $table->string('payment_option')->nullable(); // Payment Option

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
