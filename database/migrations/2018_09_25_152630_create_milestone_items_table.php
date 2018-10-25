<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMilestoneItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('milestone_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->string('name');
            $table->decimal('price', 10,2);
            $table->decimal('tax', 5,2)->nullable();
            $table->string('photo')->nullable();
            $table->decimal('shipping_cost', 10,2)->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('inspection_period');
            $table->string('milestone_key');
            $table->boolean('sender_confirmed')->default(0);
            $table->boolean('recipient_confirmed')->default(0);
            $table->enum('milestone_status', ['pending', 'accepted', 'in progress', 'completed'])->default('pending');
            $table->boolean('is_accepted')->default(0);
            $table->boolean('is_disbursed')->default(0);
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('milestone_items');
    }
}
