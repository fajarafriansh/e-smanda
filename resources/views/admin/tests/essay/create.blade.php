@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.test.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tests.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('lesson_id') ? 'has-error' : '' }}">
                <label for="lesson">{{ trans('cruds.test.fields.lesson') }}</label>
                <select name="lesson_id" id="lesson" class="form-control select2">
                    @foreach($lessons as $id => $lesson)
                        <option value="{{ $id }}" {{ (isset($test) && $test->lesson ? $test->lesson->id : old('lesson_id')) == $id ? 'selected' : '' }}>{{ $lesson }}</option>
                    @endforeach
                </select>
                @if($errors->has('lesson_id'))
                    <p class="help-block">
                        {{ $errors->first('lesson_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
                <label for="course">{{ trans('cruds.test.fields.course') }}</label>
                <select name="course_id" id="course" class="form-control select2">
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}" {{ (isset($test) && $test->course ? $test->course->id : old('course_id')) == $id ? 'selected' : '' }}>{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_id'))
                    <p class="help-block">
                        {{ $errors->first('course_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('cruds.test.fields.title') }}</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($test) ? $test->title : '') }}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('cruds.test.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($test) ? $test->description : '') }}</textarea>
                @if($errors->has('description'))
                    <p class="help-block">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('essay_test') ? 'has-error' : '' }}">
                <label for="essay_test">{{ trans('cruds.lesson.fields.essay_test') }}</label>
                <div class="needsclick dropzone" id="essay_test-dropzone">

                </div>
                @if($errors->has('essay_test'))
                    <p class="help-block">
                        {{ $errors->first('essay_test') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.lesson.fields.downloadable_file_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                <label for="published">{{ trans('cruds.test.fields.published') }}</label>
                <input name="published" type="hidden" value="0">
                <input value="1" type="checkbox" id="published" name="published" {{ old('published', 0) == 1 ? 'checked' : '' }}>
                @if($errors->has('published'))
                    <p class="help-block">
                        {{ $errors->first('published') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.published_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedDownloadableFileMap = {}
Dropzone.options.downloadableFileDropzone = {
    url: '{{ route('admin.lessons.storeMedia') }}',
    maxFilesize: 8, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="downloadable_file[]" value="' + response.name + '">')
      uploadedDownloadableFileMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDownloadableFileMap[file.name]
      }
      $('form').find('input[name="downloadable_file[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($lesson) && $lesson->downloadable_file)
          var files =
            {!! json_encode($lesson->downloadable_file) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="downloadable_file[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@stop