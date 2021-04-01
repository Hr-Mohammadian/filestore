<?php
Route::group(['namespace' => 'Hamoh\User\Http\Controllers',
    'middleware' => 'web'],function ($router){

Auth::routes(['verify'=> true]);

});
