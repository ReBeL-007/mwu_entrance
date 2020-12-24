@extends('admin.backend.layouts.master')
@section('title','Subject')

@section('content')
@can('sub-create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ route("admin.subs.create", ['id' => $id]) }}">
                {{ trans('global.add') }} {{ trans('cruds.sub.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.sub.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-sub">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.sub.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.program.title_singular') }}
                        </th>
                        <th>
                            {{ trans('cruds.sub.fields.semester') }}
                        </th>
                        <th>
                            {{ trans('cruds.sub.fields.subject_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.sub.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subs as $key => $sub)
                        <tr data-entry-id="{{ $sub->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $loop->index + 1 ?? '' }}
                            </td>
                            <td>
                                {{ $sub->course->name ?? '' }}
                            </td>
                            <td>
                                {{ $sub->semester ?? '' }}
                            </td>
                             <td>
                                {{ $sub->subject_code ?? '' }}
                            </td>
                            <td>
                                {{ $sub->title ?? '' }}
                            </td>
                            <td>
                                @can('sub-show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.subs.show', $sub->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('sub-edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.subs.edit', $sub->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('sub-delete')
                                    <form action="{{ route('admin.subs.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@endsection


@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('sub-delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': $('meta[name="csrf-token"]').attr('content')},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-sub:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
