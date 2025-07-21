@extends('layouts.app')

@section('content')
    <h1 class="text-yellow-600">{{ $greeting }}</h1>
    <img width="100" src="{{ Vite::asset('resources/images/imagem.jpeg') }}" alt="">
    @foreach ($users as $user)
        @if ($loop->last)
            <p>Primeira interação</p>
            @break
        @endif
        <p class="text-green-400">{{ $user->name }}</p>
    @endforeach
@endsection
