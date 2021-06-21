<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->mediumText('image')->nullable();
            $table->string('service_title');
            $table->string('service_desc');
            $table->integer('price');
            $table->timestamps();
            $table->BigInteger('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
