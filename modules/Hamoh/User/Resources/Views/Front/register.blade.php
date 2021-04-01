@extends('User::Front.master')
@section('content')

    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <a class="account-logo" href="index.html">
            <img src="img/weblogo.png" alt="">
        </a>
        <div class="form-content form-account">
            <input id="name" type="text"
                   class="txt form-control @error('name') is-invalid @enderror"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   autocomplete="name"
                   placeholder="* نام و نام خانوادگی">

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input id="email" type="email"
                   class="txt txt-l form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}"
                   required autocomplete="email"
                   placeholder="*ایمیل">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <input id="mobile" type="text"
                   class="txt txt-l form-control @error('mobile') is-invalid @enderror"
                   name="mobile" value="{{ old('mobile') }}"
                    autocomplete="mobile"
                   placeholder="شماره موبایل">

            @error('mobile')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
{{--            <input type="text" class="txt txt-l" placeholder="شماره موبایل">--}}

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

            <span class="rules">رمز عبور باید حداقل 8 کاراکتر و ترکیبی از حروف بزرگ، حروف کوچک، اعداد باشد.</span>
            <br>
            <button class="btn continue-btn">ثبت نام و ادامه</button>
            <div class="form-footer">
                <a href="{{route('login')}}">صفحه ورود</a>
            </div>
        </div>

    </form>
@endsection
