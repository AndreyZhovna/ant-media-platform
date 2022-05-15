<?php

namespace App\Http\Controllers;

use App\Constants\StreamConstant;
use App\Http\Requests\StreamAddRequest;
use App\Models\Stream;
use App\Services\StreamService;

class StreamController extends Controller
{
    protected StreamService $streamService;

    public function __construct()
    {
        $this->streamService = new StreamService();
    }

    public function index()
    {
        $streams = Stream::orderBy('id', 'desc')
            ->get();

        return view('stream.index', [
            'streams' => $streams
        ]);
    }

    public function view(Stream $stream)
    {
        return view('stream.view', [
            'stream' => $stream
        ]);
    }

    public function add()
    {
        return view('stream.add');
    }

    public function store(StreamAddRequest $request)
    {
        $stream = $this->streamService->make(
            $request->input('title'),
            auth()->id(),
            $request->input('description'),
            $request->input('img_preview')
        );

        $stream->img_preview = $this->streamService->uploadFile(
            $request,
            'img_preview',
            StreamConstant::IMG_PREVIEW_PATH
        );

        $this->streamService->store($stream);

        return redirect( route('stream.index') )
            ->with('message', 'Stream successfully created!');
    }
}
