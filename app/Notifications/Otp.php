<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Otp extends Notification
{
    use Queueable;

    protected $number;
    protected $otp;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($number, $otp)
    {
        $this->number = $number;
        $this->otp = $otp;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['whatsapp'];
    }

    public function toWhatsapp()
    {
      return [
          'number'    => $this->number,
          'data'      => 'This is your OTP '.$this->otp.', please do not share this with anyone.',        
      ];
    }
}
