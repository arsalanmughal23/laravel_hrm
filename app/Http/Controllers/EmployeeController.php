<?php

namespace App\Http\Controllers;

use App\Enums\ConstantEnum;
use App\Models\company;
use App\Models\DeductionType;
use App\Models\department;
use App\Models\designation;
use App\Models\DocumentType;
use App\Models\Employee;
use App\Http\traits\LeaveTypeDataManageTrait;
use App\Imports\UsersImport;
use App\Models\City;
use App\Models\Constant;
use App\Models\Country;
use App\Models\LoanType;
use App\Models\office_shift;
use App\Models\Province;
use App\Models\QualificationEducationLevel;
use App\Models\QualificationLanguage;
use App\Models\QualificationSkill;
use App\Models\Region;
use App\Models\RelationType;
use App\Models\Religion;
use App\Models\Station;
use App\Models\status;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Spatie\Permission\Models\Role;
use Throwable;

class EmployeeController extends Controller
{
    use LeaveTypeDataManageTrait;


    protected function getEmployees($request, $currentDate)
    {
        if ($request->company_id && $request->department_id && $request->designation_id && $request->office_shift_id) {
            $employees = Employee::with('user:id,profile_photo,username', 'company:id,company_name', 'department:id,department_name', 'designation:id,designation_name', 'officeShift:id,shift_name')
                ->where('company_id', '=', $request->company_id)
                ->where('department_id', '=', $request->department_id)
                ->where('designation_id', '=', $request->designation_id)
                ->where('office_shift_id', '=', $request->office_shift_id)
                ->where('is_active', 1)
                ->where(function($query) use ($currentDate) {
                    $query->whereNull('exit_date')
                    ->orWhere('exit_date', '>=', $currentDate)
                    ->orWhere('exit_date', '0000-00-00');
                })
                ->get();
        } elseif ($request->company_id && $request->department_id && $request->designation_id) {
            $employees = Employee::with('user:id,profile_photo,username', 'company:id,company_name', 'department:id,department_name', 'designation:id,designation_name', 'officeShift:id,shift_name')
                ->where('company_id', '=', $request->company_id)
                ->where('department_id', '=', $request->department_id)
                ->where('designation_id', '=', $request->designation_id)
                ->where('is_active', 1)
                ->where(function($query) use ($currentDate) {
                    $query->whereNull('exit_date')
                    ->orWhere('exit_date', '>=', $currentDate)
                    ->orWhere('exit_date', '0000-00-00');
                })
                ->get();
        } elseif ($request->company_id && $request->department_id) {
            $employees = Employee::with('user:id,profile_photo,username', 'company:id,company_name', 'department:id,department_name', 'designation:id,designation_name', 'officeShift:id,shift_name')
                ->where('company_id', '=', $request->company_id)
                ->where('department_id', '=', $request->department_id)
                ->where('is_active', 1)
                ->where(function($query) use ($currentDate) {
                    $query->whereNull('exit_date')
                    ->orWhere('exit_date', '>=', $currentDate)
                    ->orWhere('exit_date', '0000-00-00');
                })
                ->get();
        } elseif ($request->company_id && $request->office_shift_id) {
            $employees = Employee::with('user:id,profile_photo,username', 'company:id,company_name', 'department:id,department_name', 'designation:id,designation_name', 'officeShift:id,shift_name')
                ->where('company_id', '=', $request->company_id)
                ->where('office_shift_id', '=', $request->office_shift_id)
                ->where('is_active', 1)
                ->where(function($query) use ($currentDate) {
                    $query->whereNull('exit_date')
                    ->orWhere('exit_date', '>=', $currentDate)
                    ->orWhere('exit_date', '0000-00-00');
                })
                ->get();
        } elseif ($request->company_id) {
            $employees = Employee::with('user:id,profile_photo,username', 'company:id,company_name', 'department:id,department_name', 'designation:id,designation_name', 'officeShift:id,shift_name')
                ->where('company_id', '=', $request->company_id)
                ->where('is_active', 1)
                ->where(function($query) use ($currentDate) {
                    $query->whereNull('exit_date')
                    ->orWhere('exit_date', '>=', $currentDate)
                    ->orWhere('exit_date', '0000-00-00');
                })
                ->get();
        } else {
            $employees = Employee::with('user:id,profile_photo,username', 'company:id,company_name', 'department:id,department_name', 'designation:id,designation_name', 'officeShift:id,shift_name','employeeGender:id,text')
                ->orderBy('company_id')
                ->where('is_active', 1)
                ->where(function($query) use ($currentDate) {
                    $query->whereNull('exit_date')
                    ->orWhere('exit_date', '>=', $currentDate)
                    ->orWhere('exit_date', '0000-00-00');
                })
                ->get();
        }

        return $employees;
    }

