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
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('email')->nullable($value = true);
            $table->string('password');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('patronymic')->nullable($value = true);
            $table->date('birthday');
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('place_id')->unsigned();
            $table->bigInteger('security_group_id')->unsigned();
            $table->boolean('is_admin')->default('0');
            $table->boolean('is_deleted')->default('0');
            $table->timestamps();

            //$table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('security_group_id')->references('id')->on('security_groups');
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
