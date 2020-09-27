@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        Laporan Kursus
    </div>

    @if ($test->type == 0)
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Waktu Menjawab</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->student->name }}</td>
                                <td>{{ $result->created_at->toDayDateTimeString() }}</td>
                                <td>{{ $result->test_result }}</td>
                            </tr>
                        @endforeach
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
    @else
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama Siswa</th>
                            <th>Waktu Upload</th>
                            <th>Essay</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($essays as $essay)
                            <tr>
                                <td>{{ $essay->student->name }}</td>
                                {{-- <td>{{ $essay->result->user_id }}</td> --}}
                                <td>{{ $essay->created_at->toDayDateTimeString() }}</td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="{{ asset('/file/essay').'/'.$essay->essay }}">
                                        Lihat
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ route("admin.essay.result") }}" method="post" accept-charset="utf-8">@csrf
                                        <input type="text" name="test_result" value="@if (!is_null($essay->result)) {{ $essay->result->test_result }} @endif" class="input-result">
                                        <input type="hidden" name="test_id" value="{{ $essay->test->id }}">
                                        <input type="hidden" name="user_id" value="{{ $essay->student->id }}">
                                         <input type="hidden" name="essay_id" value="{{ $essay->id }}">
                                        <button type="submit" class="btn btn-xs btn-primary">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
    @endif
</div>
@endsection