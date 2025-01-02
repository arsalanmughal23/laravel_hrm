<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'address' ,
        'employee_id' ,
        'user_id' ,
        'country',
        'province_id' ,
        'city_id' ,
        'zip_code' ,
        'family_code' ,
    ];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
