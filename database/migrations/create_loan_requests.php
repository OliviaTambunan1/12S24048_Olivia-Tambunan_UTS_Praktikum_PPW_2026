<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained('equipments.id')->onDelete('cascade');
            $table->VARCHAR('borrower_name', 100);
            $table->VARCHAR('borrower_nim', 10);
            $table->VARCHAR('borrower_email', 100); 
            $table->date('loan_date');
            $table->date('expected_return_date');
            $table->text('purpose');
            $table->enum('status', ['diajukan', 'disetujui', 'ditolak', 'selesai'])->default('diajukan');
            $table->INT('total_estimated_fee');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_requests');
    }
};