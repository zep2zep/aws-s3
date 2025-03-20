<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestConnectionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $results;

    public function __construct($results)
    {
        $this->results = $results;
    }

    public function build()
    {
        return $this->subject('🖧 Report Test Connessioni')
            ->view('emails.test_connection') // Usa una vista dedicata per l'email
            ->with(['results' => $this->results]);
    }
}
