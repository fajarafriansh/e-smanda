@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Kategori
    </div>

    <div class="card-body">
        <form action="{{ route("admin.category.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Nama Kategori</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($category) ? $category->title : '') }}">
                @if($errors->has('title'))
                    <p class="help-block">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">Slug</label>
                <input id="slug" name="slug" class="form-control" value="{{ old('slug', isset($category) ? $category->slug : '') }}">
                @if($errors->has('slug'))
                    <p class="help-block">
                        {{ $errors->first('slug') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.test.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                <label for="parent_id">Level Kategori</label>
                <select name="parent_id" id="parent_id" class="form-control select2">
                    <option value="0">Kategori Utama</option>
                    @foreach($levels as $val)
                        <option value="{{ $val->id }}" {{ (isset($category) ? $category->id : old('id')) == $val ? 'selected' : '' }}>{{ $val->title }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent_id'))
                    <p class="help-block">
                        {{ $errors->first('parent_id') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection