<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'number',
        'year',
        'status',
        'data',
        'osago',
        'license',
        'color',
        'time_accounting',
        'mileage',
        'service',
    ];

    public static function attributesName() {
        return [
            'name' => "Марка, модель",
            'number' => "Регистрационый номер",
            'year' => "Год выпуска",
            'status' => "Статус",
            'data' => "Данные",
            'osago' => "Осаго",
            'license' => "Лицензия",
            'color' => "Цвет",
            'time_accounting' => "Время учета",
            'mileage' => "Пробег",
            'service' => "Осталось до ТО",
        ];
    }

    public static function rules()
    {
        return [
            'name' => "required",
            'number' => "required",
            'year' => "required",
            'status' => "required",
            'data' => "required",
            'osago' => "required",
            'license' => "required",
            'color' => "required",
            'time_accounting' => "required",
            'mileage' => "required",
            'service' => "required",
        ];
    }

}
