<?php

namespace App\Providers;
namespace App\Services;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;

class OpenAIService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('OPENAI_API_KEY');
    }

    public function callOpenAIEndpoint($endpoint, $data)
    {
        $response = $this->client->post("https://api.openai.com/v1/$endpoint", [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}