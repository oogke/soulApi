<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

// public $username;
    public $message;
    public $subject;
    public $verifcode;
    
    /**
     * Create a new message instance.
     */
    public function __construct($message,$subject,$verifcode)
    {
        $this->message =$message;
        $this->subject= $subject;
        $this->verifcode= $verifcode;
        // $this->username= $username;


    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.email'
            // with: [
            //     'message' => $this->message,   // Pass the message property
            //     'subject' => $this->subject,   // Pass the subject property
            //     'verifcode' => $this->verifcode, // Pass the verification code
            //     'username' => $this->username  // Pass the username
            // ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
