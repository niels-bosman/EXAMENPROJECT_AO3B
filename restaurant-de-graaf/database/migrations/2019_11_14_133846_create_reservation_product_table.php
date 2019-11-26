<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reservation_code')->nullable(false);
            $table->unsignedBigInteger('product_id')->nullable(false);
            $table->double('price')->nullable();
            $table->unsignedBigInteger('amount')->nullable(false)->default(1);

            $table->foreign('reservation_code')->references('reservation_code')->on('reservations');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('reservation_product');
    }
}
