<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Favorite extends Model
{
    protected $guarded = array('id');

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStart()
    {
        $start = $this->start;
        $delateCount = mb_strpos($start, " ")+1;
        $delateResult = mb_substr($start, $delateCount);
        return $delateResult;    
    }

    public function getEnd()
    {
        $end = $this->end;
        $delateCount = mb_strpos($end, " ")+1;
        $delateResult = mb_substr($end, $delateCount);
        return $delateResult;
    }

    public function getPlace1()
    {
        $place1 = $this->place1;
        $delateCount = mb_strpos($place1, " ")+1;
        $delateResult = mb_substr($place1, $delateCount);
        return $delateResult;
    }

    public function getPlace2()
    {
        $place2 = $this->place2;
        $delateCount = mb_strpos($place2, " ")+1;
        $delateResult = mb_substr($place2, $delateCount);
        return $delateResult;
    }


    public function getPlace3()
    {
        $place3 = $this->place3;
        $delateCount = mb_strpos($place3, " ")+1;
        $delateResult = mb_substr($place3, $delateCount);
        return $delateResult;
    }

    public function getPlace4()
    {
        $place4 = $this->place4;
        $delateCount = mb_strpos($place4, " ")+1;
        $delateResult = mb_substr($place4, $delateCount);
        return $delateResult;
    }

    public function getPlace5()
    {
        $place5 = $this->place5;
        $delateCount = mb_strpos($place5, " ")+1;
        $delateResult = mb_substr($place5, $delateCount);
        return $delateResult;
    }
}
