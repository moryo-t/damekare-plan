<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function timeStamp()
    {
        $time = $this->created_at;
        $minNot = date('Y-n-j G:i', strtotime($time));
        return $minNot;    
    }
}
