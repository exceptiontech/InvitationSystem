<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserForgetPassword extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * The demo object instance.
     *
     * @var Demo
     */
    public $demo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demo)
    {
        $this->demo = $demo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@eat-you.com')
                    ->markdown('mails.demo')
                    ->with(
                      [
                            // if i need to send any parameters and values to view page
                      ])
                      ->attach(public_path('/uploads').'/logo.png', [
                              'as' => 'demo.png',
                              'mime' => 'image/png',
                      ]);
    }
}
