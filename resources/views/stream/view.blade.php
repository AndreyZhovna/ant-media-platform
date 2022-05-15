@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 g-3">
                <div class="col-md-6 offset-3">
                    <div class="card shadow-sm">
                        <img src="{{ $stream->img_preview }}" class="card-img-top" alt="{{ $stream->title }}">

                        <div class="card-body">
                            <h3>{{ $stream->title }}</h3>
                            <p class="card-text">{{ $stream->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $stream->created_at->format('d.m.Y H:i')  }}</small>
                                <small class="text-muted">Streamer: {{ $stream->createdBy->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
