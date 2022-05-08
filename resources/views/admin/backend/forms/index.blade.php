@extends('admin.backend.layouts.master')
@section('title','Form')
@section('styles')
    <style>

    </style>
@endsection
@section('content')
<!-- css for admit card -->
<div class="card">
    <div class="card-header">
        {{ trans('global.list') }} of Applicants
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Filter by College</label>
                    <select class="college form-control">
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Filter by Program</label>
                    <select class="department form-control">
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Filter by District</label>
                    <select class="semester form-control">
                    </select>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-form">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            SN
                        </th>
                        <th>
                            Symbol No.
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Faculty
                        </th>
                        <th>
                            Program
                        </th>
                        <th>
                            District
                        </th>
                        <th>
                            Gender
                        </th>
                        <th>
                            Payment Mode
                        </th>
                        <th>
                            Verification Status
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $key => $data)
                    <tr data-entry-id="{{ $data->id }}" data-entry="{{$data}}">
                        <td>

                        </td>
                        <td>
                            {{ $loop->index + 1 ?? '' }}
                        </td>
                        <td>
                            {{ $data->symbol_no ?? '' }}
                        </td>
                        <td>
                            {{ $data->fname ?? '' }} {{ $data->mname ?? '' }} {{ $data->lname ?? '' }}
                        </td>
                        <td>
                            {{ $data->faculties->name ?? '' }}
                        </td>
                        <td>
                        @if($data->faculty===5 && $data->level===1)
                            @php
                            $priority = json_decode($data->priority);
                            @endphp
                            @switch($priority[0])
                            @case(1)
                            @case(4)
                            @case(7)
                                B.E. Civil
                            @break
                            @case(2)
                            @case(5)
                            @case(8)
                                B.E. Computer
                            @break
                            @case(3)
                            @case(6)
                            @case(9)
                                B.E. Hydropower
                            @break
                            @endswitch
                        @else
                            {{$data->course->name ?? ' '}}
                        @endif
                         </td>
                        <td>
                            {{ $data->district ?? '' }}
                        </td>
                        <td>
                            {{ $data->sex ?? '' }}
                        </td>
                        <td>
                            @if($data->payment_method == 1)
                            <span class="badge badge-secondary">eSewa</span>
                                @if($data->esewa_status == 0)
                                <span class="badge badge-primary">Pending</span>
                                @else
                                <span class="badge badge-success">Paid</span>
                                @endif
                            @elseif($data->payment_method == 0)
                            <span class="badge badge-secondary">Voucher</span>
                            {{-- <label class="label label-success">Approved</label> --}}
                            @endif
                        </td>
                         <td>
                            @if($data->is_verified == 0)
                            <span class="badge badge-info">Pending</span>
                            {{-- <label class="label label-danger">Pending</label> --}}
                            @elseif($data->is_verified == 1)
                            <span class="badge badge-success">Approved</span>
                            {{-- <label class="label label-success">Approved</label> --}}
                            @endif
                        </td>
                        <td>
                            {{-- @can('form-show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.forms.show', $data->id) }}">
                            {{ trans('global.view') }}
                            </a>
                            @endcan --}}

                            @can('form-edit')
                                @if($data->is_verified==0)
                                <a class="btn btn-xs btn-info" href="{{ route('admin.forms.edit', $data->id) }}">
                                    {{-- {{ trans('global.edit') }} --}}
                                    Approve
                                </a>
                                @endif  
                            @endcan

                            @can('card-download')
                            <a class="btn btn-xs btn-success" href="{{ route('admin.forms.print', $data->id) }}" target="_blank" style="margin:5px 0px;">
                                Get Card
                            </a>
                            @endcan
                            @can('form-download')
                            <a class="btn btn-xs btn-success" href="{{ route('admin.forms.print-student-details', $data->id) }}" target="_blank" style="margin:5px 0px;">
                                Get Form
                            </a>
                            @endcan
                            {{-- <a class="btn btn-xs btn-info" href="{{ route('admin.forms.show', $data->id) }}">
                            show
                            </a> --}}
                            @can('form-delete')
                            <form action="{{ route('admin.forms.destroy', $data->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog d-flex justify-content-center align-items-center" role="document" style="width:80vw;">
        <div class="modal-content" style="width: 60vw;">
            <div class="modal-header">
                <h5 class="modal-title">Admit Card</h5>
                <button type="button" class="btn btn-primary pdf">PDF</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="{{asset('css/admit-card.css')}}">
