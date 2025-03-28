<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OpenAIService;

class ChatController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }

    public function chat(Request $request)
    {
        $message = $request->input('message');

        if (!$message) {
            return response()->json(['error' => 'الرجاء إدخال رسالة'], 400);
        }

        $response = $this->openAIService->chat($message);
        return response()->json(['response' => $response]);
    }
}
