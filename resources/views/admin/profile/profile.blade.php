@extends('layouts.admin-index')

@section('title')
	{{ $user->name }}
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Edit Profil
    </div>

    <div class="card-body">
        <form id="profile_edit" action="{{ route("admin.profile-update", [$user->id]) }}" method="POST" enctype="multipart/form-data" role="form" novalidate="novalidate">@csrf
            <div class="row">

            	<div class="col-sm-1">
            	</div>
            	<div class="col-sm-3">
            		<div class="avatar-box">
            			<img class="is-avatar" src="{{ asset('img/avatar/'. $user->avatar) }}" alt="">
	            		<div class="form-group {{ $errors->has('avatar') ? 'is-invalid' : '' }}">
	            			<label>Ganti Foto Profil</label>
							<div class="input-group">
								<div class="custom-file">
									<label class="custom-file-label" for="avatar">Pilih file</label>
									<input type="file" id="avatar" name="avatar" class="form-control custom-file-input">
								</div>
							</div>
							<span id="avatar-error" class="error invalid-feedback">{{ $errors->first('avatar') }}</span>
							{{-- <input type="file" id="avatar" name="avatar" class="form-control @error('avatar') is-invalid @enderror" value="{{ old('avatar', isset($user) ? $user->detail->avatar : '') }}"> --}}
							<input type="hidden" id="current_avatar" name="current_avatar" value="{{ old('name', isset($user) ? $user->avatar : '') }}">

							@error('avatar')
		                        <p class="help-block">
		                            {{ $message }}
		                        </p>
		                    @enderror
	            		</div>
            		</div>
	            </div>
	            <div class="col-sm-7">
            		<div class="form-group">
            			<label>Nama</label>
						<input type="text" id="name" name="name" class="form__input form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name', isset($user) ? $user->name : '') }}" aria-describedby="name-error" autocomplete="off" data-validate-field="name">
						<span id="name-error" class="error invalid-feedback">{{ $errors->first('name') }}</span>
            		</div>
            		<div class="form-group">
            			<label>Jabatan</label>
						<input type="text" id="role" name="role" class="form__input form-control {{ $errors->has('role') ? 'is-invalid' : '' }}" value="{{ old('role', isset($user) ? $user->detail->role : '') }}" autocomplete="off" data-validate-field="role">
						<span id="role-error" class="error invalid-feedback">{{ $errors->first('role') }}</span>
	                    <p class="helper-block">
	                        {{ trans('cruds.lesson.fields.title_helper') }}
	                    </p>
            		</div>
            		<div class="form-group">
            			<label>Bio</label>
						<textarea id="bio" name="bio" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}">{{ old('bio', isset($user) ? $user->detail->bio : '') }}</textarea>
						<span id="bio-error" class="error invalid-feedback">{{ $errors->first('bio') }}</span>
	                    <p class="helper-block">
	                        {{ trans('cruds.lesson.fields.shor_text_helper') }}
	                    </p>
            		</div>
            	</div>
            	<div class="col-sm-1">
            	</div>
            </div>
            <div class="row">
            	<div class="col-sm-4">
            	</div>
            	<div class="col-sm-8">
					<div>
						<button class="btn btn-danger" type="submit">{{ trans('global.save') }}</button>
					</div>
            	</div>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
		<div class="card">
		    <div class="card-header">
		        Edit email
		    </div>

		    <div class="card-body">
		        <form id="email_edit" action="{{ route("admin.profile.update.email", [$user->id]) }}" method="POST" enctype="multipart/form-data">
		            @csrf
		    		<div class="form-group">
		    			<label>Email Baru</label>
						<input type="email" class="form__input form-control" id="email" name="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" placeholder=" Email" autocomplete="off" data-validate-field="email">
		    		</div>
		    		<div class="form-group">
		    			<label>Konfirmasi Password</label>
						<input class="form__input form-control" name="class" id="password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password'" placeholder="Konfirmasi Password" autocomplete="off" data-validate-field="password">
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

	 <div class="col-sm-6">
		<div class="card">
		    <div class="card-header">
		        Edit Password
		    </div>

		    <div class="card-body">
		        <form id="password_edit" action="{{ route("admin.profile-update-password", [$user->id]) }}" method="POST" enctype="multipart/form-data">
		            @csrf
		    		<div class="form-group">
		    			<label>Password Sekarang</label>
						<input class="form__input form-control" name="current_password" id="current_password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Sekarang'" placeholder="Password Sekarang" autocomplete="off" data-validate-field="current_password">
		    		</div>
		    		<div class="form-group">
		    			<label>Password Baru</label>
						<input class="form__input form-control" name="new_password" id="new_password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password Baru'" placeholder="Password Baru" autocomplete="off" data-validate-field="new_password">
		    		</div>
		    		<div class="form-group">
		    			<label>Konfirmasi Password Baru</label>
						<input class="form__input form-control" name="confirm_password" id="confirm_password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmasi Password Baru'" placeholder="Konfirmasi Password Baru" autocomplete="off" data-validate-field="confirm_password">
		    		</div>
		    		<div class="form-group">
						<input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
		            </div>
		        </form>
		    </div>
		</div>
	</div>
</div>

@endsection