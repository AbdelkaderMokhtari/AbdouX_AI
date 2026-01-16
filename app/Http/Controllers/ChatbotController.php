<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $data = $request->json()->all();

        if (!isset($data['message'])) {
            return response()->json(['reply' => 'Empty message'], 400);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.openai.key'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo', // أقل تكلفة ويدعم Free quota
            'messages' => [
                [
                    'role' => 'system',
                    'content' =>
                        'You are AbdouX, a professional Laravel developer from Algeria.
                        Answer politely and professionally about his skills, projects, services, and experience.'
                ],
                [
                    'role' => 'user',
                    'content' => $data['message']
                ]
            ],
            'temperature' => 0.7
        ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => $response->json('error.message') ?? 'OpenAI error'
            ], 500);
        }

        return response()->json([
            'reply' => $response->json('choices.0.message.content')
        ]);
    }
}
