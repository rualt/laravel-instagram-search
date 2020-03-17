<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavoriteImage extends Model
{
    protected $fillable = ['page_link', 'square_image'];
}
