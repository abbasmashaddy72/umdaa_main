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
        Schema::create('bulk_s_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id');
            $table->integer('total_sent');
            $table->integer('processed');
            $table->integer('invalid');
            $table->integer('duplicate');
            $table->integer('dnd');
            $table->integer('valid');
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
        Schema::dropIfExists('bulk_s_m_s');
    }
};
