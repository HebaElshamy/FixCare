<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OpenAIService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
        $this->baseUrl = env('OPENAI_BASE_URL', 'https://openrouter.ai/api/v1');
    }

    public function chat($message)
    {
        try {
            $response = $this->client->post("{$this->baseUrl}/chat/completions", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model'    => 'openai/gpt-4',
                    // 'model'    => 'mistralai/mixtral-8x7b-instruct',


                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                        ['role' => 'user', 'content' => $message],
                    ],
                    'max_tokens' => 200,
                ],
            ]);

            $body = json_decode($response->getBody(), true);
            return $body['choices'][0]['message']['content'] ?? 'No response';

        } catch (RequestException $e) {
            return "⚠️ خطأ: " . $e->getMessage();
        }
    }
}
