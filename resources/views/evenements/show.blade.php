@extends('layouts.app')

@section('content')
<div class="row mb-5">
    <div class="col-md-12">
        <h2 class="page-title">Détails de l'événement</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-header">
                Informations Générales
            </div>
            <div class="card-body">
                <h3 class="mb-4 text-primary">{{ $evenement->theme }}</h3>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Date de début</p>
                        <p class="fw-bold">{{ $evenement->date_debut }}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-muted mb-1">Date de fin</p>
                        <p class="fw-bold">{{ $evenement->date_fin }}</p>
                    </div>
                </div>
                <div class="mb-3">
                    <p class="text-muted mb-1">Description</p>
                    <p>{{ $evenement->description }}</p>
                </div>
                <div class="mb-3">
                    <p class="text-muted mb-1">Coût par jour</p>
                    <p class="fw-bold fs-5">{{ number_format($evenement->cout_journalier, 2) }} MAD</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Ateliers associés
            </div>
            <div class="card-body p-0">
                @if($evenement->ateliers->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th class="ps-4">Nom de l'atelier</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evenement->ateliers as $atelier)
                        <tr>
                            <td class="ps-4 fw-medium">{{ $atelier->nomAtelier }}</td>
                            <td class="text-muted">{{ $atelier->descriptionAtelier }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    <div class="p-4 text-center text-muted">
                        Aucun atelier n'est associé à cet événement.
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">
                Expert Responsable
            </div>
            <div class="card-body">
                @if($evenement->expert)
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-light rounded-circle p-3 me-3 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </div>
                        <div>
                            <h5 class="mb-0">{{ $evenement->expert->prenomExp }} {{ $evenement->expert->nomExp }}</h5>
                            <small class="text-muted">{{ $evenement->expert->specialiteExp }}</small>
                        </div>
                    </div>
                    <div>
                        <p class="mb-1"><small class="text-muted">Email:</small> <br> {{ $evenement->expert->emailExp }}</p>
                        <p class="mb-0"><small class="text-muted">Tél:</small> <br> {{ $evenement->expert->telExp }}</p>
                    </div>
                @else
                    <p class="text-muted">Aucun expert assigné.</p>
                @endif
            </div>
        </div>
        
        <div class="d-grid gap-2">
            <a href="{{ route('evenements.index') }}" class="btn btn-outline-secondary">Retour à la liste</a>
            <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger w-100">Supprimer l'événement</button>
            </form>
        </div>
    </div>
</div>
@endsection
