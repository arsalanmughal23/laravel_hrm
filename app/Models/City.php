<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'province_id',
        'status_id'

     ];
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function status(){
        return $this->belongsTo(Constant::class,'status_id');
    }
}
