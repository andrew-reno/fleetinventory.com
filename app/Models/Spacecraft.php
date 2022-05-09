<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spacecraft extends Model
{
    use HasFactory;
    
     public function getAll($filter = null, $param)
    {

        $sc = Spacecraft::query();

        if ($filter and $param) {
            $sc ->where($filter,$param);
		}
        return $sc ->get();

    }
}
