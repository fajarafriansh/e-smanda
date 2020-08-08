@extends('layouts.home-index')

@section('title')
    Edit Profil
@endsection

@section('content')

<!-- bradcam_area_start -->
<div class="bradcam_area breadcam_bg overlay2">
    <h3>Edit Profil</h3>
</div>
<!-- bradcam_area_end -->

<!-- ================ contact section start ================= -->
<section class="profile-edit-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="card w-100">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                Edit Profil
                            </h5>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('student.update', $student->id) }}" method="post" id="student_edit" novalidate="novalidate">@csrf
                                <input type="hidden" id="current_avatar" name="current_avatar" value="{{ old('avatar', isset($student) ? $student->avatar : '') }}">

                                <div class="row">
                                    <div class="col-12 profile-edit avatar-container">
                                        <img class="profile-edit avatar" src="{{ asset ('img/avatar/'. $student->avatar) }}" alt="">
                                        <div class="form-group">
                                            <label for="name">Avatar</label>
                                            <input type="file" class="form__input form-control w-100" name="avatar" id="avatar">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <input type="text" class="form__input form-control w-100" name="name" id="name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama'" placeholder=" Nama" autocomplete="off" data-validate-field="name" value="{{ old('name', isset($student) ? $student->name : '') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="class_room">Kelas</label>
                                            <select class="form__input form-control" name="class_room" id="class_room">
                                                <option>Pilih Kelas</option>
                                                @foreach($classrooms as $class)
                                                    <option>{{ $class->room }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input class="form__input form-control" name="class_room" id="class_room" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan kelas'" placeholder="Pilih kelas" autocomplete="off" data-validate-field="class_room"> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
        <div class="row upper_margin">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="card w-100">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                Edit Password
                            </h5>
                        </div>
                        <div class="card-body">
                            <form class="" action="{{ route('student.update.password', $student->id) }}" method="post" id="student_password" novalidate="novalidate">@csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="password" class="form-control w-100" name="current_password" id="current_password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password sekarang'" placeholder=" Password sekarang">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="new_password" id="new_password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password baru'" placeholder="Password baru">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control" name="confirm_new_password" id="confirm_new_password" type="password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Konfirmassi password baru'" placeholder="Konfirmasi password baru">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->

@endsection