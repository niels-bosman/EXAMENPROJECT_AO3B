<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('table_id')->nullable(false);
            $table->string('reservation_code')->nullable(false);

            $table->foreign('table_id')->references('table_id')->on('tables');
            $table->foreign('reservation_code')->references('reservation_code')->on('reservations');
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
        Schema::dropIfExists('table_reservation');
    }
}
