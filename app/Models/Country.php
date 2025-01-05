<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
	protected $table='countries';

    protected $fillable = [
        'name',
        'code',
        'status_id'
    ];

    public function provinces(){
        return $this->hasMany(Province::class);
    }
    public function status(){
        return $this->belongsTo(Constant::class,'status_id');
    }
}
