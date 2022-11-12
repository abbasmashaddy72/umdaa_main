<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->nullable()->constrained('appointments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('procedure_id')->nullable()->constrained('procedures')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('patient_id')->nullable()->constrained('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('branch_id')->nullable()->constrained('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('registration_fee');
            $table->integer('consultation_fee');
            $table->integer('procedure_price');
            $table->unsignedDecimal('discount', 8, 2);
            $table->unsignedDecimal('round_off', 8, 2);
            $table->enum('mode_of_payment', ['Credit Card', 'Debit Card', 'Cash', 'Cheque', 'Digital Payments (UPI; Mobile Wallets)']);
            $table->string('transaction_details')->nullable();
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billings');
    }
};
