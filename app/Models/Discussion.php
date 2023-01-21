<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discussion extends Model
{
    use SoftDeletes;
    protected $fillable = [
		'title', 'category', 'posted_by', 'question','slug'
	];

    public  function categoryList()
    {
        return $this->belongsTo(DiscussCategory::class,'category','id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class,'posted_by','id');
    }
}
