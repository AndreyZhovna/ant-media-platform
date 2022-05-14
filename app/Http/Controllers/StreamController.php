<?php

namespace App\Http\Controllers;

use App\Models\Stream;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function index()
    {
        $streams = Stream::all();

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
}
