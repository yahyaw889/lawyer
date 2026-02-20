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
        Schema::table('service_requests', function (Blueprint $table) {
            $table->boolean('has_political_activity')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_website')->nullable();
            $table->string('commercial_record')->nullable();
            $table->string('incorporation_contract')->nullable();
            $table->enum('company_capital', ['50000_to_500000', '500000_to_10000000', 'more_than_10000000'])->nullable();
            $table->boolean('premium_residency')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('service_requests', function (Blueprint $table) {
            $table->dropColumn([
                'has_political_activity',
                'company_name',
                'company_website',
                'commercial_record',
                'incorporation_contract',
                'company_capital',
                'premium_residency'
            ]);
        });
    }
};
