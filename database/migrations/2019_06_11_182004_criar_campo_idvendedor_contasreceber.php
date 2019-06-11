<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarCampoIdvendedorContasreceber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
         Schema::table('contaReceber', function (Blueprint $table) {

             $table->string('idVendedor')->nullable();


         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('contaReceber', function($table){
           $table->dropColumn('idVendedor');

         });
     }
 }
