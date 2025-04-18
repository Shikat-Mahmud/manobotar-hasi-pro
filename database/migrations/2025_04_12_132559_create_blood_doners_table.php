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
        Schema::create('blood_doners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('blood_group');
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamp('donated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_doners');
    }
};
