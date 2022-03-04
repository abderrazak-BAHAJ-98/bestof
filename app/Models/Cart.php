<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Cart extends Model
{
    use HasFactory,SoftDeletes,Notifiable;

    protected $fillable = [
        'user_id',
        'cart_sold',
        'cart_date_expr',
        'cart_number'
    ];
}
