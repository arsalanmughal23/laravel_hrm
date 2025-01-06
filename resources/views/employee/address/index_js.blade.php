
$('#address-table').DataTable().clear().destroy();


var table_table = $('#address-table').DataTable({
    initComplete: function () {
        this.api().columns([0]).every(function () {
            var column = this;
            var select = $('<select><option value=""></option></select>')
                .appendTo($(column.footer()).empty())
                .on('change', function () {
                    var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                    );

                    column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                });

            column.data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>');
                $('select').selectpicker('refresh');
            });
        });
    },
    responsive: true,
    fixedHeader: {
        header: true,
        footer: true
    },
    processing: true,
    serverSide: true,
    ajax: {
        url: "{{ route('addresses.show',$employee->id) }}",
    },

    columns: [

    {
        data: 'address',
        name: 'address',
    },
    {
        data: 'country',
        name: 'country',
        defaultContent: 'N/A',
    },
    {
        data: 'province',
        name: 'province',
        defaultContent: 'N/A',
    },
    {
        data: 'city',
        name: 'city',
        defaultContent: 'N/A',
    },
    {
        data: 'family_code',
        name: 'family_code',
        defaultContent: 'N/A',
    },
    {
        data: 'zip_code',
        name: 'zip_code',
        defaultContent: 'N/A',
    },
        {
            data: 'action',
            name: 'action',
            orderable: false
        }
    ],


    "order": [],
    'language': {
        'lengthMenu': '_MENU_ {{__('records per page')}}',
        "info": '{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)',
        "search": '{{trans("file.Search")}}',
        'paginate': {
            'previous': '{{trans("file.Previous")}}',
            'next': '{{trans("file.Next")}}'
        }
    },
    'columnDefs': [
        {
            "orderable": false,
            'targets': [0, 4],
        },
    ],


    'select': {style: 'multi', selector: 'td:first-child'},
    'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
});
new $.fn.dataTable.FixedHeader(table_table);


