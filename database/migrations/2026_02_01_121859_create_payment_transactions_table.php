<?php

use App\Models\ConsultationRequest;
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
        Schema::create('payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ConsultationRequest::class)->nullable()->constrained()->nullOnDelete();
            $table->string('tap_id')->unique();
            $table->string('status'); // INITIATED, CAPTURED, FAILED
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('SAR');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('consultation_topic')->nullable();
            $table->json('transaction_response')->nullable(); // Store full JSON response
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transactions');
    }
};
