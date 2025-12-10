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
    Schema::create('publications', function (Blueprint $table) {
        $table->id();
        $table->integer('publication_year');
        $table->string('title');
        $table->string('authors')->nullable(); // Opcional, por si quieres texto libre
        $table->string('publication_info', 500)->nullable();
        $table->string('issn', 50)->nullable();
        $table->text('description')->nullable();
        $table->string('primary_link')->nullable();
        $table->string('secondary_link')->nullable();
        $table->boolean('is_active')->default(true);
        $table->integer('sort_order')->default(0);

        // Auditoría
        $table->foreignId('created_by_user_id')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('updated_by_user_id')->nullable()->constrained('users')->nullOnDelete();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publications');
    }
};
