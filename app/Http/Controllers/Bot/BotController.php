<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Core\Controller;
use App\Http\Requests\BotRequest;
use App\Models\Message;
use App\Services\WebHookService;

class BotController extends Controller
{
    protected $hook;

    public function __construct(WebHookService $hook)
    {
        $this->hook = $hook;
    }

    public function message(BotRequest $request)
    {
        $validatedData = $request->validatedData();

        $this->hook->sendMessage($validatedData['chat_id'],$validatedData['text']);
        Message::query()->create($validatedData);

        return response()->json(['status' => 'success']);
    }
}

