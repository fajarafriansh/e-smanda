@extends('layouts.admin-index')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Profil
    </div>

    <div class="card-body">
        <form action="{{ route("admin.profile-update", [$user->id]) }}" method="POST" enctype="multipart/form-data">@csrf
            <div class="row">
            	<div class="col-sm-4">
            		<div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
            			<label>Foto Profil</label>
						<input type="file" id="avatar" name="avatar" class="form-control @error('avatar') is-invalid @enderror" value="{{ old('avatar', isset($user) ? $user->detail->avatar : '') }}">
						<input type="hidden" id="avatar" name="current_avatar" value="{{ $user->detail->avatar }}">

						@error('avatar')
	                        <p class="help-block">
	                            {{ $message }}
	                        </p>
	                    @enderror
            		</div>
	            </div>
	            <div class="col-sm-8">
            		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            			<label>Nama</label>
						<input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
						@if($errors->has('name'))
	                        <p class="help-block">
	                            {{ $errors->first('name') }}
	                        </p>
	                    @endif
	                    <p class="helper-block">
	                        {{ trans('cruds.lesson.fields.title_helper') }}
	                    </p>
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
            </div>
            <div class="row">
				<div>
					<input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
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

@section('script')
<script>
	Dropzone.options.dropzone = {
		maxFilesize: 5,
		renameFile: function(file) {
			var date = new Date();
			var time = date.getTime();
			return time+file.name;
		},
		acceptedFiles: ".jpg, .jpeg, .png",
		addRemoveLinks: true,
		timeout: 5000,
		success: function(file, response) {
			console.log(response);
		},
		error: function(file, response) {
			return false;
		}
	}
</script>
@stop