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
        Schema::create('casestatuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('chat_status')->default(0)->comment('0=No or 1=Yes');
            $table->boolean('call_status')->default(0)->comment('0=Ob Connect or 1=Ib Connect 2=DVM 3=VM');
            $table->boolean('remote_status')->default(0)->comment('0=No or 1=Yes');
            $table->boolean('sales_status')->default(0)->comment('0=No or 1=Yes');
            $table->mediumText('comment')->nullable();
            $table->mediumText('wfm_note')->nullable();
            $table->mediumText('tech_note')->nullable();
            $table->foreign('lead_id')->references('id')->on('leads')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casestatus');
    }
};
