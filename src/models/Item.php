<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'itemitem';
    protected $fillable = ['shortTitle', 'longTitle', 'paysite', 'description', 'tags', 'categories'];
}
