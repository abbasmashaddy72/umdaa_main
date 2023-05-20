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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locality_id')->constrained('localities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('department_id')->constrained('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('email');
            $table->enum('gender', ['Male', 'FeMale', 'Trans']);
            $table->date('dob');
            $table->bigInteger('contact_no')->unique();
            $table->string('qualification');
            $table->string('registration_no')->unique();
            $table->integer('registration_fee')->default(0);
            $table->integer('consultation_fee');
            $table->text('review_link');
            $table->longText('about');
            $table->date('career_start_date');
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
        Schema::dropIfExists('doctors');
    }
};
