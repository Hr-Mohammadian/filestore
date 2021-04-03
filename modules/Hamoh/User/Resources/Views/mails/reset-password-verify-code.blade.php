@component('mail::message')
# کد بازیابی رمز عبور حساب شما

این ایمیل جهت ادامه فرآیند بازیابی رمز عبور شما ارسال شده است.
در صورتی که درخواستی از طرف شما انجام نشده است این ایمیل را نادیده بگیرید.

{{--@component('mail::button', ['url' => ''])--}}
@component('mail::panel')
کد بازیابی رمز عبور : {{$code}}
@endcomponent

با تشکر,<br>
{{ config('app.name') }}
@endcomponent
