<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
Route::get('/', [EtudiantController::class, 'index'])->name('etudiant.index');
            $table->string('nom');
            $table->string('adresse');
            $table->string('phone');
            $table->string('email');
            $table->date('dateNaissance');
            $table->integer('villeId')->unsigned();
            $table->foreign('villeId')->references('id')->on('villes');
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
        Schema::dropIfExists('etudiants');
    }
}
