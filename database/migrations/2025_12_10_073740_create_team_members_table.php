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
    Schema::create('team_members', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('area')->nullable();
        $table->string('institution')->nullable();
        $table->string('excerpt')->nullable(); // Descripción corta
        $table->string('photo_path')->nullable();
        $table->string('email')->nullable();
        $table->string('orcid_url')->nullable();
        $table->string('researcher_id', 100)->nullable();
        $table->text('profile_body')->nullable();
        $table->boolean('is_active')->default(true);
        $table->integer('sort_order')->default(0);

        // Auditoría (quién creó/editó)
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
        Schema::dropIfExists('team_members');
    }
};
