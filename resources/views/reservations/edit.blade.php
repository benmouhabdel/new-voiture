@extends('layouts.newapp')

@section('title', 'Modifier la Réservation')

@section('content')
    <div class="bg-white shadow-md rounded-lg">
        <div class="p-6">
            <h1 class="text-2xl font-bold mb-6">Modifier la Réservation</h1>
            @include('reservations.form')
        </div>
    </div>
@endsection
