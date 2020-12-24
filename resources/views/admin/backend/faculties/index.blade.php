@extends('admin.backend.layouts.master')
@section('title','Faculty')

@section('content')
@can('faculty-create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ route("admin.faculty.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.faculty.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.faculty.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Faculty">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.faculty.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.faculty.fields.title') }}
                        </th>
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faculties as $key => $faculty)
                        <tr data-entry-id="{{ $faculty->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $loop->index + 1 ?? '' }}
                            </td>
                            <td>
                                {{ $faculty->name ?? '' }}
                            </td>
                           
                            <td>
                                @can('faculty-show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.faculty.show', $faculty->slug) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('faculty-edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.faculty.edit', $faculty->slug) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('faculty-delete')
                                    <form action="{{ route('admin.faculty.destroy', $faculty->slug) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('faculty-delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.faculty.massDestroy') }}",
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
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  $('.datatable-Faculty:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection