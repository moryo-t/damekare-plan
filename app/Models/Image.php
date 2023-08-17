<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = array('id');
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
