<section>

    <span id="address_general_result"></span>


    <div class="container-fluid">
        @if(auth()->user()->can('store-details-employee') || auth()->user()->id == $employee->id)
            <button type="button" class="btn btn-info" name="create_record" id="create_address_record"><i
                        class="fa fa-plus"></i>{{__('Add Address')}}</button>
        @endif
    </div>


    <div class="table-responsive">
        <table id="address-table" class="table">
            <thead>
            <tr>
                <th>{{trans('file.Address')}}</th>
                <th>{{trans('file.Country')}}</th>
                <th>{{trans('file.Province')}}</th>
                <th>{{trans('file.City')}}</th>
                <th>{{trans('file.Family Code')}}</th>
                <th>{{trans('file.Zip Code')}}</th>
                <th class="not-exported">{{trans('file.action')}}</th>
            </tr>
            </thead>
        </table>
    </div>


    <div id="AddressformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{__('Add Address')}}</h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="address-close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="address_form_result"></span>
                    <form method="post" id="address_sample_form" class="form-horizontal" autocomplete="off">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 form-group">
                                <label>{{trans('file.Address')}} *</label>
                                <input type="text" name="address" id="employee_address"
                                       placeholder="{{__('Address')}}"
                                       required class="form-control mb-2">
                            </div>

                       
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('file.Country') }}</label>
                                    <select name="country" id="address_country" required
                                            class="form-control selectpicker"
                                            data-live-search="true" data-live-search-style="contains"
                                            title="{{ __('Selecting', ['key' => trans('file.Country')]) }}...">
                                        @foreach($countries as $country)
                                            {{-- <option value="{{ $country->id }}" {{ ($employee->employeeAddress->country == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option> --}}
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('file.Province') }}</label>
                                    <select name="province_id" id="address_province" required
                                            class="form-control selectpicker"
                                            data-live-search="true" data-live-search-style="contains"
                                            title="{{ __('Selecting', ['key' => trans('file.Province')]) }}...">
                                            {{-- options for province  --}}
                                            {{-- <option value="select">1</option> --}}

                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('file.City') }}</label>
                                    <select name="city_id" id="address_city" required
                                            class="form-control selectpicker"
                                            data-live-search="true" data-live-search-style="contains"
                                            title="{{ __('Selecting', ['key' => trans('file.City')]) }}...">
                                            {{-- options for city  --}}
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4 form-group">
                                <label>{{trans('file.Zip')}} </label>
                                <input type="text" name="zip_code" id="address_zip_code"
                                       placeholder="{{trans('file.Zip')}}"
                                       required class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>{{trans('file.Family Code')}} </label>
                                <input type="text" name="family_code" id="family_code"
                                       placeholder="{{trans('file.Family Code')}}"
                                       required class="form-control">
                            </div>
                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="address_action"/>
                                    <input type="hidden" name="hidden_id" id="address_hidden_id"/>
                                    <input type="submit" name="action_button" id="address_action_button"
                                           class="btn btn-warning" value={{trans('file.Add')}} />
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade confirmModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">{{trans('file.Confirmation')}}</h2>
                    <button type="button" class="address-close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">{{__('Are you sure you want to remove this data?')}}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"  class="btn btn-danger address-ok">{{trans('file.OK')}}</button>
                    <button type="button" class="address-close btn-default" data-dismiss="modal">{{trans('file.Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>

</section>

