<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id')->unsigned();            
            $table->integer('recipient_id')->unsigned();
            $table->string('uuid')->unique();
            $table->string('invoice_no')->nullable();
            $table->string('photo')->nullable();
            $table->string('note')->nullable();            
            $table->decimal('amount',10,2)->nullable();
            $table->string('offline_ref_code');
            $table->boolean('sender_confirmed')->default(0);
            $table->boolean('recipient_confirmed')->default(0);
            $table->boolean('is_accepted')->default(0);
            $table->boolean('is_disbursed')->default(0);
            $table->string('secret_key');
            $table->timestamp('secret_key_updated_at')->nullable();
            $table->enum('status', ['draft', 'paid', 'not paid'])->default('draft');
            $table->enum('invoice_type', ['basic', 'one-off', 'milestone'])->default('basic');
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
