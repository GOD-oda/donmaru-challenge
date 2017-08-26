@extends('layouts.master')

@section('main')
    <div class="container">
        <div class="top-description">
            @if ($user)
                <a href="/user/{{ $user->id }}/shop/1/don">自分の記録を見る</a>
            @else
                <a href="/login/twitter">Twitterでログインする</a>
            @endif
        </div>
    </div>
@endsection