<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarCampoClienteEmpedidosvendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
         Schema::table('pedidovenda', function (Blueprint $table) {

             $table->string('idCliente')->nullable();


         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('pedidovenda', function($table){
           $table->dropColumn('idCliente');

         });
     }
 }
