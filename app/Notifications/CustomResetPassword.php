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
            ->greeting('Ciao ' . $notifiable->name . '!')
            ->line('Hai richiesto di reimpostare la tua password su **aws-s3-six.vercel.app**.')
            ->action('Resetta la Password', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line('Se non hai richiesto questa email, puoi ignorarla.')
            ->salutation('A presto, **Il Team di Sestapertica**');
    }
}
