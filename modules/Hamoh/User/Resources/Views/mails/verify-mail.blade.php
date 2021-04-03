@component('mail::message')
# کد فعالسازی حساب شما

این ایمیل جهت ادامه فرآیند ثبت نام شما ارسال شده است.
در صورتی که ثبت نامی از طرف شما انجام نشده است این ایمیل را نادیده بگیرید.

{{--@component('mail::button', ['url' => ''])--}}
@component('mail::panel')
کد فعالسازی : {{$code}}
@endcomponent

با تشکر,<br>
{{ config('app.name') }}
@endcomponent
