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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('duree');
            $table->string('etat');
            $table->integer('projet_id')->unsigned()->index()->foreign()->references("id")->on("projets")->onDelete("cascade");
            $table->string('executand_id');
            $table->unsignedBigInteger('equipe_id')->index();
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
        Schema::dropIfExists('taches');
    }
};
