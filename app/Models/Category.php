<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'Platform_Name'
    ];

    public function videogames(){
        return $this->hasMany(VideoGamesList::class);
    }
}
