<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscribeMails extends Mailable
{
    use Queueable, SerializesModels;
    public $ms_email_obj;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ms_email_obj)
    {
        $this->ms_email_obj=$ms_email_obj;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from.address'))
                    ->markdown('emails.subscribe_mails')
                    ->with(
                      [
                            // if i need to send any parameters and values to view page
                      ])
                      ->attach(public_path('/uploads').'/logo.png', [
                              'as' => 'logo.png',
                              'mime' => 'image/png',
                      ]);
    }
}
