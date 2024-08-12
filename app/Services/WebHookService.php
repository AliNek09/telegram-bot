<?php

namespace App\Services;

use App\Services\Core\Service;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;
class WebHookService extends Service
{
    public function __construct()
    {
        $this->setBaseUrl("https://api.telegram.org/bot" . env('TELEGRAM_BOT_TOKEN') . '/');
    }

    public function sendMessage(int $chatId, string $text): Response
    {
        $response = $this->http()->post('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text
        ]);

        Log::channel('telegram')->info('Telegram API Request:', [
            'endpoint' => 'sendMessage',
            'payload' => ['chat_id' => $chatId, 'text' => $text],
            'response_status' => $response->status(),
            'response_body' => $response->body()
        ]);

        return $response;
    }
}
