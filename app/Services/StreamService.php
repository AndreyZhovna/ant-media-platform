<?php

namespace App\Services;

use App\Models\Stream;
use File;
use Illuminate\Foundation\Http\FormRequest;
use Storage;
use Str;

class StreamService
{
    /**
     * @param $title
     * @param $createdBy
     * @param null $description
     * @param null $imgPreview
     * @return Stream
     */
    public function make($title, $createdBy, $description = null, $imgPreview = null): Stream
    {
        $stream = new Stream();
        $stream->title = $title;
        $stream->created_by = $createdBy;
        $stream->description = $description;
        $stream->img_preview = $imgPreview;

        return $stream;
    }

    /**
     * @param FormRequest $request
     * @param $attributeName
     * @param $path
     * @return false|string
     */
    public function uploadFile(FormRequest $request, $attributeName, $path): bool|string
    {
        if ($file = $request->file($attributeName)) {
            $fileName = md5(Str::random(5) . time()) . '.' . $file->extension();
            $absolutePath = Storage::disk('public')->path($path);

            if ( !File::exists($absolutePath) ) {
                File::makeDirectory($absolutePath, 755, true);
            }

            $file->move($absolutePath, $fileName);

            return $fileName;
        }

        return false;
    }

    /**
     * @param Stream $stream
     * @return bool
     */
    public function store(Stream $stream): bool
    {
        return $stream->save();
    }
}
