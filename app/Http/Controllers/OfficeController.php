<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $employee)
    {
        // dd($request->all());
        $logged_user = auth()->user();
        $employee = Employee::find($employee);
        if ($logged_user->can('modify-details-employee') || $logged_user->id == $employee) {
            
            if (request()->ajax()) {
                $validator = Validator::make($request->only('department_id','designation_id','station_id','cost_center_id','joining_date','confirmation_date',
                'expected_confirmation_days','contract_start_date','contract_end_date','resign_date','leaving_reason_id','employee_status_id','gl_class_id',
                'region_id' ,'password','status_id','leaving_date'
                ),
                    [
                
                        'department_id' => 'required',
                        'designation_id' => 'required',
                        'station_id' => 'required',
                        'cost_center_id' => 'required',
                        'joining_date' => 'required',
                        'confirmation_date' => 'nullable',
                        'expected_confirmation_days' => 'numeric|min:0',
                        'contract_start_date' => 'nullable',
                        'contract_end_date' => 'nullable',
                        'leaving_date' => 'nullable',
                        'resign_date' => 'nullable',
                        'leaving_reason_id' => 'nullable',
                        'employee_status_id' => 'required',
                        'gl_class_id' => 'required',
                        'region_id' => 'required',
                        'status_id' => 'required',
                        'password' => 'nullable',
                    ]
                );

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }
            $data = [];
            $data = $request->only('department_id', 'designation_id', 'station_id', 'cost_center_id', 
            'joining_date', 'confirmation_date', 'expected_confirmation_days', 'contract_start_date', 
            'contract_end_date', 'resign_date', 'leaving_reason_id', 'employee_status_id', 'gl_class_id', 
            'region_id', 'status_id','leaving_date');

            $data['password'] = Hash::make($request->password);

            $record = $employee->office()->updateOrCreate(
                ['employee_id' => $employee->id], 
                $data 
            );
            if ($record->wasRecentlyCreated) {
                return response()->json(['success' => __('Data Added successfully')]);
            }            
            return response()->json(['success' => __('Data Updated successfully')]);
        }

        }
        return response()->json(['success' => __('You are not authorized')]);

    }
    /**
     * Display the specified resource.
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Office $office)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Office $office)
    {
        //
    }
}
