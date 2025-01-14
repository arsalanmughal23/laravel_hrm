$('#benefits-table').DataTable().clear().destroy();
var date = $('.date');
date.datepicker({
    format: '{{ env('Date_Format_JS')}}',
    autoclose: true,
    todayHighlight: true
});


var table_table = $('#benefits-table').DataTable({
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
        url: "{{ route('benefits.show',$employee->id) }}",
    },

    columns: [
        {
            data: 'employee',
            name: 'employee',

        },
        {
            data: 'registration_number',
            name: 'registration_number',
        },
        {
            data: 'social_security_number',
            name: 'social_security_number',
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
            'targets': [0, 3],
        },
    ],


    'select': {style: 'multi', selector: 'td:first-child'},
    'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
});
new $.fn.dataTable.FixedHeader(table_table);


$('#create_benefit_record').click(function () {

    $('.modal-title').text("Add New Benefit");
    $('#benefit_action_button').val('{{trans('file.Add')}}');
    $('#benefit_action').val('{{trans('file.Add')}}');
    $('#BenefitsformModal').modal('show');
 
});
$('#benefits_sample_form').on('submit', function (event) {
    event.preventDefault();
    if ($('#benefit_action').val() == '{{trans('file.Add')}}') {

        $.ajax({
            url: "{{ route('benefits.store',$employee->id) }}",
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
                    $('#benefits_sample_form')[0].reset();
                    $('select').selectpicker('refresh');
                    $('#benefits-table').DataTable().ajax.reload();
                    
                }
                $('#benefits_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
                
            }

        });
    }
    {{-- Update record --}}
    if ($('#benefit_action').val() == '{{trans('file.Edit')}}') {
        
        $.ajax({
            url: "{{ route('benefits.update') }}",
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
                        $('#BenefitsformModal').modal('hide');
                        $('#benefits-table').DataTable().ajax.reload();
                        $('#benefits_sample_form')[0].reset();
                    }, 2000);

                }
                $('#benefits_form_result').html(html).slideDown(300).delay(5000).slideUp(300);
            }
        });
    }
});
{{--edit action--}}
$(document).on('click', '.benefits_edit', function () {
    
    var id = $(this).attr('id');
    var target = "{{ route('benefits.index') }}/" + id + '/edit';

    $.ajax({
        url: target,
        dataType: "json",
        success: function (html) {
            let id = html.data.id;

            $('#registration_number').val(html.data.registration_number);        
            $('#social_security_number').val(html.data.social_security_number);
      
            
            $('#benefit_hidden_id').val(html.data.id);
            $('.modal-title').text('{{trans('file.Edit')}}');
            $('#benefit_action_button').val('{{trans('file.Update')}}');
            $('#benefit_action').val('{{trans('file.Edit')}}');
            $('#BenefitsformModal').modal('show');
        }
    })
});

{{-- Delete action --}}
let benefits_delete_id;

$(document).on('click', '.benefits_delete', function () {
benefits_delete_id = $(this).attr('id');
    $('.confirmModal').modal('show');
    $('.modal-title').text('{{__('DELETE Record')}}');
    $('.benefits-ok').text('{{trans('file.OK')}}');
});


$('.benefits_close').click(function () {
    $('#benefits_sample_form')[0].reset();
    $('select').selectpicker('refresh');
$('.confirmModal').modal('hide');
    $('#benefits-table').DataTable().ajax.reload();
});

$('.benefits-ok').click(function () {
    let target = "{{ route('benefits.index') }}/" + benefits_delete_id + '/delete';
    $.ajax({
        url: target,
        beforeSend: function () {
            $('.benefits-ok').text('{{trans('file.Deleting...')}}');
        },
        success: function (data) {
            setTimeout(function () {
                $('.confirmModal').modal('hide');
                $('#benefits-table').DataTable().ajax.reload();
            }, 2000);
        }
    })
});


