@extends('User::Front.master')
@section('content')
    <form method="POST" class="form" action="{{ route('login') }}">
        @csrf
        <a class="account-logo" href="index.html">
            <img src="img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
{{--            <input type="text" class="txt-l txt" placeholder="ایمیل یا شماره موبایل">--}}
            <input
                   id="email"
                   type="text"
                   class="txt-l txt form-control @error('email') is-invalid @enderror"
                   name="email"
                   value="{{ old('email') }}" required autocomplete="email" autofocus
                   placeholder="ایمیل یا شماره موبایل">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
{{--            <input type="text"class="txt-l txt" placeholder="رمز عبور">--}}
            <input id="password"
                   type="password"
                   class="txt-l txt form-control @error('password') is-invalid @enderror"
                   name="password"
                   required
                   autocomplete="current-password"
                   placeholder="رمز عبور">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <br>
            <button class="btn btn--login">ورود</button>
            <label class="ui-checkbox">
                مرا بخاطر داشته باش
                <input class="form-check-input" type="checkbox"
                       name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <span class="checkmark"></span>
            </label>
            <div class="recover-password">
                <a href="recoverpassword.html">بازیابی رمز عبور</a>
            </div>
        </div>
        <div class="form-footer">
            <a href="{{route('register')}}">صفحه ثبت نام</a>
        </div>
    </form>
@endsection
