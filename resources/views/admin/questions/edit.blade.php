@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.question.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.questions.update", [$question->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('tests') ? 'has-error' : '' }}">
                <label for="tests">Tests
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="tests[]" id="tests" class="form-control select2" multiple="multiple">
                    @foreach($tests as $id => $tests)
                        <option value="{{ $id }}" {{ (in_array($id, old('tests', [])) || isset($question) && $question->tests->contains($id)) ? 'selected' : '' }}>{{ $tests }}</option>
                    @endforeach
                </select>
                @if($errors->has('tests'))
                    <p class="help-block">
                        {{ $errors->first('tests') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.questions_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                <label for="question">{{ trans('cruds.question.fields.question') }}*</label>
                <textarea id="question" name="question" class="form-control " required>{{ old('question', isset($question) ? $question->question : '') }}</textarea>
                @if($errors->has('question'))
                    <p class="help-block">
                        {{ $errors->first('question') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.question_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('question_image') ? 'has-error' : '' }}">
                <label for="question_image">{{ trans('cruds.question.fields.question_image') }}</label>
                <div class="needsclick dropzone" id="question_image-dropzone">

                </div>
                @if($errors->has('question_image'))
                    <p class="help-block">
                        {{ $errors->first('question_image') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.question_image_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
                <label for="score">{{ trans('cruds.question.fields.score') }}*</label>
                <input type="number" id="score" name="score" class="form-control" value="{{ old('score', isset($question) ? $question->score : '') }}" step="1" required>
                @if($errors->has('score'))
                    <p class="help-block">
                        {{ $errors->first('score') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.question.fields.score_helper') }}
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
    Dropzone.options.questionImageDropzone = {
    url: '{{ route('admin.questions.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="question_image"]').remove()
      $('form').append('<input type="hidden" name="question_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="question_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($question) && $question->question_image)
      var file = {!! json_encode($question->question_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $question->question_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="question_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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