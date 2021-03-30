@extends('auth.master')
@section('content')
    <div class="account act">

        <form action="{{ route('verification.resend') }}" class="form" method="post">
            @csrf
            <a class="account-logo" href="index.html">
                <img src="/img/weblogo.png" alt="">
            </a>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('یک ایمیل تایید جدید به آدرس ایمیل شما فرستاده شد.') }}
                </div>
            @endif
            <div class="card-header">
{{--                <p class="activation-code-title">کد فرستاده شده به ایمیل  <span>Mohammadniko3@gmail.com</span>--}}
{{--                    را وارد کنید . ممکن است ایمیل به پوشه spam فرستاده شده باشد--}}
{{--                </p>--}}
                <p class="activation-code-title">
                    لطفا قبل از ادامه آدرس ایمیل خود را تایید بفرمایید.
                </p>
                <p class="activation-code-title">
                    ممکن است ایمیل به پوشه spam فرستاده شده باشد.
                </p>
            </div>
            <div class="form-content form-content1">
{{--                <input class="activation-code-input" placeholder="فعال سازی">--}}
{{--                <br>--}}
                <button type="submit" class="btn i-t">ارسال مجدد</button>

            </div>
            <div class="form-footer">
                <a href="/">بازگشت به صفحه اصلی</a>
            </div>
        </form>
    </div>
@endsection
