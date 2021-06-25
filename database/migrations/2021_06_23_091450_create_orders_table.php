<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->BigInteger('user_id');
            $table->BigInteger('service_id');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::table('orders', function($table)
        {
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
        });
        Schema::table('orders', function($table)
        {
            $table->foreign('service_id')
            ->references('id')->on('services')
            ->onDelete('cascade');
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
