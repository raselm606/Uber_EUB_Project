<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_rides', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_id')->nullable();
            $table->string('rider_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('current_location')->nullable();
            $table->string('destination')->nullable();
            $table->string('payment')->nullable();
            $table->string('ride_type')->nullable();
            $table->string('amount')->nullable();
            $table->string('kilo')->nullable();
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('request_rides');
    }
}
