<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
/*        $url = url('http://localhost:8000/verfication/' . $token);
        return (new MailMessage)
                ->greeting('Hello!')
                ->line('Please confirm link or buttom activation email below!')
                ->action('Click to verify your email', $url)
                ->line('Thank you for using  our application');*/
                return $this->view('emails.mymail');
    }
}
