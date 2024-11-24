<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class VerifyRegistrationMail extends Mailable
{
    public $verificationUrl;

    public function __construct($verificationUrl)
    {
        $this->verificationUrl = $verificationUrl;
    }

    public function build()
    {
        return $this->subject('Xác nhận đăng ký tài khoản')
            ->view('email.verify-registration')
            ->with(['verificationUrl' => $this->verificationUrl]);
    }
}
