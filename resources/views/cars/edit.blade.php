@extends('layouts.newapp')

@section('title', 'Modifier la voiture')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">Modifier la voiture</h1>
            @include('cars.form')
        </div>
    </div>
@endsection
