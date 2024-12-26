<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id',
        'status_id'

     ];
    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function cities(){
        return $this->hasMany(City::class);
    }
    public function status(){
        return $this->belongsTo(Constant::class,'status_id');
    }
}