</div>
<div class="admit-cards d-none"></div>
<form action="" class="d-none multiple-form-print" method="POST" target="_blank">
    @csrf
    <input type="text" name="ids" class="ids" value="">
    <input type="text" name="program" value="">
    <input type="text" name="college" value="">
    <input type="text" name="semester" value="">
</form>
@endsection


@section('scripts')
@parent
<script>
    function getAdmitCard($data) {
        $template = $('#admit-card-template').html();
        $template = $template.replace('[[[student_name]]]', $data.fname + ' ' + $data.mname + ' ' + $data.lname);
        $template = $template.replace('[[[symbol_no]]]', $data.symbol_no);
        $template = $template.replace('[[[registration_no]]]', $data.regd_no);
        $template = $template.replace('[[[college_name]]]', $data.campus);
        $template = $template.replace('[[[faculty]]]', $data.faculty);
        $template = $template.replace('[[[exam_year]]]', $data.year);
        $template = $template.replace('[[[exam_centre]]]', $data.exam_centre);
        $template = $template.replace('[[[img]]]', '/storage/uploads/image/' + $data.image);
        $template = $template.replace('[[[sign_img]]]', '/storage/uploads/signature/' + $data.signature);
        $template = $template.replace('[[[sign_img]]]', '/storage/uploads/signature/' + $data.signature);
        $subjects = $data.subjects.replace('[', '').replace(']', '').split(',');
        $subject_codes = $data.subject_codes.replace('[', '').replace(']', '').split(',');
        for (i = 0; i < 9; i++) {
            console.log($subjects[i]);
            if ($subjects[i] != undefined && $subjects[i] != 'null') {
                $template = $template.replace('[[[sn_no_' + i + ']]]', i + 1);
                $template = $template.replace('[[[subject_name_' + i + ']]]', String($subjects[i]).slice(1, -1));
                $template = $template.replace('[[[sub_code_' + i + ']]]', String($subject_codes[i]).slice(1, -1));
            } else {
                $template = $template.replace('[[[sn_no_' + i + ']]]', '');
                $template = $template.replace('[[[subject_name_' + i + ']]]', '');
                $template = $template.replace('[[[sub_code_' + i + ']]]', '');
            }

        }
        if ($data.exam_type === "Regular") {
            $template = $template.replace('d-none regular-tick', 'regular-tick');
        } else if ($data.exam_type === "Partial") {
            $template = $template.replace('d-none partial-tick', 'partial-tick');
        } else {
            $template = $template.replace('d-none chance-tick', 'chance-tick');
        }
        $template = $template.replaceAll('null', '');
        if ($data.level === "Bachelor") {
            $template = $template.replace('d-none bachleor', 'bachleor');
        } else if ($data.level === "Master") {
            $template = $template.replace('d-none master', 'master');
        } else {
            $template = $template.replace('d-none m.phil', 'm.phil');
        }
        $template = $template.replaceAll('null', '');
        $admitCard = $('<div class="admitcard" style="height:85vh;">').html($template);
        $('.admit-cards').append($admitCard);
    }

    $(function() {
        $('select').select2({
            theme: 'bootstrap4'
        , });
        $(document).on('click', '.pdf', function() {
            $('.admit-cards').printThis({
                loadCSS: "{{asset('/css/admit-card.css')}}"
                , beforePrint: console.log('test')
            , });
        });

        $('.college').on('change', function() {
            $college = $('.college').val();
            $department = $('.department').val();
            $semester = $('.semester').val();
            $dataTable = $('.datatable-form').DataTable().column(4).search($('.college').val()).draw();
            searchOption();
            $('.college').val($college).trigger('selected');
            $('.department').val($department).trigger('selected');
            $('.semester').val($semester).trigger('selected');
        });

        $('.department').on('change', function() {
            $college = $('.college').val();
            $department = $('.department').val();
            $semester = $('.semester').val();
            $dataTable = $('.datatable-form').DataTable().column(5).search($('.department').val()).draw();
            searchOption();
            $('.college').val($college).trigger('selected');
            $('.department').val($department).trigger('selected');
            $('.semester').val($semester).trigger('selected');
        });

        $('.semester').on('change', function() {
            $college = $('.college').val();
            $department = $('.department').val();
            $semester = $('.semester').val();
            $dataTable = $('.datatable-form').DataTable().column(6).search($('.semester').val()).draw();
            searchOption();
            $('.college').val($college).trigger('selected');
            $('.department').val($department).trigger('selected');
            $('.semester').val($semester).trigger('selected');
        });


        $(document).on('click', '.admit-card', function() {
            $('.admit-cards').html('');
            getAdmitCard($.parseJSON($(this).parents('tr').attr("data-entry")));
            $scale = 1920 / ($(document).height() * 4);
            $('.modal-body').html($('.admit-cards').html());
            $('.admit-card-view').css('transform-origin', '0px 0px').css('transform', 'scale(' + $scale + ')');
            $('.modal-body').css('height', $('.admit-card-view').height() * $scale + 20).css('width', $('.admit-card-view').width() * $scale * 3 + 30);
            $('.modal').modal();
        });




        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('form-delete')
        let deleteButtonTrans = "{{ trans('global.datatables.delete') }}"
        let deleteButton = {
            text: deleteButtonTrans
            , url: "{{ route('admin.forms.massDestroy') }}"
            , className: 'btn-danger'
            , action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert("{{ trans('global.datatables.zero_selected') }}")

                    return
                }

                if (confirm("{{ trans('global.areYouSure') }}")) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
                            }
                            , method: 'POST'
                            , url: config.url
                            , data: {
                                ids: ids
                                , _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        @can('card-download')
        let admitCardButton = {
            text: 'Get Cards'
            , url: "{{ route('admin.forms.print.multiple') }}"
            , className: 'btn-success admit-card'
            , action: function(e, dt, node, config) {
                var ids = [];
                $.each($('tbody').find('.selected'), function(i, ele) {
                    ids.push($(ele).data('entry-id'));
                });

                if (ids.length === 0) {
                    alert("{{ trans('global.datatables.zero_selected') }}")
                    return
                }
                $('input[name="ids"]').val(ids);
                $('.multiple-form-print').attr('action',"{{ route('admin.forms.print.multiple') }}").submit();
            }
        }        
        dtButtons.push(admitCardButton);
        @endcan

        // @can('triplicate-download')
        // let triplicateButton = {
        //     text: 'Get Triplicate'
        //     , url: "{{ route('admin.forms.print.triplicate') }}"
        //     , className: 'btn-success triplicate'
        //     , action: function(e, dt, node, config) {
        //         var ids = [];
        //         $.each($('tbody').find('.selected'), function(i, ele) {
        //             ids.push($(ele).data('entry-id'));
        //         });

        //         if (ids.length === 0) {
        //             alert("{{ trans('global.datatables.zero_selected') }}")
        //             return
        //         }

        //         $('input[name="ids"]').val(ids);
        //         $('input[name="program"]').val($('.department').val() != '' ? $('.department').val() : '');
        //         $('input[name="college"]').val($('.college').val() != '' ? $('.college').val() : '');
        //         $('input[name="semester"]').val($('.semester').val() != '' ? $('.semester').val() : '');
        //         $('.multiple-form-print').attr('action',"{{ route('admin.forms.print.triplicate') }}").submit();
        //     }
        // }
        // dtButtons.push(triplicateButton);
        // @endcan
        
        @can('form-download')
        let formButton = {
            text: 'Get Forms'
            , url: "{{ route('admin.forms.print-multiple-student-details') }}"
            , className: 'btn-success'
            , action: function(e, dt, node, config) {
                var ids = [];
                $.each($('tbody').find('.selected'), function(i, ele) {
                    ids.push($(ele).data('entry-id'));
                });

                if (ids.length === 0) {
                    alert("{{ trans('global.datatables.zero_selected') }}")
                    return
                }

                $('input[name="ids"]').val(ids);
                $('.multiple-form-print').attr('action',"{{ route('admin.forms.print-multiple-student-details') }}").submit();
            }
        }
        dtButtons.push(formButton);
        @endcan
      
        
        $.extend(true, $.fn.dataTable.defaults, {
            order: [
                [1, 'asc']
            ]
            , pageLength: 100
        , });
        $dataTable = $('.datatable-form:not(.ajaxTable)').DataTable({
            buttons: dtButtons
            , initComplete: function() {
                searchOption();
            }
        , });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    });

    function searchOption() {
        $('.college').html('<option value="">Select College</option>');
        $.each($dataTable.column(4).data().unique(), function(i, ele) {
            $('.college').append('<option value="' + ele + '">' + ele + '</option>');
        });
        $('.department').html('<option value="">Select Program</option>');
        $.each($dataTable.column(5).data().unique(), function(i, ele) {
            $('.department').append('<option value="' + ele + '">' + ele + '</option>');
        });
        $('.semester').html('<option value="">Select District</option>');
        $.each($dataTable.column(6).data().unique(), function(i, ele) {
            $('.semester').append('<option value="' + ele + '">' + ele + '</option>');
        });
    }

</script>

@endsection
