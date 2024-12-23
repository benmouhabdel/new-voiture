@extends('layouts.newapp')

@section('content')
<div class="container">
    <h1>Liste des Contacts</h1>
    <div class="mb-3">
        <form method="GET" action="{{ route('contacts.index') }}">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher un contact..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Rechercher</button>
            </div>
        </form>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th><a href="?sort=nom&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}">Nom</a></th>
                <th><a href="?sort=prenom&direction={{ request('direction') == 'asc' ? 'desc' : 'asc' }}">Prénom</a></th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $contact->nom }}</td>
                    <td>{{ $contact->prenom }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact) }}" class="btn btn-info btn-sm">Voir</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucun contact trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
@endsection
