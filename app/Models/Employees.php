<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->whereActive(1);
    }

    public function scopeByPaginate($query , $from , $to)
    {
        return $query->take($from?$from:0)->skip($to?$to:0);
    }

    public function location()
    {
        return $this->belongsTo(Locations::class , 'location_id' , 'id');
    }
    public function extension()
    {
        return $this->belongsTo(Extensions::class , 'extension_id' , 'id');
    }

}
