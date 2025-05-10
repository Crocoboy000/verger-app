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
Schema::create('user_verger', function (Blueprint $table) {
    $table->string('iduser');
    $table->string('refver');

    $table->foreign('iduser')->references('login')->on('user')->onDelete('cascade');
    $table->foreign('refver')->references('refver')->on('verger')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_verger');
    }
};
