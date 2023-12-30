<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'name',
        'surname',
        'email',
        'phone',
        'city',
        'psc',
        'photo',
        'description',
        'status',
        'total_price',
    ];
}
