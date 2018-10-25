<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bank_id')->unsigned(); 
            $table->integer('user_id')->unsigned();
            $table->decimal('amount',10,2)->nullable();
            $table->enum('status', ['initiated', 'paidout'])->default('initiated');
            $table->boolean('is_paidout')->default(0);
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('bank_details')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payouts');
    }
}
