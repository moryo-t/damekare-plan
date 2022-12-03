<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = array('id');

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getStart()
    {
        $start = $this->start;

        if(mb_strpos($start, "日本") === 0) {
            $searchCount = mb_strpos($start, " ")+1;
            $delateResult = mb_substr($start, $searchCount);
            return $delateResult;    
        }

        $purposeCount = mb_strlen($start)-2;
        if(mb_strpos($start, "日本", $purposeCount) !== false) {
            $searchCount = mb_strpos($start, ",");
            $delateResult = mb_substr($start, 0, $searchCount);
            return $delateResult;    
        }

        return $start;
    }

    public function getEnd()
    {
        $end = $this->end;

        if(mb_strpos($end, "日本") === 0) {
            $searchCount = mb_strpos($end, " ")+1;
            $delateResult = mb_substr($end, $searchCount);
            return $delateResult;    
        }

        $purposeCount = mb_strlen($end)-2;
        if(mb_strpos($end, "日本", $purposeCount) !== false) {
            $searchCount = mb_strpos($end, ",");
            $delateResult = mb_substr($end, 0, $searchCount);
            return $delateResult;    
        }

        return $end;
    }

    public function getPlace1()
    {
        $place1 = $this->place1;

        if(mb_strpos($place1, "日本") === 0) {
            $searchCount = mb_strpos($place1, " ")+1;
            $delateResult = mb_substr($place1, $searchCount);
            return $delateResult;    
        }

        $purposeCount = mb_strlen($place1)-2;
        if(mb_strpos($place1, "日本", $purposeCount) !== false) {
            $searchCount = mb_strpos($place1, ",");
            $delateResult = mb_substr($place1, 0, $searchCount);
            return $delateResult;    
        }

        return $place1;
    }

    public function getPlace2()
    {
        $place2 = $this->place2;

        if(mb_strpos($place2, "日本") === 0) {
            $searchCount = mb_strpos($place2, " ")+1;
            $delateResult = mb_substr($place2, $searchCount);
            return $delateResult;    
        }

        $purposeCount = mb_strlen($place2)-2;
        if(mb_strpos($place2, "日本", $purposeCount) !== false) {
            $searchCount = mb_strpos($place2, ",");
            $delateResult = mb_substr($place2, 0, $searchCount);
            return $delateResult;    
        }

        return $place2;
    }


    public function getPlace3()
    {
        $place3 = $this->place3;

        if(mb_strpos($place3, "日本") === 0) {
            $searchCount = mb_strpos($place3, " ")+1;
            $delateResult = mb_substr($place3, $searchCount);
            return $delateResult;    
        }

        $purposeCount = mb_strlen($place3)-2;
        if(mb_strpos($place3, "日本", $purposeCount) !== false) {
            $searchCount = mb_strpos($place3, ",");
            $delateResult = mb_substr($place3, 0, $searchCount);
            return $delateResult;    
        }

        return $place3;
    }

    public function getPlace4()
    {
        $place4 = $this->place4;

        if(mb_strpos($place4, "日本") === 0) {
            $searchCount = mb_strpos($place4, " ")+1;
            $delateResult = mb_substr($place4, $searchCount);
            return $delateResult;    
        }

        $purposeCount = mb_strlen($place4)-2;
        if(mb_strpos($place4, "日本", $purposeCount) !== false) {
            $searchCount = mb_strpos($place4, ",");
            $delateResult = mb_substr($place4, 0, $searchCount);
            return $delateResult;    
        }

        return $place4;
    }

    public function getPlace5()
    {
        $place5 = $this->place5;

        if(mb_strpos($place5, "日本") === 0) {
            $searchCount = mb_strpos($place5, " ")+1;
            $delateResult = mb_substr($place5, $searchCount);
            return $delateResult;    
        }

        $purposeCount = mb_strlen($place5)-2;
        if(mb_strpos($place5, "日本", $purposeCount) !== false) {
            $searchCount = mb_strpos($place5, ",");
            $delateResult = mb_substr($place5, 0, $searchCount);
            return $delateResult;    
        }

        return $place5;
    }


}
