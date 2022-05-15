<?php

namespace App\Models\Antmedia;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class Api
{
    protected string $apiUrl;

    public function __construct($apiUrl)
    {
        $this->apiUrl = $apiUrl;
    }

    /**
     * @param int $offset
     * @param int $size
     * @return mixed
     * @throws RequestException
     */
    public function getBroadcastsList($offset = 0, $size = 20): mixed
    {
        $response = Http::get($this->apiUrl . "/broadcasts/list/$offset/$size");
        $response->throw();

        return $response->body();
    }

    /**
     * @param $id
     * @param $name
     * @return mixed
     * @throws RequestException
     */
    public function createBroadcast($id, $name): mixed
    {
        $params = [
            'streamId' => $id,
            'name' => $name,
        ];

        $response = Http::withBody(json_encode($params), 'application/json')
            ->post($this->apiUrl . '/broadcasts/create');
        $response->throw();

        return $response->body();
    }
}
