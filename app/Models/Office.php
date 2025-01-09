<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Office extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'joining_date' => 'date', 
        'confirmation_date' => 'date', 
        'contract_start_date' => 'date', 
        'contract_end_date' => 'date', 
        'resign_date' => 'date', 
        'leaving_date' => 'date', 
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function leavingReason(){
        return $this->belongsTo(Constant::class,'leaving_reason_id');
    }
    public function company()
    {
        return $this->belongsTo(company::class);
    }
    public function department()
    {
        return $this->belongsTo(department::class);
    }
    public function designation()
    {
        return $this->belongsTo(designation::class);
    }
    public function officeShift()
    {
        return $this->belongsTo(office_shift::class);
    }
}
