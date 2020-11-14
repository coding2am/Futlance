<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_no');
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->text('note')->nullable();
            $table->text('comment')->default("Wishing You a Great Day!");
            $table->integer('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('court_id');
            $table->unsignedBigInteger('payment_method_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('court_id')
                ->references('id')
                ->on('courts')
                ->onDelete('cascade');

            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
                ->onDelete('cascade');
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
        Schema::dropIfExists('bookings');
    }
}
