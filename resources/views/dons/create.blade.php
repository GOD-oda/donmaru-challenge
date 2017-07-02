@extends('layouts.master')

@section('main')

    <div class="container">
        @if (count($errors) > 0)
            <div class="row">
                <div class="col-md-6 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="row">
            {!! Form::open(['route' => 'don.store', 'files' => true]) !!}
                @include('dons.elements.form', ['submitButtonName' => '投稿'])
            {!! Form::close() !!}
        </div>
    </div>
@endsection