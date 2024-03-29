@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        Daftar Kursus
        {{-- {{ trans('cruds.course.title_singular') }} {{ trans('global.list') }} --}}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Course">
                <thead>
                    <tr>
                        {{-- @can('course_delete')
                            @if(request('show_deleted') != 1)
                                <th style="..."><input type="checkbox" id="select-all" /></th>
                            @endif
                        @endcan
                        <th width="10">

                        </th> --}}
                        <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th>
                        @if (\Auth::user()->isAdmin())
                        <th>
                            {{ trans('cruds.course.fields.teacher') }}
                        </th>
                        @endif
                        <th>
                            Kode Kursus
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.published') }}
                        </th>
                        {{-- <th>
                            &nbsp;
                        </th> --}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $key => $course)
                        <tr data-entry-id="{{ $course->id }}">
                           {{--  @can('course_delete')
                                @if(request('show_deleted') != 1)
                                    <td></td>
                                @endif
                            @endcan --}}
                            <td>
                                {{ $course->id ?? '' }}
                            </td>

                            @if (\Auth::user()->isAdmin())
                            <td>
                                @foreach($course->teachers as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            @endif
                            <td>
                                {{ $course->code ?? '' }}
                            </td>
                            <td>
                                {{ $course->title ?? '' }}
                            </td>
                            <td>
                                {{ $course->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $course->published ? trans('global.yes') : trans('global.no') }}
                            </td>

                            <td>
                                @can('course_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.reports.test', $course->id) }}">
                                        Lihat Tugas
                                    </a>
                                    {{-- <a class="btn btn-xs btn-primary" href="{{ route('admin.courses.show', $course->id) }}">
                                        {{ trans('global.view') }}
                                    </a> --}}
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
@can('course_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.courses.massDestroy') }}",
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
          headers: {'x-csrf-token': _token},
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
  $('.datatable-Course:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection