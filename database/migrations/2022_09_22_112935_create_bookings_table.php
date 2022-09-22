<?php

use Database\Seeders\DatabaseSeeder;
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
        app(DatabaseSeeder::class)->run();
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name_student');
            $table->unsignedBigInteger('buesid')->nullable();
            $table->foreign('buesid')->references('id')->on('buses')->onDelete('cascade');
            $table->integer('nooffsets')->nullable();;

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
