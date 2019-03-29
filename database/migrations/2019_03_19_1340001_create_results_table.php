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
            $table->unsignedInteger('course_order_id');
            $table->unsignedInteger('course_id');

            $table->string('course_status')->nullable();
            $table->string('certificte_status')->nullable();//pending, ready to be collected, Collected
            $table->string('collection_date')->nullable();//client initiating collection date
            $table->tinyInteger('collection_method')->default(0)->unsigned();//manual/byparcel           


            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('course_order_id')->references('id')->on('course_order')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
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
