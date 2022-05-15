<?php

use App\Models\Stream;

/** @var Stream $stream */
?>
@extends('layouts.app')

@section('content')
    <div class="">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Streams</h1>
                    <p class="lead text-muted">Check out interesting streams from our creators</p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                @include('layouts.message')

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($streams as $stream)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ $stream->img_preview }}" class="card-img-top" alt="{{ $stream->title }}">

                                <div class="card-body">
                                    <p class="card-text">{{ $stream->title }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('stream.view', ['stream' => $stream->id]) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                        </div>
                                        <small class="text-muted">{{ $stream->created_at->format('d.m.Y H:i')  }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
