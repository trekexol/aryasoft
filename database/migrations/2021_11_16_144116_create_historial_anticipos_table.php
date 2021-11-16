<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialAnticiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_anticipos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_anticipo'); 
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_quotation')->nullable(); 
            $table->unsignedBigInteger('id_expense')->nullable(); 
            $table->string('description');

            $table->foreign('id_anticipo')->references('id')->on('anticipos');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_quotation')->references('id')->on('quotations');
            $table->foreign('id_expense')->references('id')->on('expenses_and_purchases');
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
        Schema::dropIfExists('historial_anticipos');
    }
}
