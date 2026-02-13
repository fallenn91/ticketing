<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TicketStatus;
use App\Models\TicketPriority;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ticket_number')->unique()->after('id');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('assigned_to_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('tickets_category')->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->foreignId('status_id')->constrained('ticket_statuses')->default(TicketStatus::where('is_default', true)->value('id'));
            $table->foreignId('priority_id')->constrained('ticket_priorities')->default(TicketPriority::where('is_default', true)->value('id'));
            $table->foreignId('group_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
