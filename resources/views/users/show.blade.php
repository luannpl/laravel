@extends('layouts.app')
@section('title')
    Usuario {{ $user->id }}
@endsection
@section('content')
    @php
        $isAdmin = false;
        if ($user->id == 1) {
            $isAdmin = true;
        }
    @endphp
    <h1 class="bg-red-500">Usuário {{ $user->id }}</h1>
    <p>Nome: {{ $user->name }}</p>
    @if ($isAdmin)
        <div>Usuário Admin</div>
    @endif
@endsection
