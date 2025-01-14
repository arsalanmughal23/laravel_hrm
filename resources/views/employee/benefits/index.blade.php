<section>

    <span id="benefits_general_result"></span>

    <div class="container-fluid">
        @if (auth()->user()->can('store-details-employee') || auth()->user()->id == $employee->id)
            <button type="button" class="btn btn-info" name="create_record" id="create_benefit_record"><i
                    class="fa fa-plus"></i>{{ __('Add Benefit') }}</button>
        @endif
    </div>

    <div class="table-responsive">
        <table id="benefits-table" class="table ">
            <thead>
                <tr>
                    <th>{{ __('Employee') }}</th>
                    <th>{{ __('Registration Number') }}</th>
                    <th>{{ __('Social Security Number') }}</th>
                    <th class="not-exported">{{ trans('file.action') }}</th>
                </tr>
            </thead>

        </table>
    </div>
    <div id="BenefitsformModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{ __('Add Address') }}</h5>
                    <button type="button" data-dismiss="modal" id="close" aria-label="Close"
                        class="benefits_close"><i class="dripicons-cross"></i></button>
                </div>

                <div class="modal-body">
                    <span id="benefits_form_result"></span>
                    <form method="post" id="benefits_sample_form" class="form-horizontal" autocomplete="off">
                        @csrf
                        <div class="row">

                            <div class="col-md-4 form-group">
                                <label>{{ trans('file.registration_number') }} </label>
                                <input type="text" name="registration_number" id="registration_number"
                                    placeholder="{{ trans('file.registration_number') }}" required class="form-control">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>{{ trans('file.social_security_number') }} </label>
                                <input type="text" name="social_security_number" id="social_security_number"
                                    placeholder="{{ trans('file.social_security_number') }}" required
                                    class="form-control">
                            </div>
                            <div class="container">
                                <div class="form-group" align="center">
                                    <input type="hidden" name="action" id="benefit_action" />
                                    <input type="hidden" name="hidden_id" id="benefit_hidden_id" />
                                    <input type="submit" name="action_button" id="benefit_action_button"
                                        class="btn btn-warning" value={{ trans('file.Add') }} />
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
                    <h2 class="modal-title">{{ trans('file.Confirmation') }}</h2>
                    <button type="button" class="benefits_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0;">{{ __('Are you sure you want to remove this data?') }}</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_button"
                        class="btn btn-danger benefits-ok">{{ trans('file.OK') }}</button>
                    <button type="button" class="benefits_close btn-default"
                        data-dismiss="modal">{{ trans('file.Cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