$('#create_address_record').click(function () {

    $('.modal-title').text("Add New Address");
    $('#address_action_button').val('{{trans('file.Add')}}');
    $('#address_action').val('{{trans('file.Add')}}');
    $('#AddressformModal').modal('show');
 
});
$(document).ready(function () {
   
    $('#address_country').on('change', function () {
        $('#address_province').empty().append('<option value="">{{ __("Select Province") }}</option>').selectpicker('refresh');
        $('#address_city').empty().append('<option value="">{{ __("Select City") }}</option>').selectpicker('refresh');
        
        let countryId = $(this).val();
        if (countryId) {
            $.ajax({
                url: "{{route('get.province')}}",
                data: {
                    id: countryId,
                },
                type: 'POST',
                dataType: 'json',
                success: function (result) {
                    {{-- console.log(result); --}}
                    $('#address_province').html('<option value="">-- Select Province --</option>');
                    $.each(result.provinces, function (key, value) {
                        {{-- console.log(value.name); --}}
                        $("#address_province").append('<option value="' + value.id + '">' + value.name + '</option>');
                        $('#address_province').selectpicker('refresh');
                    });
                    $('#address_city').html('<option value="">-- Select City --</option>');
                    
                },
                error: function () {
                    alert('Failed to fetch provinces.');
                }
            });
        } else {
            {{-- // Clear both province and city dropdowns if no country is selected --}}
            $('#address_province').empty().append('<option value="">{{ __("Select Province") }}</option>').selectpicker('refresh');
            $('#address_city').empty().append('<option value="">{{ __("Select City") }}</option>').selectpicker('refresh');
        }
    });
    
    $('#address_province').on('change', function () {
        let provinceId = $(this).val();
        if (provinceId) {
            $.ajax({
                url: "{{route('get.cities')}}",
                type: 'POST',
                data: {

                    id: provinceId,
                },
                success: function (result) {
                    {{-- console.log(result); --}}
                    $('#address_city').html('<option value="">-- Select City --</option>');
                    $.each(result.cities, function (key, value) {
                        {{-- console.log(value.name); --}}
                        $("#address_city").append('<option value="' + value.id + '">' + value.name + '</option>');
                        $('#address_city').selectpicker('refresh');
                    });
                    
                },
                error: function () {
                    alert('Failed to fetch cities.');
                }
            });
        } else {
            {{-- // Clear city dropdown if no province is selected --}}
            $('#address_city').empty().append('<option value="">{{ __("Select City") }}</option>').selectpicker('refresh');
        }
    });
    
});



$('#address_sample_form').on('submit', function (event) {
    event.preventDefault();
    if ($('#address_action').val() == '{{trans('file.Add')}}') {

        $.ajax({
            url: "{{ route('addresses.store',$employee->id) }}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
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
                    $('#address_sample_form')[0].reset();
                    $('select').selectpicker('refresh');
                    $('#address-table').DataTable().ajax.reload();
                }
                $('#address_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
            }

        });
    }

    if ($('#address_action').val() == '{{trans('file.Edit')}}') {
        {{-- let formData = new FormData(this);

        // Create an object to display the FormData content in an alert
        let formDataEntries = [];
        formData.forEach((value, key) => {
            formDataEntries.push(`${key}: ${value}`);
        });
    
        alert(formDataEntries.join('\n')); --}}
        $.ajax({
            url: "{{ route('addresses.update') }}",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                var html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (var count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                }
                if (data.error) {
                    html = '<div class="alert alert-danger">' + data.error + '</div>';
                }

                if (data.success) {
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    setTimeout(function () {
                        $('#AddressformModal').modal('hide');
                        $('select').selectpicker('refresh');
                        $('#address-table').DataTable().ajax.reload();
                        $('#address_sample_form')[0].reset();
                    }, 2000);

                }
                $('#address_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
            }
        });
    }
});


$(document).on('click', '.address_edit', function () {
    
    var id = $(this).attr('id');
    {{-- alert(id); --}}

    var target = "{{ route('addresses.index') }}/" + id + '/edit';
    {{-- alert(target); --}}


    $.ajax({
        url: target,
        dataType: "json",
        success: function (html) {
            {{-- console.log(html); --}}

            let id = html.data.id;

        
            $('#employee_address').val(html.data.address);
            $('#family_code').val(html.data.family_code);        
            $('#address_zip_code').val(html.data.zip_code);
      
            $('#address_country').selectpicker('val', html.data.country);

            let selected_province_id = html.data.province_id;
            let selected_city_id = html.data.city_id;
            
            {{-- // Populate and select province --}}
            $.ajax({
                url: "{{route('get.province')}}",
                type: 'POST',
                data: { id: html.data.country },
                dataType: 'json',
                success: function (provinceData) {
                    $('#address_province').html('<option value="">-- Select Province --</option>');
                    $.each(provinceData.provinces, function (key, value) {
                        $('#address_province').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                    $('#address_province').selectpicker('refresh');
            
                    {{-- // Select the province after dropdown is populated --}}
                    $('#address_province').selectpicker('val', selected_province_id);
                   
            
                    {{-- // Populate and select city after province is selected --}}
                    $.ajax({
                        url: "{{route('get.cities')}}",
                        type: 'POST',
                        data: { id: selected_province_id },
                        dataType: 'json',
                        success: function (cityData) {
                            $('#address_city').html('<option value="">-- Select City --</option>');
                            $.each(cityData.cities, function (key, value) {
                                $('#address_city').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            $('#address_city').selectpicker('refresh');
            
                            {{-- // Select the city after dropdown is populated --}}
                            $('#address_city').selectpicker('val', selected_city_id);
                        }
                    });
                }
            });
            
            $('#address_hidden_id').val(html.data.id);
            $('.modal-title').text('{{trans('file.Edit')}}');
            $('#address_action_button').val('{{trans('file.Update')}}');
            $('#address_action').val('{{trans('file.Edit')}}');
            $('#AddressformModal').modal('show');
        }
    })
});


let address_delete_id;

$(document).on('click', '.address_delete', function () {
address_delete_id = $(this).attr('id');
    $('.confirmModal').modal('show');
    $('.modal-title').text('{{__('DELETE Record')}}');
    $('.address-ok').text('{{trans('file.OK')}}');
});


$('.address-close').click(function () {
    $('#address_sample_form')[0].reset();
    $('select').selectpicker('refresh');
$('.confirmModal').modal('hide');
    $('#address-table').DataTable().ajax.reload();
});

$('.address-ok').click(function () {
    let target = "{{ route('addresses.index') }}/" + address_delete_id + '/delete';
    $.ajax({
        url: target,
        beforeSend: function () {
            $('.address-ok').text('{{trans('file.Deleting...')}}');
        },
        success: function (data) {
            setTimeout(function () {
                $('.confirmModal').modal('hide');
                $('#address-table').DataTable().ajax.reload();
            }, 2000);
        }
    })
});

