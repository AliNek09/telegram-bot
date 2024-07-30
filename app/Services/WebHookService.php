<?php

namespace App\Services;

use App\Services\Core\Service;
use Illuminate\Http\Client\Response;
class WebHookService extends Service
{
    public function __construct()
    {
        $this->setBaseUrl("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . '/');
    }

   public function sendMessage(int $chatId, string $text): Response
   {
       return $this->http()->post('sendMessage', [
          'chat_id' => $chatId,
          'text' => $text
       ]);
   }
}
