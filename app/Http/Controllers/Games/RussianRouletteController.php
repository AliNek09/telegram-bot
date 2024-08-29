<?php

namespace App\Http\Controllers\Games;


use App\Http\Requests\Games\RussianRouletteRequest;
use App\Models\Games\RussianRoulette;
use App\Services\WebHookService;
use Illuminate\Support\Facades\Log;

class RussianRouletteController
{
    protected $hook;

    public function __construct(WebHookService $webHook)
    {
        $this->hook = $webHook;
    }

    public function roulette(RussianRouletteRequest $request)
    {
        $data = $request->validateData();
        $result = ($data['number'] == rand(0,10));
        if($result) {
            $response = $this->hook->sendMessage($data['chat_id'], 'BAANNGG!!!');
        } else {
            $response = $this->hook->sendMessage($data['chat_id'], 'You are lucky. You missed the shot.');
        }

        Log::channel('telegram')->info('Telegram API Request:', [
            'endpoint' => 'sendMessage',
            'payload' => ['chat_id' => $data['chat_id'], 'text' => $result ? 'BAANNGG!!!' : 'You are lucky. You missed the shot.'],
            'response_status' => $response->status(),
            'response_body' => $response->body()
        ]);

        $data['result'] = $result;
        RussianRoulette::query()->create($data);
    }
}
