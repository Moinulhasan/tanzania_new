<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $fillable = ['title', 'photo', 'gallery', 'description', 'location', 'lat', 'long','slug'];
}
