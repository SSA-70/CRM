<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'card_number',
        'lastname',
        'firstname',
        'patronymic',
        'birthday',
        'mobile_number',
        'mobile_number_addition',
        'phone_number',
        'email',
        'address',
        'is_send_sms',
        'car_mark_id',
        'car_model_id',
        'car_year',
        'comment',
        'user_id',
        'azs_id',
        'is_deleted',
        'sold_at',
        'checked_at'
    ];
}