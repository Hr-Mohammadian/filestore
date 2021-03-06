<?php
Route::group([
    'namespace' => 'Hamoh\User\Http\Controllers',
    'middleware' => 'web'
], function ($router) {
    Route::post('/email/verify','Auth\VerificationController@verify')->name('verification.verify');
    Route::get('/email/verify','Auth\VerificationController@show')->name('verification.notice');
    Route::post('/email/resend','Auth\VerificationController@resend')->name('verification.resend');


    //login
    Route::post('/login','Auth\LoginController@login')->name('login');
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');


    //logout
    Route::post('/logout','Auth\LoginController@logout')->name('logout');


    //reset password
//    Route::get('/password/reset','Auth\ForgetPasswordController@showLinkRequestForm')->name('password.request');
    Route::get('/password/reset','Auth\ForgotPasswordController@showVerifyCodeRequestForm')
        ->name('password.request');
    Route::get('/password/reset/send','Auth\ForgotPasswordController@sendVerifyCodeEmail')
        ->name('password.sendVerifyCodeEmail');

    Route::post('/password/reset/check-verify-code','Auth\ForgotPasswordController@checkVerifyCode')
        ->name('password.checkVerifyCode')
        ->middleware('throttle:5,1');

    Route::get('/password/change','Auth\ResetPasswordController@showResetForm')
        ->name('password.showResetForm')
        ->middleware('auth');

    Route::post('/password/change','Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');


    //register
    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register','Auth\RegisterController@register')->name('register');




//    Auth::routes(['verify' => true]);
});
