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
    public $ipAddress;
    public $browser;

    public function __construct($results, $ipAddress, $browser)
    {
        $this->results = $results;
        $this->ipAddress = $ipAddress;
        $this->browser = $browser;
    }

    public function build()
    {
        return $this->subject('🔍 Test Connessione Database')
            ->view('emails.test_connection')
            ->with([
                'results' => $this->results,
                'ipAddress' => $this->ipAddress,
                'browser' => $this->browser
            ]);
    }
}
