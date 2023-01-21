<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuTitle extends Model
{
    use HasFactory;

    protected $table = 'menu_title';
    public $timestamps = false;

    public function menu()
    {
        return $this->belongsTo(MenuStructure::class,'menu_id');
    }
}
