<?php

namespace Hamoh\User\Mail;

use Hamoh\User\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
//    public $user;
    public $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        //
//        $this->user = $user;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('User::mails.reset-password-verify-code')
            ->subject('بازیابی رمز عبور');
    }
}
