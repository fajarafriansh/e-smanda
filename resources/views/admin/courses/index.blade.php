@extends('layouts.admin-index')
@section('content')
@can('course_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.courses.create") }}">
                Tambah Kursus Baru
                {{-- {{ trans('global.add') }} {{ trans('cruds.course.title_singular') }} --}}
            </a>
        </div>
    </div>
@endcan
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
                        @can('course_delete')
                            @if(request('show_deleted') != 1)
                                <th style="..."><input type="checkbox" id="select-all" /></th>
                            @endif
                        @endcan
                        {{-- <th width="10">

                        </th> --}}
                        {{-- <th>
                            {{ trans('cruds.course.fields.id') }}
                        </th> --}}
                        @if (\Auth::user()->isAdmin())
                        <th>
                            {{ trans('cruds.course.fields.teacher') }}
                        </th>
                        @endif
                        <th>
                            Kategori
                        </th>
                        <th>
                            Kode Kursus
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.slug') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.course_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.course.fields.published') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $key => $course)
                        <tr data-entry-id="{{ $course->id }}">
                            @can('course_delete')
                                @if(request('show_deleted') != 1)
                                    <td></td>
                                @endif
                            @endcan
                            {{-- <td>
                                {{ $course->id ?? '' }}
                            </td> --}}

                            @if (\Auth::user()->isAdmin())
                            <td>
                                @foreach($course->teachers as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            @endif
                            <td>
                                @foreach($course->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->title }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $course->code ?? '' }}
                            </td>
                            <td>
                                {{ $course->title ?? '' }}
                            </td>
                            <td>
                                {{ $course->slug ?? '' }}
                            </td>
                            <td>
                                {{ $course->description ?? '' }}
                            </td>
                            <td>
                                @if($course->course_image)
                                    <a href="{{ $course->course_image->getUrl() }}" target="_blank">
                                        <img src="{{ $course->course_image->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @else
                                    <a href="{{ asset('img/asset/default-image.png') }}" target="_blank">
                                        <img src="{{ asset('img/asset/default-image.png') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $course->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $course->published ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                @can('course_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.lessons.index', ['course_id' => $course->id]) }}">
                                        {{ trans('global.lessons.title') }}
                                    </a>
                                    {{-- <a class="btn btn-xs btn-primary" href="{{ route('admin.courses.show', $course->id) }}">
                                        {{ trans('global.view') }}
                                    </a> --}}
                                @endcan

                                @can('course_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.courses.edit', $course->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('course_delete')
                                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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