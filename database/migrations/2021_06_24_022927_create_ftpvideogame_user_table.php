<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFtpvideogameUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // el "onDelete('cascade')" indica que si borro un ftpvideogame, se elimina la relacion con el usuario. En cambio, no me dejara borrar usuarios mientras tengan relacion con algun ftpvideogame
    public function up()
    {
        Schema::create('ftpvideogame_user', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
            $table->foreignId('ftpvideogame_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ftpvideogame_user');
    }
}
