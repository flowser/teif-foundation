<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');

            $table->string('course_status')->nullable();
            $table->string('certificte_status')->nullable();//pending, ready to be collected, Collected
            $table->string('collection_date')->nullable();//client initiating collection date
            $table->tinyInteger('sendbyparcel')->default(0)->unsigned();
            $table->float('parcel_fee', 8, 2)->nullable();


            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
