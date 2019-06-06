<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarCampos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
         Schema::table('contaPagar', function (Blueprint $table) {

             $table->double('valorPago')->nullable();


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
           $table->dropColumn('valorPago');

         });
     }
 }
