<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_expense'); 
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_expense_product')->nullable(); 
            $table->unsignedBigInteger('id_expense_payment')->nullable(); 
            $table->string('description');

            $table->foreign('id_expense')->references('id')->on('expenses_and_purchases');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_expense_product')->references('id')->on('expenses_details');
            $table->foreign('id_expense_payment')->references('id')->on('expense_payments');
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
        Schema::dropIfExists('historial_expenses');
    }
}
