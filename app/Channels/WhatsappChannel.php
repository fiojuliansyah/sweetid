<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class WhatsappChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!method_exists($notification, 'toWhatsapp')) {
            throw new \Exception('toWhatsapp method missing from notification class.');
        }

        $message = $notification->toWhatsapp($notifiable);

        return Http::asJson()
          ->withHeaders([
            'Authorization' => env('fonnte_token', '1gK-tU2!MzeN8vu_Ywk4'),
          ])
          ->post('https://api.fonnte.com/send', [
            'target' => $message['number'],
            'message' => $message['data'],            
          ]);
    }        
}