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
        Schema::create('patient_relations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('related_patient_id')->constrained('patients')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('relation', ['Parent (Father,Mother)', 'Child (Son,Daughter)', 'Spouse (Husband,Wife)', 'Sibling (Brother,Sister)', 'Grandparents (Grandfather,Grandmother)', 'Grandchild (Grandson,Granddaughter)', 'parents Sibling (Uncle,Aunt)', 'Siblings Child (Nephew,Niece)', 'Aunts/Uncles Child (Cousin)']);
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
        Schema::dropIfExists('patient_relations');
    }
};
