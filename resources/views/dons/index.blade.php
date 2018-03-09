@extends('layouts.master')

@section('main')
    <div class="container">
        <div class="row">
            @foreach ($all_don as $don)
                <div class="col-md-4 mb-5">
                    <div class="card @if ($don->posts->isEmpty()) failure @else success @endif">
                        <div class="title">{{ $don->name }}</div>
                        <div class="word">{{ $don->posts->first()->single_word or '---' }}</div>
                        <div class="date">{{ $don->posts->first()->updated_at or '---' }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection