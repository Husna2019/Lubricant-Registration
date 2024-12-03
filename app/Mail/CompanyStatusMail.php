<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompanyStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $company;
    public $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($company, $status)
    {
        $this->company = $company;
        $this->status = $status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Your Company Status: {$this->status}")
                    ->view('emails.company-status');
    }
}
