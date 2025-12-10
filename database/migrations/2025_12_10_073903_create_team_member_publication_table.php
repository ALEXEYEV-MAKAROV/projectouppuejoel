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
    Schema::create('team_member_publication', function (Blueprint $table) {
        // Claves foráneas
        $table->foreignId('team_member_id')->constrained()->cascadeOnDelete();
        $table->foreignId('publication_id')->constrained()->cascadeOnDelete();

        // Clave primaria compuesta para evitar duplicados
        $table->primary(['team_member_id', 'publication_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_member_publication');
    }
};
