<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practiciens', function (Blueprint $table) {
            $table->string('matricule')->index();
            $table->string('name')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mail')->nullable();
            $table->string('notoriete')->nullable();
            $table->string('specialite')->nullable();
            $table->string('diplome')->nullable();
            $table->string('coefficien_prescription')->nullable();
            $table->string('ville_origine')->nullable();
            $table->string('ville')->nullable();
            $table->string('adresse')->nullable();
            $table->timestamp('derniere_visite')->nullable();
            $table->timestamp('nouvelle_visite')->nullable();
            $table->timestamp('date_embauche')->nullable();
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
        Schema::dropIfExists('practiciens');
    }
}
