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
        Schema::create('reservation_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reservation_code')->nullable(false);
            $table->unsignedBigInteger('product_id')->nullable(false);

            $table->foreign('reservation_code')->references('reservation_code')->on('reservation');
            $table->foreign('product_id')->references('id')->on('product');
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