    public function index(Request $request)
    {
        $logged_user = auth()->user();
        if ($logged_user->can('view-details-employee')) {
            $companies        = company::select('id', 'company_name')->active()->get();
            $roles            = Role::where('id', '!=', 3)->where('is_active', 1)->select('id', 'name')->get();
            $employees        = Employee::select('id','first_name','last_name')->active()->get();
            $religions        = Religion::select('id','name')->orderBy('name')->get();
            $genders          = Constant::where('group',ConstantEnum::GROUP_USER)
                                ->where('key',ConstantEnum::KEY_GENDER)
                                ->active()
                                ->get();
            $marital_statuses = Constant::where('group',ConstantEnum::GROUP_USER)
                                        ->where('key',ConstantEnum::KEY_MARITAL_STATUS)
                                        ->active()
                                        ->get();
            $currentDate = date('Y-m-d');

            if (request()->ajax()) {


                $employees = $this->getEmployees($request, $currentDate);

                return datatables()->of($employees)
                    ->setRowId(function ($row) {
                        return $row->id;
                    })
                    ->addColumn('name', function ($row) {
                        if ($row->user->profile_photo) {
                            $url = url('uploads/profile_photos/'.$row->user->profile_photo);
                            $profile_photo = '<img src="'.$url.'" class="profile-photo md" style="height:35px;width:35px"/>';
                        } else {
                            $url = url('logo/avatar.jpg');
                            $profile_photo = '<img src="'.$url.'" class="profile-photo md" style="height:35px;width:35px"/>';
                        }
                        $name = '<span><a href="employees/'.$row->id.'" class="d-block text-bold" style="color:#24ABF2">'.$row->full_name.'</a></span>';
                        $username = '<span>'.__('file.Username').': '.($row->user->username ?? '').'</span>';
                        $staff_id = '<span>'.__('file.Staff Id').': '.($row->staff_id ?? '').'</span>';
                        $gender = '';
                        if ($row->gender_id != null) {
                            $gender = '<span>'.__('file.Gender').': '.__('file.'.$row->employeeGender->text ?? '').'</span></br>';
                        }

                        $shift = '<span>'.__('file.Shift').': '.($row->officeShift->shift_name ?? '').'</span>';
                        if (config('variable.currency_format') == 'suffix') {
                            $salary = '<span>'.__('file.Salary').': '.($row->basic_salary ?? '').' '.config('variable.currency').'</span>';
                        } else {
                            $salary = '<span>'.__('file.Salary').': '.config('variable.currency').' '.($row->basic_salary ?? '').'</span>';
                        }

                        if ($row->payslip_type) {
                            $payslip_type = '<span>'.__('file.Payslip Type').': '.__('file.'.$row->payslip_type).'</span>';
                        } else {
                            $payslip_type = ' ';
                        }

                        return "<div class='d-flex'>
                                        <div class='mr-2'>".$profile_photo.'</div>
                                        <div>'
                                            .$name.'</br>'.$username.'</br>'.$staff_id.'</br>'.$gender.$shift.'</br>'.$salary.'</br>'.$payslip_type;

                    })
                    ->addColumn('company', function ($row) {
                        $company = "<span class='text-bold'>".strtoupper($row->company->company_name ?? '').'</span>';
                        $department = '<span>'.__('file.Department').' : '.($row->office->department->department_name ?? '').'</span>';
                        $designation = '<span>'.__('file.Designation').' : '.($row->office->designation->designation_name ?? '').'</span>';

                        return $company.'</br>'.$department.'</br>'.$designation;
                    })
                    ->addColumn('contacts', function ($row) {
                        $email = "<i class='fa fa-envelope text-muted' title='Email'></i> ".$row->email;
                        $contact_no = "<i class='text-muted fa fa-phone' title='Phone'></i> ".$row->contact_no;
                        $skype_id = "<i class='text-muted fa fa-skype' title='Skype'></i> ".$row->skype_id;
                        $whatsapp_id = "<i class='text-muted fa fa-whatsapp' title='Whats App'></i> ".$row->whatsapp_id;

                        return $email.'</br>'.$contact_no.'</br>'.$skype_id.'</br>'.$whatsapp_id;
                    })
                    ->addColumn('action', function ($data) {
                        $button = '';
                        if (auth()->user()->can('view-details-employee')) {
                            $button .= '<a href="employees/'.$data->id.'"  class="edit btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="View Details"><i class="dripicons-preview"></i></button></a>';
                            $button .= '&nbsp;&nbsp;&nbsp;';
                        }
                        if (auth()->user()->can('modify-details-employee')) {
                            if ($data->role_users_id != 1) {
                                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete"><i class="dripicons-trash"></i></button>';
                                $button .= '&nbsp;&nbsp;&nbsp;';
                            }

                            $button .= '<a class="download btn-sm" style="background:#FF7588; color:#fff" title="PDF" href="'.route('employees.pdf', $data->id).'"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';
                        }

                        return $button;
                    })
                    ->rawColumns(['name', 'company', 'contacts', 'action'])
                    ->make(true);
            }
            return view('employee.index', compact('companies','roles','employees','genders','marital_statuses','religions'));
        } else {
            return response()->json(['success' => __('You are not authorized')]);
        }
    }

