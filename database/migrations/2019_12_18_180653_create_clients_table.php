<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('card_number')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('patronymic')->nullable($value = true);
            $table->date('birthday');
            $table->string('mobile_number');
            $table->string('mobile_number_addition')->nullable($value = true);
            $table->string('phone_number')->nullable($value = true);
            $table->string('email')->nullable($value = true);
            $table->string('address')->nullable($value = true);
            $table->boolean('is_send_sms')->default('0');
            $table->string('car_mark_id')->nullable($value = true);
            $table->string('car_model_id')->nullable($value = true);
            $table->integer('car_year')->nullable($value = true);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('azs_id')->unsigned();
            $table->string('comment')->nullable($value = true);
            $table->boolean('is_deleted')->default('0');
            $table->timestamp('sold_at')->nullable($value = true);
            $table->timestamp('checked_at')->nullable($value = true);
            $table->bigInteger('owner_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('azs_id')->references('id')->on('places');
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
