@extends('User::Front.master')
@section('content')
    <form action="{{ route('password.email') }}" class="form" method="post">
        @csrf

        <a class="account-logo" href="index.html">
            <img src="/img/weblogo.png" alt="">
        </a>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-content form-account">
            <input id="email" type="email"
                   class="txt-l txt form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="email"
                   placeholder="ایمیل" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <br>
            <button type="submit" class="btn btn-recoverpass">بازیابی</button>
        </div>
        <div class="form-footer">
            <a href="{{route('login')}}">صفحه ورود</a>
        </div>
    </form>
@endsection
