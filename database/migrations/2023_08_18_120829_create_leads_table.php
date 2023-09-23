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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('hour')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('brand')->nullable();
            $table->string('issue')->nullable();
            $table->string('model')->nullable();
            $table->string('ipaddress')->nullable();
            $table->unsignedBigInteger('country_id')->default(1)->comment('1=USA 2=UK 3=CA 4=AU and 5=NZ');
            $table->unsignedBigInteger('form_type')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
