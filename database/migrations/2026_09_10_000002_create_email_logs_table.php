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
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_enquiry_id')->nullable()->constrained('contact_enquiries')->nullOnDelete();
            $table->string('mail_type', 50); // user_acknowledgement, client_notification
            $table->string('recipient_email');
            $table->string('subject');
            $table->string('status', 20)->default('pending'); // sent, failed, pending
            $table->text('error_message')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();

            $table->index(['contact_enquiry_id', 'status']);
            $table->index('mail_type');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_logs');
    }
};
