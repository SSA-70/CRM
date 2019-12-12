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
            $table->string('patronymic');
            $table->date('birthday');
            $table->string('mobile_number');
            $table->string('mobile_number_addition');
            $table->string('phone_number');
            $table->string('email');
            $table->boolean('is_send_sms');
            $table->integer('car_mark_id');
            $table->integer('car_model_id');
            $table->date('car_year');
            $table->integer('user_id');
            $table->integer('azs_id');
            $table->timestamp('sold_at');
            $table->timestamp('checked_at');
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
        Schema::dropIfExists('clients');
    }
}
