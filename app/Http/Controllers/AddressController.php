<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
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
		if ($logged_user->can('store-details-employee')||$logged_user->id==$employee)
		{
			$validator = Validator::make($request->only('address','country','city_id','province_id','zip_code','family_code'),
				[
					'address' => 'required',
					'country' => 'required',
					'province_id' => 'required',
					'city_id' => 'required',
					'zip_code' => 'nullable',
					'family_code' => 'nullable',
				]
			);


			if ($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}
			$data = [];
			$data['employee_id'] =  $employee;
			$data['address'] = $request->address;
			$data['city_id'] = $request->city_id;
			$data['province_id'] = $request->province_id;
			$data['zip_code'] = $request->zip_code;
			$data['family_code'] = $request->family_code;
			$data['country'] =  $request->country;


			Address::create($data);

			return response()->json(['success' => __('Data is successfully added')]);
		}

		return abort('403', __('You are not authorized'));

	}
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
	{
        // dd($employee->employeeAddress);
		$logged_user = auth()->user();
		$employee_id = $employee->id;
		if ($logged_user->can('view-details-employee')||$logged_user->id==$employee_id)
		{
			
			if (request()->ajax())
			{
				return datatables()->of(Address::where('employee_id', $employee->id)->get())
					->setRowId(function ($address)
					{
						return $address->id;
					})
                    ->addColumn('country',function ($row)
                    {
                        return $row->getCountry->name;
                    })
                    ->addColumn('province', function ($row) {
                        return $row->province ? $row->province->name : 'N/A';
                    })
                    ->addColumn('city', function ($row) {
                        return $row->city ? $row->city->name : 'N/A';
                    })
					->addColumn('action', function ($data) use ($logged_user,$employee_id)
					{
						if ($logged_user->can('modify-details-employee')||$logged_user->id==$employee_id)
						{
						$button = '<button type="button" name="edit" id="' . $data->id . '" class="address_edit btn btn-primary btn-sm"><i class="dripicons-pencil"></i></button>';
						$button .= '&nbsp;&nbsp;';
						$button .= '<button type="button" name="delete" id="' . $data->id . '" class="address_delete btn btn-danger btn-sm"><i class="dripicons-trash"></i></button>';

						return $button;
						}
						else
						{
							return '';
						}
					})
					->rawColumns(['action'])
					->make(true);
			}
		}

	}

    /**
     * Show the form for editing the specified resource.
     */
	public function edit($id)
	{
		if(request()->ajax())
		{
			$data = Address::findOrFail($id);
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
		if ($logged_user->can('modify-details-employee')||$logged_user->id==$id)
		{
			$validator = Validator::make($request->only('address','country','city_id','province_id','zip_code','family_code'),
				[
					'address' => 'required',
					'country' => 'required',
					'province_id' => 'required',
					'city_id' => 'required',
					'zip_code' => 'nullable',
					'family_code' => 'nullable',
				]
			);
			if ($validator->fails())
			{
				return response()->json(['errors' => $validator->errors()->all()]);
			}


			$data = [];
			$data['address'] = $request->address;
			$data['city_id'] = $request->city_id;
			$data['province_id'] = $request->province_id;
			$data['zip_code'] = $request->zip_code;
			$data['family_code'] = $request->family_code;
			$data['country'] =  $request->country;

			Address::whereId($id)->update($data);

			return response()->json(['success' => __('Data is successfully updated')]);
		} else
		{

			return response()->json(['success' => __('You are not authorized')]);
		}
	}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
	{
		$logged_user = auth()->user();
		if ($logged_user->can('modify-details-employee')||$logged_user->id==$id)
		{
			Address::whereId($id)->delete();
			return response()->json(['success' => __('Data is successfully deleted')]);
		}

		return response()->json(['success' => __('You are not authorized')]);
	}
}
