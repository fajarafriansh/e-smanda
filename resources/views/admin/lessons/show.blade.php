@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lesson.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.id') }}
                        </th>
                        <td>
                            {{ $lesson->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.course') }}
                        </th>
                        <td>
                            {{ $lesson->course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.title') }}
                        </th>
                        <td>
                            {{ $lesson->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.slug') }}
                        </th>
                        <td>
                            {{ $lesson->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.lesson_image') }}
                        </th>
                        <td>
                            @if($lesson->lesson_image)
                                <a href="{{ $lesson->lesson_image->getUrl() }}" target="_blank">
                                    <img src="{{ $lesson->lesson_image->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.shor_text') }}
                        </th>
                        <td>
                            {!! $lesson->shor_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.full_text') }}
                        </th>
                        <td>
                            {!! $lesson->full_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.position') }}
                        </th>
                        <td>
                            {{ $lesson->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.downloadable_file') }}
                        </th>
                        <td>
                            {{ $lesson->downloadable_file }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.free_lesson') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $lesson->free_lesson ? "checked" : "" }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled {{ $lesson->published ? "checked" : "" }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection