<?php

namespace App\Http\Controllers;

use OpenAI\Client;

class ChatController extends Controller
{
    protected $openai;

    public function __construct(Client $openai)
    {
        $this->openai = $openai;
    }

    public function chat(Request $request)
    {
        $response = $this->openai->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $request->input('message'),
            'max_tokens' => 100
        ]);

        return response()->json([
            'reply' => $response->choices[0]->text
        ]);
    }
}
