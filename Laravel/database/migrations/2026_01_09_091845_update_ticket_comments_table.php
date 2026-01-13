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
        Schema::table('ticket_comments', function (Blueprint $table) {
          $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade');
          $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
          $table->text('comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ticket_comments', function (Blueprint $table) {
          $table->dropForeign(['ticket_id']);
          $table->dropForeign(['user_id']);
          $table->dropColumn('ticket_id');
          $table->dropColumn('user_id');
          $table->dropColumn('comment');
        });
    }
};
