@if (auth()->user()->can('store-details-employee') || auth()->user()->id == $employee->id)

    <div class="modal-body">
        <span id="office_form_result"></span>
        <form method="post" id="office_sample_form" class="form-horizontal"
            action="{{ route('office.store', $employee->id) }}">

            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Company')}} <span class="text-danger">*</span></label>
                        <select name="company_id" id="company_id" required
                                class="form-control selectpicker dynamic"
                                data-live-search="true" data-live-search-style="contains"
                                data-shift_name="shift_name" data-dependent="department_name"
                                title="{{__('Selecting',['key'=>trans('file.Company')])}}...">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}" {{($employee->office?->company_id == $company->id) ? 'selected' : ''}}>{{$company->company_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Department')}} <span class="text-danger">*</span></label>
                        <select name="department_id" id="department_id" required
                                class="selectpicker form-control designation"
                                data-live-search="true" data-live-search-style="contains"
                                data-designation_name="designation_name"
                                title="{{__('Selecting',['key'=>trans('file.Department')])}}...">
                            {{-- populate designations based on selected company --}}
                            @if($employee->office)
                            @foreach($selected_departments as $department)
                                <option value="{{$department->id}}" {{($employee->office->department_id == $department->id) ? 'selected' : ''}}>{{$department->department_name}}</option>
                            @endforeach    
                            @endif
                                
                        </select>
                    </div>
                </div>


                <div class="col-md-6 form-group">
                    <label class="text-bold">{{trans('file.Designation')}} <span class="text-danger">*</span></label>
                    <select name="designation_id" id="designation_id" required class="selectpicker form-control"
                            data-live-search="true" data-live-search-style="contains"
                            title="{{__('Selecting',['key'=>trans('file.Designation')])}}...">
                            {{-- populate departments based on selected designation --}}
                            @if($employee->office)
                            @foreach($selected_designations as $designation)
                                <option value="{{$designation->id}}" {{($employee->office->designation_id == $designation->id) ? 'selected' : ''}}>{{$designation->designation_name}}</option>
                            @endforeach    
                            @endif
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label class="text-bold">{{trans('file.Office_Shift')}} <span class="text-danger">*</span></label>
                    <select name="office_shift_id" id="office_shift_id" required class="selectpicker form-control"
                            data-live-search="true" data-live-search-style="contains"
                            title="{{__('Selecting',['key'=>trans('file.Office_Shift')])}}...">
                            {{-- populate office shifts based on selected company --}}
                            @if($employee->office)
                            @foreach($selected_office_shifts as $office_shift)
                                <option value="{{$office_shift->id}}" {{($employee->office->office_shift_id == $office_shift->id) ? 'selected' : ''}}>{{$office_shift->shift_name}}</option>
                            @endforeach    
                            @endif
                    </select>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Station')}} <span class="text-danger">*</span></label>
                        <select name="station_id" id="station_id" required
                                class="form-control selectpicker"
                                data-live-search="true" data-live-search-style="contains"
                                title="{{__('Selecting',['key'=>trans('file.Station')])}}...">
                            @foreach($stations as $station)
                                <option value="{{$station->id}}" {{$station->id == $employee->office?->station_id ? 'selected' : ''}}>
                                    {{$station->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Region')}} <span class="text-danger">*</span></label>
                        <select name="region_id" id="region_id" required
                                class="form-control selectpicker"
                                data-live-search="true" data-live-search-style="contains"
                                title="{{__('Selecting',['key'=>trans('file.Region')])}}...">
                            @foreach($regions as $region)
                                <option value="{{$region->id}}" {{$region->id == $employee->office?->region_id ? 'selected' : ''}}>
                                   
                                    {{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Cost Center')}} <span class="text-danger">*</span></label>
                        <select name="cost_center_id" id="cost_center_id" required
                                class="form-control selectpicker"
                                data-live-search="true" data-live-search-style="contains"
                                title="{{__('Selecting',['key'=>trans('file.Cost Center')])}}...">
                            @foreach($cost_centers as $cost_center)
                                <option value="{{$cost_center->id}}" {{$cost_center->id == $employee->office?->cost_center_id ? 'selected' : ''}}>
                                    {{$cost_center->text}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label class="text-bold">{{__('Date Of Joining')}} <span class="text-danger">*</span></label>
                    <input type="text" name="joining_date" id="joining_date_id" placeholder="{{ trans('file.Joining Date') }}"
                        class="form-control date" value="{{ $employee->office?->joining_date->format('d-m-Y') }}">
                </div>
              
                <div class="col-md-6 form-group">
                    <label>{{ __('Confirmation Date') }}</label>
                    <input type="text" name="confirmation_date" id="confirmation_date_id" placeholder="{{ trans('file.Confirmation Date') }}"
                        class="form-control date" value="{{ $employee->office?->confirmation_date->format('d-m-Y') }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>{{ __('Expected Confirmation Days') }}</label>
                    <input type="number" name="expected_confirmation_days" id="expected_confirmation_days_id" placeholder="{{ trans('file.Expected Confirmation Days') }}"
                        class="form-control text-left" value="{{ $employee->office?->expected_confirmation_days }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>{{ __('Contract Start Date') }}</label>
                    <input type="text" name="contract_start_date" id="contract_start_date_id" placeholder="{{ trans('file.Contract Start Date') }}"
                        class="form-control date" value="{{ $employee->office?->contract_start_date->format('d-m-Y') }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>{{ __('Contract End Date') }}</label>
                    <input type="text" name="contract_end_date" id="contract_end_date_id'" placeholder="{{ trans('file.Contract End Date') }}"
                        class="form-control date" value="{{ $employee->office?->contract_end_date->format('d-m-Y') }}">
                </div>

                <div class="col-md-6 form-group">
                    <label>{{ __('Resign Date') }}</label>
                    <input type="text" name="resign_date" id="resign_date_id" placeholder="{{ trans('file.Resign Date') }}"
                        class="form-control date" value="{{ $employee->office?->resign_date->format('d-m-Y') }}">
                </div>
                <div class="col-md-6 form-group">
                    <label>{{ __('Leaving Date') }}</label>
                    <input type="text" name="leaving_date" id="leaving_date_id" placeholder="{{ trans('file.Leaving Date') }}"
                        class="form-control date" value="{{ $employee->office?->leaving_date->format('d-m-Y') }}">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Leaving Reason')}}</label>
                        <select name="leaving_reason_id" id="leaving_reason_id" required
                                class="form-control selectpicker"
                                data-live-search="true" data-live-search-style="contains"
                                title="{{__('Selecting',['key'=>trans('file.Leaving Reason')])}}...">
                                @foreach ($leaving_reasons as $leaving_reason )
                                    <option value="{{$leaving_reason->id}}" {{$leaving_reason->id == $employee->office?->leaving_reason_id ? 'selected' : ''}}>
                                        {{$leaving_reason->text}}</option>
                                @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Employee Status')}} <span class="text-danger">*</span></label>
                        <select name="employee_status_id" id="employee_status_id" required
                                class="form-control selectpicker"
                                data-live-search="true" data-live-search-style="contains"
                                title="{{__('Selecting',['key'=>trans('file.Employee Status')])}}...">
                                @foreach ($employee_statuses as $employee_status )
                                    <option value="{{$employee_status->id}}" {{$employee_status->id == $employee->office?->employee_status_id ? 'selected' : ''}}>
                                        {{$employee_status->text}}</option>
                                @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.Status')}} <span class="text-danger">*</span></label>
                        <select name="status_id" id="status_id" required
                                class="form-control selectpicker"
                                data-live-search="true" data-live-search-style="contains"
                                title="{{__('Selecting',['key'=>trans('file.Status')])}}...">
                                @foreach ($general_statuses as $general_status )
                                <option value="{{$general_status->id}}" {{$general_status->id == $employee->office?->status_id ? 'selected' : ''}}>
                                    {{$general_status->text}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-bold">{{trans('file.GL Class')}} <span class="text-danger">*</span></label>
                        <select name="gl_class_id" id="gl_class_id" required
                                class="form-control selectpicker"
                                data-live-search="true" data-live-search-style="contains"
                                title="{{__('Selecting',['key'=>trans('file.GL Class')])}}...">
                                @foreach ($gl_classes as $gl_class )
                                <option value="{{$gl_class->id}}" {{$gl_class->id == $employee->office?->gl_class_id ? 'selected' : ''}}>
                                    {{$gl_class->text}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="col-md-6 form-group">
                    <label>{{ __('Password') }}</label>
                    <input type="text" name="password" id="password_id" placeholder="{{ trans('file.Password') }}"
                        class="form-control" value="">
                </div>
            </div>
            <div class="form-group row">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('file.Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endif



 @push('scripts')
    <script type="text/javascript">
    $('#office_sample_form').on('submit', function (event) {
        event.preventDefault();
       
        $.ajax({
            url: "{{ route('office.store',$employee->id) }}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                }
                $('#office_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
            }
        });
    });
    $('.dynamic').change(function () {
        if ($(this).val() !== '') {
            $('select#designation_id').empty();

            let value = $(this).val();
            let dependent = $(this).data('dependent');
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('dynamic_department') }}",
                method: "POST",
                data: {value: value, _token: _token, dependent: dependent},
                success: function (result) {
                    console.log(`result: ${result}`);

                    $('select#department_id').selectpicker("destroy");                    
                    $('select#department_id').html(result);
                    $('select#department_id').selectpicker('refresh');
                    // $('select').selectpicker();
                }
            });
                dependent = $(this).data('shift_name');
            $.ajax({
                url: "{{ route('dynamic_office_shifts') }}",
                method: "POST",
                data: {value: value, _token: _token, dependent: dependent},
                success: function (result) {
                    $('select#office_shift_id').selectpicker("destroy");                    
                    $('select#office_shift_id').html(result);
                    $('select#office_shift_id').selectpicker('refresh');

                }
            });
        }
    });
    $('.designation').change(function () {
        if ($(this).val() !== '') {
            let value = $(this).val();
            let designation_name = $(this).data('designation_name');
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('dynamic_designation_department') }}",
                method: "POST",
                data: {value: value, _token: _token, designation_name: designation_name},
                success: function (result) {
                    $('select#designation_id').selectpicker("destroy");
                    $('select#designation_id').html(result);
                    $('select#designation_id').selectpicker('refresh');
                    

                }
            });
        }
    });
    </script>
@endpush 
