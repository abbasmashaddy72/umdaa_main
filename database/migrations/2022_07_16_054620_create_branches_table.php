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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locality_id')->constrained('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('house_no');
            $table->string('landmark');
            $table->integer('pin_code');
            $table->integer('registration_fee')->default(0);
            $table->longText('available_facilities')->default('[]');
            $table->string('manager_name');
            $table->bigInteger('manager_contact_no')->unique();
            $table->string('manager_email');
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
        Schema::dropIfExists('branches');
    }
};
