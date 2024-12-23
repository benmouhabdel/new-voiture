@extends('layouts.newapp')

@section('content')
<div class="container">
    <h1>Détails du Contact</h1>
    <table class="table table-bordered">
        <tr>
            <th>Nom</th>
            <td>{{ $contact->nom }}</td>
        </tr>
        <tr>
            <th>Prénom</th>
            <td>{{ $contact->prenom }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $contact->email }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $contact->description }}</td>
        </tr>
    </table>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Retour</a>
</div>
@endsection