    public function store(Request $request)
    {
        Log::debug([$request->all()]);
        $logged_user = auth()->user();

        if ($logged_user->can('store-details-employee')) {
            if (request()->ajax()) {
                $validator = Validator::make($request->only('first_name', 'last_name', 'staff_id', 'email', 'contact_no', 'date_of_birth', 'place_of_birth' ,
                    'gender_id','marital_status_id', 'report_to_employee_id',
                    'religion_id', 'employee_code','punch_code',
                    'username', 'role_users_id', 'password', 'password_confirmation', 'attendance_type','allow_login','allow_manual_attendance'),
                    [
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'staff_id' => 'required|numeric|unique:employees',
                        'email' => 'nullable|email|unique:users',
                        'contact_no' => 'required|numeric|unique:users',
                        'date_of_birth' => 'required',
                        'place_of_birth' => 'required',
                        'username' => 'required|unique:users',
                        'role_users_id' => 'required',
                        'password' => 'required|min:4|confirmed',
                        'attendance_type' => 'required',
                        'profile_photo' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif',
                        'employee_code' => 'required',
                        'punch_code' => 'required',
                        'gender_id' => 'required',
                        'marital_status_id' => 'required',
                        'report_to_employee_id' => 'required',
                        'religion_id' => 'required',
                    ]
                );

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }

                $data = [];
                $data = $request->only('first_name', 'last_name', 'staff_id', 'email', 'contact_no', 'date_of_birth', 'place_of_birth' ,
                'gender_id','marital_status_id', 'cnic','cnic_issuance_date','report_to_employee_id', 'employee_code','punch_code',
                'religion_id','role_users_id','attendance_type','allow_login','allow_manual_attendance');
                $data['is_active'] = 1;
                $data['email'] = strtolower(trim($request->email));

                $user = [];
                $user['first_name'] = $request->first_name;
                $user['last_name'] = $request->last_name;
                $user['username'] = strtolower(trim($request->username));
                $user['email'] = strtolower(trim($request->email));
                $user['password'] = bcrypt($request->password);
                $user['role_users_id'] = $request->role_users_id;
                $user['contact_no'] = $request->contact_no;
                $user['is_active'] = 1;

                $photo = $request->profile_photo;
                $file_name = null;

                if (isset($photo)) {
                    $new_user = $request->username;
                    if ($photo->isValid()) {
                        $file_name = preg_replace('/\s+/', '', $new_user).'_'.time().'.'.$photo->getClientOriginalExtension();
                        $photo->storeAs('profile_photos', $file_name);
                        $user['profile_photo'] = $file_name;
                    }
                }

                DB::beginTransaction();
                try {
                    $created_user = User::create($user);
                    $created_user->syncRoles($request->role_users_id); //new

                    $data['id'] = $created_user->id;

                    $employee = employee::create($data);
                    $this->allLeaveTypeDataNewlyStore($employee);

                    DB::commit();
                } catch (Exception $e) {
                    DB::rollback();

                    return response()->json(['error' => $e->getMessage()]);
                } catch (Throwable $e) {
                    DB::rollback();

                    return response()->json(['error' => $e->getMessage()]);
                }

                return response()->json(['success' => __('Data Added successfully.')]);
            }
        }

