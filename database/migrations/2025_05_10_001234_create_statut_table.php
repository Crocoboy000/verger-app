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
Schema::create('statut', function (Blueprint $table) {
    $table->id();
    $table->string('refver');
    $table->string('numver');
    $table->date('dtver');
    $table->string('codvar');
    $table->string('nomvar');
    $table->decimal('pdrec', 8, 2);
    $table->decimal('pdexp', 8, 2);
    $table->decimal('pdeca', 8, 2);
    $table->decimal('pdfre', 8, 2);

    $table->foreign('refver')->references('refver')->on('verger')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statut');
    }
};
