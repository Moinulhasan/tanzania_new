<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
		'title', 'wildlife','birds','best_time', 'weather','scenery','getting_there','elevation', 'photo','slug','wildlife_title', 'scenery_title', 'birds_title', 'best_time_title', 'weather_title', 'getting_there_title', 'elevation_title'
	];
}
