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
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained('appointments')->onUpdate('cascade')->onDelete('cascade');
            $table->string('pulse_rate')->nullable();
            $table->string('bp')->nullable();
            $table->string('resp_rate')->nullable();
            $table->string('temp')->nullable();
            $table->string('spo2')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bmi')->nullable();
            $table->string('bsa')->nullable();
            $table->string('waist')->nullable();
            $table->string('hip')->nullable();
            $table->string('wh_ratio')->nullable();
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
        Schema::dropIfExists('vitals');
    }
};
