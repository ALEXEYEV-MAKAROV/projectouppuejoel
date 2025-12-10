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
    Schema::create('interest_topics', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('icon_class', 100)->nullable(); // Para clases de FontAwesome o similares
        $table->text('description')->nullable();
        $table->string('resource_url')->nullable();
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
        Schema::dropIfExists('interest_topics');
    }
};
