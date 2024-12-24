<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        
        // Recherche
        if ($request->has('search')) {
            $query->search($request->search);
        }
        
        // Filtres
        if ($request->has('nom')) {
            $query->where('nom', 'like', $request->nom . '%');
        }
        if ($request->has('prenom')) {
            $query->where('prenom', 'like', $request->prenom . '%');
        }
        
        // Tri
        $sortField = $request->get('sort', 'nom');
        $sortDirection = $request->get('direction', 'asc');
        $query->orderBy($sortField, $sortDirection);
        
        $contacts = $query->paginate(10)->withQueryString();
        
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10'
        ]);

        Contact::create($validated);

        return redirect()->route('contacts.index')
            ->with('success', 'Le contact a été créé avec succès.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Le contact a été supprimé avec succès.');
    }
}
