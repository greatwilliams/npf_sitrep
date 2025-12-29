<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Sitrep extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function division_details(){
        return $this->belongsTo(Police_station::class,'police_division','id');
    }

    public function dco_details(){
        return $this->belongsTo(dco::class,'assigned_to','id');
    }

    public function lga_details(){
        return $this->belongsTo(lga::class,'lga','id');
    }

    public function police_division_id(){
        return $this->belongsTo(Sitrep_Detail::class,'police_division','sitrep_id');
    }

    public function crime_type_details(){
        return $this->belongsTo(Crime_type::class,'crime_type','id');
    }
}
