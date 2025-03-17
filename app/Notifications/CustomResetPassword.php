<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;

class CustomResetPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reimposta la tua password')
            ->view('emails.reset-password', [
                'name' => $notifiable->name,
                'actionUrl' => url(route('password.reset', ['token' => $this->token], true))
            ]);
    }
}
