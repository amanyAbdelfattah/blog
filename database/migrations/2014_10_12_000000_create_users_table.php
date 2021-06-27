<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id',3);
            $table->mediumText('image')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phoneno');
            $table->integer('age');
            $table->integer('experience');
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('admin');
            $table->boolean('approved');
            // $table->string('provider');
            // $table->string('provider_id');
            // $table->text('avatar');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
