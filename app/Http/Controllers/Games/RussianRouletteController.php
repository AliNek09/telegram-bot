<?php

namespace App\Http\Controllers\Games;


use App\Http\Requests\Games\RussianRouletteRequest;
use App\Models\Games\RussianRoulette;
use App\Services\WebHookService;

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
            $this->hook->sendMessage($data['chat_id'], 'BAANNGG!!!');
        } else {
            $this->hook->sendMessage($data['chat_id'], 'You are lucky. You missed the shot.');
        }

        $data['result'] = $result;
        RussianRoulette::query()->create($data);

        return response()->json([
            'message' => 'ok'
        ], 200);
    }
}
