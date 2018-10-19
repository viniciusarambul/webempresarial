<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('usuarios', function (Blueprint $table) {
           $table->increments('id');
           $table->string('nome');
           $table->string('login')->unique();
           $table->text('senha');
           $table->integer('grupo_id');
           $table->string('email');
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
         Schema::dropIfExists('usuarios');
     }
  }
