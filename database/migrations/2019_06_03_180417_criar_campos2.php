<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarCampos2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
         Schema::table('contaPagar', function (Blueprint $table) {

             $table->string('dataPagamento')->nullable();


         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('contaPagar', function($table){
           $table->dropColumn('dataPagamento');

         });
     }
 }
