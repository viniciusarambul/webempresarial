<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarCampoValorPagoEmContaspagar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
         Schema::table('contaPagar', function (Blueprint $table) {

             $table->integer('idPedidoCompra')->nullable();


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
           $table->dropColumn('idPedidoCompra');
           
         });
     }
 }
