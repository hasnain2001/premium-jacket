<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customize extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'color',
        'company',
        'quantity',
        'country',
        'gender',
        'image',
        'chest_size',
        'front_length',
        'shoulder_length',
        'waist_size',
        'sleeve_length',
        'bottom_size',
        'description',
        'categories',
    ];

}
