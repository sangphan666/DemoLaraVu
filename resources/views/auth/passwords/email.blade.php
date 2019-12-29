@extends('layouts.app')

@section('content')
<div class="login__all">
    <div class="login__background">
        <div class="container">
            <div class="box__login box__forgot">
                <h1>JAPANA.VN</h1>
                <h3 class="mb-4">Quên mật khẩu</h3>
                <form method="POST" action="{{ route('password.email') }}">
                    <div class="form-group box__input mb-0">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                    </div>
                    <small class="form-text text_danger">
                        @error('email')
                        * {{ $message }}
                        @enderror
                    </small>
                    <div class="row login__action">
                        <div class="col-6 item">
                            <a href="#" title="Quay về"><i class="ti-arrow-left mr-2"></i>Quay về</a>
                        </div>
                        <div class="col-6 item">
                            <button type="submit" class="btn btn-danger">Gửi mail</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
