<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SuccessPaid extends Notification
{
    use Queueable;

    protected $code;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','whatsapp'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type'      => 'success_paid',
            'data'      => 'Your payment of order #' . $this->code . ' has been successfully paid.',
        ];
    }

    public function toWhatsapp($notifiable)
    {
        return [
            'number'    => $notifiable->profile->phone ?? 0,
            'data'      => 'Your payment of order #' . $this->code . ' has been successfully paid.',
        ];
    }
}
