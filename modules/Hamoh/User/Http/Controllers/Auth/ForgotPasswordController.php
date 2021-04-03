<?php

namespace Hamoh\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Hamoh\User\Http\Requests\ResetPasswordVerifyCodeRequest;
use Hamoh\User\Http\Requests\VerifyCodeRequest;
use Hamoh\User\Models\User;
use Hamoh\User\Repositories\UserRepo;
use Hamoh\User\Services\VerifyCodeService;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Hamoh\User\Http\Requests\SendResetPasswordVerifyCodeRequest;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('User::Front.passwords.email');
    }

    public function showVerifyCodeRequestForm()
    {
        return view('User::Front.passwords.email');
    }

    public function sendVerifyCodeEmail(SendResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);
        if ($user && ! VerifyCodeService::has($user->id)){
            $user->sendResetPasswordRequestNotification();
        }
        return view('User::Front.passwords.enter-verify-code-form');
    }

    public function checkVerifyCode(ResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);
        if (!VerifyCodeService::check($user->id,$request->verify_code)){
            return back()->withErrors(['verify_code' => 'کد وارد شده معتبر نمیباشد']);
        };
        auth()->loginUsingId($user->id);
        return redirect()->route('password.showResetForm');

    }
}
