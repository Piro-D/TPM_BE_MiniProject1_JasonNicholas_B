<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VideoGamesList extends Model
{

    use HasFactory;

    protected $fillable = [
        'GameTitle', 'Developer','ReleaseDate','PlayedSince','Genre','image', 'Status', 'Category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'Category_id');
    }
}
