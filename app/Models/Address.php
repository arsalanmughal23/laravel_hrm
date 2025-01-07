<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
   
    protected $guarded = [];
    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
    //
    public function getCountry(){
        return $this->belongsTo(Country::class,'country');
    }
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}
