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
    Schema::create('team_member_interest_topic', function (Blueprint $table) {
        // Nombres de tablas explícitos en constrained porque el nombre es muy largo y Laravel podría confundirse
        $table->foreignId('team_member_id')->constrained('team_members')->cascadeOnDelete();
        $table->foreignId('interest_topic_id')->constrained('interest_topics')->cascadeOnDelete();

        $table->primary(['team_member_id', 'interest_topic_id'], 'member_topic_primary');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_member_interest_topic');
    }
};
