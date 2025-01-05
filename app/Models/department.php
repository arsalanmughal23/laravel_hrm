<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

	protected $fillable = [
		'department_name', 'company_id','department_head','is_active','main_department_id'
	];

	public function company(){
		return $this->hasOne('App\Models\company','id','company_id');
	}

	public function DepartmentHead(){
		return $this->hasOne('App\Models\Employee','id','department_head');
	}


    public function employees(){
		return $this->hasMany(Employee::class,'company_id')->orderBy("id", "ASC");
	}
	public function mainDepartment()
	{
		return $this->belongsTo(Department::class, 'main_department_id');
	}
	
	public function subDepartments()
	{
		return $this->hasMany(Department::class, 'main_department_id');
	}
	

}