        return response()->json(['success' => __('You are not authorized')]);
    }

    public function show(Employee $employee)
    {
        if (auth()->user()->can('view-details-employee')) {
            $companies = Company::select('id', 'company_name')->active()->get();
            $departments = department::select('id', 'department_name')
                ->where('company_id', $employee->company_id)
                ->get();

            $designations = designation::select('id', 'designation_name')
                ->where('department_id', $employee->department_id)
                ->get();

            $office_shifts = office_shift::select('id', 'shift_name')
                ->where('company_id', $employee->company_id)
                ->get();

            $statuses = status::select('id', 'status_title')->get();
            // $roles = Role::select('id', 'name')->get();
            $countries = Country::whereRelation('status',function($query){
                                    $query->where('active',true);
                                })->select('id', 'name')
                                ->get();
            $cities = City::whereRelation('status',function($query){
                                    $query->where('active',true);
                                })->select('id', 'name')
                                ->get();
            $provinces = Province::whereRelation('status',function($query){
                                    $query->where('active',true);
                                })->select('id', 'name')
                                ->get();
            $document_types = DocumentType::select('id', 'document_type')->get();

            $education_levels = QualificationEducationLevel::select('id', 'name')->get();
            $language_skills = QualificationLanguage::select('id', 'name')->get();
            $general_skills = QualificationSkill::select('id', 'name')->get();
            $relationTypes = RelationType::select('id','type_name')->get();
            $loanTypes = LoanType::select('id','type_name')->get();
            $deductionTypes = DeductionType::select('id','type_name')->get();
            $roles = Role::where('id', '!=', 3)->where('is_active', 1)->select('id', 'name')->get();
            $all_departments = department::select('id', 'department_name')->get();
            $all_designations = designation::select('id', 'designation_name')->get();
            $stations = Station::select('id', 'name')->get();
            $regions = Region::select('id', 'name')->get();
            $cost_centers = Constant::where('group',ConstantEnum::GROUP_EMPLOYEE)
                                        ->where('key',ConstantEnum::KEY_COST_CENTER)
                                        ->get();
            $leaving_reasons = Constant::where('group',ConstantEnum::GROUP_EMPLOYEE)
                                        ->where('key',ConstantEnum::KEY_LEAVING_REASON)
                                        ->active()
                                        ->get();
            $employee_status = Constant::where('group',ConstantEnum::GROUP_EMPLOYEE)
                                        ->where('key',ConstantEnum::KEY_EMP_STATUS)
                                        ->get();
            $all_status = Constant::where('group',ConstantEnum::GROUP_EMPLOYEE)
                                        ->where('key',ConstantEnum::KEY_STATUS)
                                        ->get();
            $gl_classes = Constant::where('group',ConstantEnum::GROUP_EMPLOYEE)
                                        ->where('key',ConstantEnum::KEY_GL_CLASS)
                                        ->get();
            $bank_account_types = Constant::where('group',ConstantEnum::GROUP_EMPLOYEE)
                                        ->where('key',ConstantEnum::KEY_ACCOUNT_TYPE)
                                        ->active()
                                        ->get();
            $genders          = Constant::where('group',ConstantEnum::GROUP_USER)
                                        ->where('key',ConstantEnum::KEY_GENDER)
                                        ->active()
                                        ->get();
            $marital_statuses = Constant::where('group',ConstantEnum::GROUP_USER)
                                        ->where('key',ConstantEnum::KEY_MARITAL_STATUS)
                                        ->active()
                                        ->get();
            $employees        = Employee::select('id','first_name','last_name')->active()->get();
            $religions        = Religion::select('id','name')->get();

            return view('employee.dashboard', compact('employee', 'countries','cities','provinces', 'companies', 'all_departments', 'all_designations',
                'stations', 'regions', 'cost_centers' , 'leaving_reasons','employee_status','all_status','gl_classes','bank_account_types' ,'genders',
                 'marital_statuses','employees','religions','departments', 'designations', 'statuses', 'office_shifts', 'document_types',
                'education_levels', 'language_skills', 'general_skills', 'roles','relationTypes','loanTypes','deductionTypes'));
        } else {
            return response()->json(['success' => __('You are not authorized')]);
        }
    }
    public function getProvinces(Request $request)
    {
        $data['provinces'] = Province::where('country', $request->id)->select('id', 'name')->get();
        return response()->json($data);
    }


    public function getCities(Request $request)
    {
        $data['cities'] = City::where('province_id', $request->id)->select('id', 'name')->get();
        return response()->json($data);
    }
    
    public function destroy($id)
    {
        if (! env('USER_VERIFIED')) {
            return response()->json(['error' => 'This feature is disabled for demo!']);
        }
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee')) {
            DB::beginTransaction();
            try {
                Employee::whereId($id)->delete();
                $this->unlink($id);
                User::whereId($id)->delete();

                DB::commit();
            } catch (Exception $e) {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            } catch (Throwable $e) {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            }

            return response()->json(['success' => __('Data is successfully deleted')]);
        }

        return response()->json(['success' => __('You are not authorized')]);
    }

    public function unlink($employee)
    {

        $user = User::findOrFail($employee);
        $file_path = $user->profile_photo;

        if ($file_path) {
            $file_path = public_path('uploads/profile_photos/'.$file_path);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }

    public function delete_by_selection(Request $request)
    {
        if (! env('USER_VERIFIED')) {
            return response()->json(['error' => 'This feature is disabled for demo!']);
        }
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee')) {
            $employee_id = $request['employeeIdArray'];

            $user = User::whereIntegerInRaw('id', $employee_id)->where('role_users_id', '!=', 1);

            if ($user->delete()) {
                return response()->json(['success' => __('Data is successfully deleted')]);
            }
        }

        return response()->json(['success' => __('You are not authorized')]);
    }

    public function infoUpdate(Request $request, $employee)
    {
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee')) {
            if (request()->ajax()) {
                $validator = Validator::make($request->only('first_name', 'last_name', 'staff_id', 'email', 'contact_no', 'date_of_birth','place_of_birth', 'gender_id',
                    'username', 'role_users_id', 'employee_code','punch_code','cnic','cnic_issuance_date','religion_id','report_to_employee_id','allow_manual_attendance',
                    'marital_status_id','permission_role_id', 'attendance_type','allow_manual_attendance','allow_login'
                ),
                    [
                        'first_name' => 'required',
                        'last_name' => 'required',
                        'username' => 'required|unique:users,username,'.$employee,
                        'staff_id' => 'required|numeric|unique:employees,staff_id,'.$employee,
                        'email' => 'nullable|email|unique:users,email,'.$employee,
                        'contact_no' => 'required|numeric|unique:users,contact_no,'.$employee,
                        'date_of_birth' => 'required',
                        'place_of_birth' => 'required',
                        'role_users_id' => 'required',
                        'attendance_type' => 'required',
                        'punch_code' => 'required',
                        'employee_code' => 'required',
                        'religion_id' => 'required',
                        'report_to_employee_id' => 'required',
                        'marital_status_id' => 'required',
                        'allow_manual_attendance' => 'nullable',
                        'allow_login' => 'nullable',
                    ]
                );

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()->all()]);
                }

                $data = [];
                $allowManualAttendance = $request->has('allow_manual_attendance') ? 1 : 0;
                $allowLogin = $request->has('allow_login') ? 1 : 0;
                $data = $request->only('first_name', 'last_name', 'staff_id', 'email', 'contact_no', 'date_of_birth','place_of_birth', 'gender_id',
                'role_users_id', 'employee_code','punch_code','cnic','cnic_issuance_date','religion_id','report_to_employee_id','allow_manual_attendance',
                'marital_status_id','permission_role_id', 'attendance_type','allow_manual_attendance','allow_login'
            );
                $data['allow_manual_attendance'] = $allowManualAttendance;
                $data['allow_login'] = $allowLogin;
                $data['email'] = strtolower(trim($request->email));
                $data['is_active'] = 1;
                // dd($data);


                $user = [];
                $user['first_name'] = $request->first_name;
                $user['last_name'] = $request->last_name;
                $user['username'] = strtolower(trim($request->username));
                $user['email'] = strtolower(trim($request->email));
                $user['role_users_id'] = $request->role_users_id;
                $user['contact_no'] = $request->contact_no;
                $user['is_active'] = 1;

                // return response()->json($data);


                DB::beginTransaction();
                try {
                    User::whereId($employee)->update($user);
                    employee::find($employee)->update($data);

                    $usertest = User::find($employee); //--new--
                    $usertest->syncRoles($data['role_users_id']); //--new--

                    DB::commit();
                } catch (Exception $e) {
                    DB::rollback();

                    return response()->json(['error' => $e->getMessage()]);
                } catch (Throwable $e) {
                    DB::rollback();

                    return response()->json(['error' => $e->getMessage()]);
                }

                return response()->json(['success' => __('Data Updated successfully.')]);
            }
        }

        return response()->json(['success' => __('You are not authorized')]);
    }

    public function socialProfileShow(Employee $employee)
    {
        return view('employee.social_profile.index', compact('employee'));
    }

    public function storeSocialInfo(Request $request, $employee)
    {
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee') || $logged_user->id == $employee) {
            $data = [];
            $data['fb_id'] = $request->fb_id;
            $data['twitter_id'] = $request->twitter_id;
            $data['linkedIn_id'] = $request->linkedIn_id;
            $data['whatsapp_id'] = $request->whatsapp_id;
            $data['skype_id'] = $request->skype_id;

            Employee::whereId($employee)->update($data);

            return response()->json(['success' => __('Data is successfully updated')]);

        }

        return response()->json(['success' => __('You are not authorized')]);

    }

    public function indexProfilePicture(Employee $employee)
    {
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee')) {
            return view('employee.profile_picture.index', compact('employee'));
        }

        return response()->json(['success' => __('You are not authorized')]);
    }

    public function storeProfilePicture(Request $request, $employee)
    {
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee') || $logged_user->id == $employee) {

            $data = [];
            $photo = $request->profile_photo;
            $file_name = null;

            if (isset($photo)) {
                $new_user = $request->employee_username;
                if ($photo->isValid()) {
                    $file_name = preg_replace('/\s+/', '', $new_user).'_'.time().'.'.$photo->getClientOriginalExtension();
                    $photo->storeAs('profile_photos', $file_name);
                    $data['profile_photo'] = $file_name;
                }
            }

            $this->unlink($employee);

            User::whereId($employee)->update($data);

            return response()->json(['success' => 'Data is successfully updated', 'profile_picture' => $file_name]);

        }

        return response()->json(['success' => __('You are not authorized')]);
    }

    public function setSalary(Employee $employee)
    {
        $logged_user = auth()->user();
        if ($logged_user->can('modify-details-employee')) {
            return view('employee.salary.index', compact('employee'));
        }

        return response()->json(['success' => __('You are not authorized')]);
    }

    public function storeSalary(Request $request, $employee)
    {
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee')) {

            $validator = Validator::make($request->only('payslip_type', 'basic_salary'
            ),
                [
                    'basic_salary' => 'required|numeric',
                    'payslip_type' => 'required',
                ]
            );

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            DB::beginTransaction();
            try {
                Employee::updateOrCreate(['id' => $employee], [
                    'payslip_type' => $request->payslip_type,
                    'basic_salary' => $request->basic_salary]);
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            } catch (Throwable $e) {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            }

            return response()->json(['success' => __('Data Added successfully.')]);
        }

        return response()->json(['error' => __('You are not authorized')]);
    }

    public function employeesPensionUpdate(Request $request, $employee)
    {
        //return response()->json('ok');
        $logged_user = auth()->user();

        if ($logged_user->can('modify-details-employee')) {

            $validator = Validator::make($request->only('pension_type', 'pension_amount'), [
                'pension_type' => 'required',
                'pension_amount' => 'required|numeric',
            ]
            );

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
            }

            DB::beginTransaction();
            try {
                Employee::updateOrCreate(['id' => $employee], [
                    'pension_type' => $request->pension_type,
                    'pension_amount' => $request->pension_amount]);
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            } catch (Throwable $e) {
                DB::rollback();

                return response()->json(['error' => $e->getMessage()]);
            }

            return response()->json(['success' => __('Data Added successfully.')]);
        }

        return response()->json(['success' => __('You are not authorized')]);

    }

    public function import()
    {

        if (auth()->user()->can('import-employee')) {
            return view('employee.import');
        }

        return abort(404, __('You are not authorized'));
    }

    public function importPost()
    {

        if (! env('USER_VERIFIED')) {
            $this->setErrorMessage('This feature is disabled for demo!');

            return redirect()->back();
        }
        try {
            Excel::queueImport(new UsersImport(), request()->file('file'));
        } catch (ValidationException $e) {
            $failures = $e->failures();

            return view('employee.importError', compact('failures'));
        }

        $this->setSuccessMessage(__('Imported Successfully'));

        return back();

    }

    public function employeePDF($id)
    {
        $employee = Employee::with('user:id,profile_photo,username', 'company:id,company_name', 'department:id,department_name', 'designation:id,designation_name', 'officeShift:id,shift_name', 'role:id,name')
            ->where('id', $id)
            ->first()
            ->toArray();

        PDF::setOptions(['dpi' => 10, 'defaultFont' => 'sans-serif', 'tempDir' => storage_path('temp')]);
        $pdf = PDF::loadView('employee.pdf', $employee);
        return $pdf->download('employee.pdf');

        // return $pdf->stream();
    }
}
