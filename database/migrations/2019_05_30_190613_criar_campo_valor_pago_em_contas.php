<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarCampoValorPagoEmContas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
      {
         Schema::table('pedidocompra', function (Blueprint $table) {

             $table->integer('valorPago')->nullable();
             $table->integer('idFornecedor')->nullable();

         });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::table('pedidocompra', function($table){
           $table->dropColumn('valorPago');
           $table->dropColumn('idFornecedor');
         });
     }
 }
