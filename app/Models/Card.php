<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'user_id',
        'card_sold',
        'card_date_expr',
        'card_number'
    ];
}
