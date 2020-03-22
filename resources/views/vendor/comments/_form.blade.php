{{-- <div class="card">
    <div class="card-body"> --}}
        @if($errors->has('commentable_type'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_type') }}
            </div>
        @endif
        @if($errors->has('commentable_id'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->get('commentable_id') }}
            </div>
        @endif
        <div id="comment-area" class="comment-form">
            <h4>Ayo Diskusi!</h4>
            <form method="POST" action="{{ route('comments.store') }}" class="comment_form">
                @csrf
                @honeypot
                <input type="hidden" name="commentable_type" value="\{{ get_class($model) }}" />
                <input type="hidden" name="commentable_id" value="{{ $model->id }}" />

                {{-- Guest commenting --}}
                @if(isset($guest_commenting) and $guest_commenting == true)
                    <div class="form-group">
                        <label for="message">Enter your name here:</label>
                        <input type="text" class="form-control @if($errors->has('guest_name')) is-invalid @endif" name="guest_name" />
                        @error('guest_name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="message">Enter your email here:</label>
                        <input type="email" class="form-control @if($errors->has('guest_email')) is-invalid @endif" name="guest_email" />
                        @error('guest_email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                @endif

                <div class="button_inside">
                    <div class="form-group">
                        {{-- <label for="message">Masukkan pesan di sini:</label> --}}
                        <textarea class="form-control comment w-100 @if($errors->has('message')) is-invalid @endif" name="message" rows="1" placeholder="Tulis komentar"></textarea>
                        <div class="invalid-feedback">
                            Komentar tidak boleh kosong.
                        </div>
                        {{-- <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small> --}}
                    </div>
                    <button type="submit" class="{{-- btn btn-sm btn-outline-success text-uppercase --}}button button-contactForm btn_1 boxed-btn">Kirim</button>
                </div>
            </form>
        </div>
    {{-- </div>
</div> --}}