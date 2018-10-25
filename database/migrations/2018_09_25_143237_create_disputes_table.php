<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisputesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disputes', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('uuid')->unique();
            $table->integer('user_id')->unsigned();          
            $table->integer('invoice_id')->unsigned();  
            $table->string('dispute_no');       
            $table->string('title')->nullable();
            $table->boolean('is_resolved')->default(0);
            $table->boolean('is_refund')->default(0);
            $table->string('type');
            $table->string('response')->nullable();
            $table->enum('status', ['open', 'settled', 'refund'])->default('settled');
            
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('restrict');
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
        Schema::dropIfExists('disputes');
    }
}
