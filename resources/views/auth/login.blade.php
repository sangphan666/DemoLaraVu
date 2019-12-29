@extends('layouts.app')

@section('content')
<div class="login__all">
    <div class="login__background">
        <div class="container">
            <div class="box__login">
                <h1>JAPANA.VN</h1>
                <h3 class="mb-4">Đăng nhập</h3>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group box__input mb-0">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    </div>
                    <small class="form-text text_danger">
                        @error('email')
                        * {{ $message }}
                        @enderror
                    </small>
                    <div class="form-group box__input mb-0">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mật khẩu">
                        <span class="ti ti-eye" id="showpw"></span>
                    </div>
                    <small class="form-text text_danger">
                        @error('password')
                        * {{ $message }}
                        @enderror
                    </small>
                    <div class="icheck-primary custom_checkbox">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                            Ghi nhớ đăng nhập
                        </label>
                    </div>
                    <div class="row login__action">
                        @if (Route::has('password.request'))
                        <div class="col-6 item">
                            <a href="{{ route('password.request') }}" title="Quên mật khẩu?">Quên mật khẩu?</a>
                        </div>
                        @endif
                        <div class="col-6 item">
                            <button type="submit" class="btn btn-danger">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
