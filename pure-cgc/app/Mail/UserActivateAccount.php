<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserActivateAccount extends Mailable
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
        return $this->from('support@eat-you.com')
                    ->markdown('emails.user_activate_account')
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
