@extends('layouts.master')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h2>{{ $user->name }}さんの記録</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($all_don as $don)
                <div class="col-md-4 mb-5">
                    <div class="card @if ($don->created_at) success @else failure @endif">
                        <div class="title">{{ $don->don_name }}</div>
                        <div class="word">{{ $don->word or '---' }}</div>
                        <div class="date">{{ $don->updated_at or '---' }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection