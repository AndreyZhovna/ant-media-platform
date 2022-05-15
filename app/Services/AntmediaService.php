<?php

namespace App\Services;

use App\Models\Antmedia\Api;
use App\Models\Stream;
use Illuminate\Http\Client\RequestException;
use JsonException;

class AntmediaService
{
    public Api $api;

    public function __construct()
    {
        $this->api = new Api( config('ant-media-server.api_url') );
    }

    /**
     * @param Stream $stream
     * @return mixed
     * @throws RequestException
     */
    public function createStream(Stream $stream): mixed
    {
        return $this->api->createBroadcast($stream->slug, $stream->title);
    }

    /**
     * @param $count
     * @return mixed
     * @throws JsonException
     * @throws RequestException
     */
    public function getStreamsList($count): mixed
    {
        return json_decode($this->api->getBroadcastsList(0, $count), false, 512, JSON_THROW_ON_ERROR);
    }
}
