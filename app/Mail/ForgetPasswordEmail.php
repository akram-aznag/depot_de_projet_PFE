<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public function __construct($user)
    {
        $this->user=$user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rest Password Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build(){
        return $this->from('fictioncaze@gmail.com','InsightfulBlogs team')->subject('Reset Your Password - Action Required')->view('emails.ForgetPasswordEmail.blade')->with('user',$this->user);
    }
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.ForgetPasswordEmail',
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
