@extends('dashboard.layouts.dashboard', ['title' => 'Utilisateurs'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <div class="mb-3">
            <h3 class="mb-1"></i> <span class="font-weight-semibold">Utilisateurs</span></h3>
            <span class="text-muted d-block">
                <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
                <span class="breadcrumb-item">Administration</span>
                <span class="breadcrumb-item active">Utilisateurs</span>
            </span>
        </div>
        
    </div>
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_iconified" class="btn bg-teal">Ajouter un utilisateur</a>
    </div>
    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" data-toggle="modal" data-target="#modal_iconified" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection

@section('content')
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Profil</th>
                {{-- <th>Fonction</th> --}}
                <th>Email</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->profil->libelle }}</td>
                    {{-- <td>{{ $user->fonction->nom_fnct }}</td> --}}
                    <td>{{ $user->email }}</td>
                    <td>aaa</td>
                    <td class="text-center">
                        <a href="{{ route('user.edit', $user) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                        </a>
                        <a href="{{ route('user.reset_password', $user) }}" class="icon-lock text-warning" data-toggle="tooltip" data-placement="bottom" title="Réinitialiser mot de passe" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','reset-form-{{ $user->id }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="reset-form-{{ $user->id }}" action="{{ route('user.reset_password', $user) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                        <a href="{{ route('user.destroy', $user) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $user->id }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="logout-form-{{ $user->id }}" action="{{ route('user.destroy', $user) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection