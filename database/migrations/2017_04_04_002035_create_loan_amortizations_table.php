<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanAmortizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_amortizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('loan_id')->unsigned();
            $table->bigInteger('monthly_payment');
            $table->bigInteger('total_amount_paid');
            $table->bigInteger('amount_remaining');
            $table->bigInteger('interest_amount');
            $table->date('due_date')->nullable();
            $table->string('paid_status')->nullable();
            $table->integer('month');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
        Schema::table('loan_amortizations', function (Blueprint $table) {
            $table->foreign('loan_id')->references('id')->on('loans')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_amortizations');
    }
}
