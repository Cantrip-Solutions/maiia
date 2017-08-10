<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pro_id_fk')->unsigned();
            $table->foreign('pro_id_fk')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('u_id_fk')->unsigned();
            $table->foreign('u_id_fk')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('trans_id_fk')->unsigned();
            $table->foreign('trans_id_fk')->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('billing_address');
            $table->string('shipping_address');
            $table->integer('amount');
            $table->integer('quantity');
            $table->enum('status',['PENDING','PROCESSING','DISPATCHED','DELIVERED',''])->default('FAILED');
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
        Schema::dropIfExists('orders');
    }
}
