<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AcceptBlog extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $post;
    public function __construct($post)
    {
        $this->post=$post;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Post Has Been Approved!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build(){
        return $this->from('fictioncaze@gmail.com','InsightfulBlogs team')->subject('Your Post Has Been Approved!')->view('emails.AccepteBlog')->with('post',$this->post);
    }
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.AccepteBlog',
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
