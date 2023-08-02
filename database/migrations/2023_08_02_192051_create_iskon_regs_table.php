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
        Schema::create('iskon_regs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('mondir_name')->nullable();
            $table->string('service')->nullable();
            $table->string('address')->nullable();
            $table->string('councillor')->nullable();
            $table->tinyInteger('yesno')->nullable();
            $table->string('payment')->nullable();
            $table->string('image')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iskon_regs');
    }
};
