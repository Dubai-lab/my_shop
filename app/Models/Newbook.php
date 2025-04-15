<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Newbook extends Model
{
    protected $fillable = [
        'title',
        'author',
        'price',
        'image'
    ];
}
