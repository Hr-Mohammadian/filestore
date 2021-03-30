@extends('auth.master')
@section('content')

    <form class="form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <a class="account-logo" href="index.html">
            <img src="/img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">

            <input id="email" type="email"
                   class="txt txt-l form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ $email ?? old('email') }}"
                   required autocomplete="email"
                   placeholder="*ایمیل">
            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input id="password" type="password"
                   class="txt txt-l form-control @error('password') is-invalid @enderror"
                   name="password"
                   required autocomplete="new-password"
                   placeholder="* رمز عبور">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input id="password-confirm" type="password"
                   class="txt txt-l form-control @error('password') is-invalid @enderror"
                   name="password_confirmation"
                   required autocomplete="new-password"
                   placeholder="* تایید رمز عبور">

            <span class="rules">رمز عبور باید حداقل ۶ کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد و کاراکترهای غیر الفبا مانند !@#$%^&*() باشد.</span>
            <br>
            <button class="btn continue-btn">تغییر رمز عبور</button>

        </div>
        <div class="form-footer">
            <a href="{{route('login')}}">صفحه ورود</a>
        </div>
    </form>
@endsection
