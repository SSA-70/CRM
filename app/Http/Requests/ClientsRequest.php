<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ClientsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required|date',
            'mobile_number' => 'required|size:16',
            'card_number' => 'required|digits_between:6,7',
            'sold_at' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'firstname.required' => 'введите фамилию',
            'lastname.required' => 'введите имя',
            'birthday.required' => 'введите дату рождения',
            'birthday.date' => 'неверный формат даты рождения ( должно быть ДД-ММ-ГГГГ )',
            'mobile_number.required' => 'введите сотовый',
            'mobile_number.size' => 'неверный формат номера сотового ( должно быть +7(ХХХ)ХХХ-ХХ-ХХ )',
            'card_number.required' => 'введите номер карты',
            'card_number.digits_between' => 'неверная длинна номера карты',
            'sold_at.required' => 'введите дату продажи',
            'sold_at.date' => 'неверный формат даты продажи ( должно быть ДД-ММ-ГГГГ )'
        ];
    }
}
