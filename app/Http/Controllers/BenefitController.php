<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BenefitController extends Controller
{
	public function index()
	{
		//
	}
	public function store(Request $request, Employee $employee)
	{
		$logged_user = auth()->user();
		if ($logged_user->can('store-details-employee') || $logged_user->id == $employee) {
			$validator = Validator::make(
				$request->only('social_security_number', 'registration_number'),
				[
					'social_security_number' => 'required',
					'registration_number' => 'required'
				]
			);
			if ($validator->fails()) {
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			$data = [];
			$data = $request->only('social_security_number', 'registration_number');
			$employee->benefits()->create($data);
			return response()->json(['success' => __('Data Added successfully.')]);
		}

		return abort('403', __('You are not authorized'));
	}
	public function show(Employee $employee)
	{
		$logged_user = auth()->user();
		$employee_id = $employee->id;

		if ($logged_user->can('view-details-employee') || $logged_user->id == $employee_id) {
			if (request()->ajax()) {
				return datatables()->of(Benefit::with('employee')->where('employee_id', $employee->id)->get())
					->setRowId(function ($benefits) {
						return $benefits->id;
					})
					->addColumn('employee', function ($row) {
						return $row->employee?->full_name;
					})
					->addColumn('action', function ($data) use ($logged_user, $employee_id) {
						if ($logged_user->can('modify-details-employee') || $logged_user->id == $employee_id) {
							$button = '<button type="button" name="edit" id="' . $data->id . '" class="benefits_edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
							$button .= '&nbsp;&nbsp;';
							$button .= '<button type="button" name="delete" id="' . $data->id . '" class="benefits_delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

							return $button;
						} else {
							return '';
						}
					})
					->rawColumns(['action'])
					->make(true);
			}
		}
	}

	public function edit($id)
	{
		if (request()->ajax()) {
			$data = Benefit::findOrFail($id);
			return response()->json(['data' => $data]);
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request)
	{
		// dd('TESTING: ', $request->all());
		$id = $request->hidden_id;
		$logged_user = auth()->user();
		if ($logged_user->can('modify-details-employee') || $logged_user->id == $id) {
			$validator = Validator::make(
				$request->only('social_security_number', 'registration_number'),
				[
					'social_security_number' => 'required',
					'registration_number' => 'required'
				]
			);
			if ($validator->fails()) {
				return response()->json(['errors' => $validator->errors()->all()]);
			}

			$data = [];
			$data = $request->only('social_security_number', 'registration_number');
			Benefit::whereId($id)->update($data);

			return response()->json(['success' => __('Data is successfully updated')]);
		} else {

			return response()->json(['success' => __('You are not authorized')]);
		}
	}
	public function destroy($id)
	{
		$logged_user = auth()->user();
		if ($logged_user->can('modify-details-employee') || $logged_user->id == $id) {
			Benefit::whereId($id)->delete();
			return response()->json(['success' => __('Data is successfully deleted')]);
		}

		return response()->json(['success' => __('You are not authorized')]);
	}
}
