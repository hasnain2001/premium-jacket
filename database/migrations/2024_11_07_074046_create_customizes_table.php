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
        Schema::create('customizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('color');
            $table->string('company')->nullable();
            $table->integer('quantity');
            $table->string('country');
            $table->string('categories');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('image')->nullable();
            $table->enum('chest_size', ['S', 'M', 'L', 'XL']);
            $table->enum('front_length', ['S', 'M', 'L', 'XL']);
            $table->enum('shoulder_length', ['S', 'M', 'L', 'XL']);
            $table->enum('waist_size', ['S', 'M', 'L', 'XL']);
            $table->enum('sleeve_length', ['S', 'M', 'L', 'XL']);
            $table->enum('bottom_size', ['S', 'M', 'L', 'XL']);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customizes');
    }
};
