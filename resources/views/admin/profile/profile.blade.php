@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Profil
    </div>

    <div class="card-body">
        <form action="{{ route("admin.profile-update", [$user->id]) }}" method="POST" enctype="multipart/form-data" role="form" novalidate="novalidate">@csrf
            <div class="row">
            	<div class="col-sm-3">
            		<div class="avatar-box">
            			<img class="is-avatar" src="{{ asset('storage/avatar/'. $user->detail->avatar) }}" alt="">
	            		<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
	            			<label for="avatar">Foto Profile Baru</label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" id="avatar" name="avatar" class="custom-file-input">
									<label class="custom-file-label" for="avatar">Pilih file</label>
								</div>
							</div>
							{{-- <input type="file" id="avatar" name="avatar" class="form-control @error('avatar') is-invalid @enderror" value="{{ old('avatar', isset($user) ? $user->detail->avatar : '') }}"> --}}
							<input type="hidden" id="avatar" name="current_avatar" value="{{ $user->detail->avatar }}">

							@error('avatar')
		                        <p class="help-block">
		                            {{ $message }}
		                        </p>
		                    @enderror
	            		</div>
            		</div>
	            </div>
	            <div class="col-sm-8">
            		<div class="form-group">
            			<label>Nama</label>
						<input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', isset($user) ? $user->name : '') }}" aria-describedby="name-error" required>
						<span id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
						{{-- @if($errors->has('name'))
	                        <p class="help-block">
	                            {{ $errors->first('name') }}
	                        </p>
	                    @endif --}}
            		</div>
            		<div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
            			<label>Jabatan</label>
						<input type="text" id="role" name="role" class="form-control" value="{{ old('role', isset($user) ? $user->detail->role : '') }}" required>
						@if($errors->has('role'))
	                        <p class="help-block">
	                            {{ $errors->first('role') }}
	                        </p>
	                    @endif
	                    <p class="helper-block">
	                        {{ trans('cruds.lesson.fields.title_helper') }}
	                    </p>
            		</div>
            		<div class="form-group">
            			<label>Bio</label>
						<textarea id="bio" name="bio" class="form-control ">{{ old('bio', isset($user) ? $user->detail->bio : '') }}</textarea>
	                    @if($errors->has('bio'))
	                        <p class="help-block">
	                            {{ $errors->first('bio') }}
	                        </p>
	                    @endif
	                    <p class="helper-block">
	                        {{ trans('cruds.lesson.fields.shor_text_helper') }}
	                    </p>
            		</div>
            	</div>
            	<div class="col-sm-1">
            	</div>
            </div>
            <div class="row">
				<div>
					<button class="btn btn-danger" type="submit">{{ trans('global.save') }}</button>
				</div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
		<div class="card">
		    <div class="card-header">
		        Setelan Keamanan
		    </div>

		    <div class="card-body">
		        <form action="{{ route("admin.profile-update-password", [$user->id]) }}" method="POST" enctype="multipart/form-data">
		            @csrf
		    		<div class="form-group">
		    			<label>Email</label>
						<input type="email" class="form-control" placeholder="{{ $user->email }}">
		    		</div>
		    		<div class="form-group">
		    			<label>Password</label>
						<input type="password" class="form-control" placeholder="{{ $user->detail->role }}">
		    		</div>
		    		<div class="form-group">
		    			<label>Konfirmasi Password</label>
						<input type="password" class="form-control" placeholder="{{ $user->detail->role }}">
		    		</div>
		            <div class="row">
						<div>
							<input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
						</div>
		            </div>
		        </form>
		    </div>
		</div>
	</div>
</div>

@endsection