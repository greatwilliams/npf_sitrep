<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitrep_Detail extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function division_details(){
    //     return $this->belongsTo(Police_station::class,'police_division','id');
    // }

    // public function lga_details(){
    //     return $this->belongsTo(lga::class,'lga','id');
    // }

    public function state_details(){
        return $this->belongsTo(Sitrep::class,'sitrep_id','sitrep_id');
    }
    

}
