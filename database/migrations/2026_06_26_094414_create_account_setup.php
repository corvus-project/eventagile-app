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
        Schema::create('account_setups', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('domain')->nullable();
            $table->json('config')->nullable();
            $table->string('action')->default('SETUP');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_setups');
    }
};
