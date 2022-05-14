@extends('layouts.app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ $stream->img_preview }}" class="card-img-top" alt="{{ $stream->name }}">

                        <div class="card-body">
                            <p class="card-text">{{ $stream->name }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $stream->created_at->format('d.m.Y H:i')  }}</small>
                                <small class="text-muted">{{ $stream->created_by->nickname  }}</small>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
