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
        Schema::create('header_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('psc');
            $table->string('photo');
            $table->string('description');
            $table->enum('status', ['nová', 'otvorená', 'vybavená'])->default('nová');
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_order');
    }
};
