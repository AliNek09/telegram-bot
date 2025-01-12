<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Core\Controller;
use App\Http\Requests\BotRequest;
use App\Models\Message;
use App\Services\WebHookService;

class BotController extends Controller
{

    // MAGIC STUFF
    protected $hook;

    public function __construct(WebHookService $hook) // IS USED FOR CONSTRUCTING THE WEB-HOOK FOR TELEGRAM
    {
        $this->hook = $hook;
    }

    public function message(BotRequest $request)
    {
        $validatedData = $request->validatedData();

        $this->hook->sendMessage($validatedData['chat_id'],$validatedData['text']);//THROUGH THE CHAT_ID
        Message::query()->create($validatedData);// IT SENDS THE MESSAGE TO THE USER

        return response()->json(['status' => 'success']);
    }
}




