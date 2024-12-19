@extends('layouts.newapp')

@section('title', 'Ajouter une voiture')

@section('content')
    <div class="z-10 bg-white shadow-md rounded-lg">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">Ajouter une voiture</h1>
            @include('cars.form')
        </div>
    </div>
@endsection
