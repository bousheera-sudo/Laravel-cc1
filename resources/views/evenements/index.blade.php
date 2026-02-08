@extends('layouts.app')

@section('content')
<div class="row mb-5">
    <div class="col-md-12">
        <h2 class="page-title">Liste des événements en cours</h2>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-calendar-event me-2"></i>Événements programmés</span>
        <span class="badge bg-primary badge-custom">{{ $evenements->count() }} événements</span>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover">
            <thead class="bg-light">
                <tr>
                    <th class="ps-4">Thème</th>
                    <th>Date début</th>
                    <th>Date fin</th>
                    <th>Coût / Jour</th>
                    <th>Expert</th>
                    <th class="text-end pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($evenements as $evenement)
                <tr>
                    <td class="ps-4 fw-bold">{{ $evenement->theme }}</td>
                    <td>{{ $evenement->date_debut }}</td>
                    <td>{{ $evenement->date_fin }}</td>
                    <td>{{ number_format($evenement->cout_journalier, 2) }} MAD</td>
                    <td>
                        @if($evenement->expert)
                            <span class="badge bg-primary-soft">{{ $evenement->expert->prenomExp }} {{ $evenement->expert->nomExp }}</span>
                        @else
                            <span class="text-muted">N/A</span>
                        @endif
                    </td>
                    <td class="text-end pe-4 action-buttons">
                        <a href="{{ route('evenements.show', $evenement->id) }}" class="btn btn-outline-primary btn-sm">Consulter</a>
                        <a href="{{ route('evenements.edit', $evenement->id) }}" class="btn btn-outline-secondary btn-sm">Modifier</a>
                        <form action="{{ route('evenements.destroy', $evenement->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
