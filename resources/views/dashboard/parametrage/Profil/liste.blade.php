@extends('dashboard.layouts.dashboard', ['title' => 'profils'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <div class="mb-3">
            <h3 class="mb-1"></i> <span class="font-weight-semibold">Profils</span></h3>
            <span class="text-muted d-block">
                <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
                <span class="breadcrumb-item">Administration</span>
                <span class="breadcrumb-item active">Profil</span>
            </span>
        </div>
        
    </div>

    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('profil.create') }}" class="btn bg-teal">Ajouter un profil</a>
    </div>
</div>
@endsection

@section('content')
<!-- Basic initialization -->
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profils as $profil)
                <tr>
                    <td>{{ $profil->libelle }}</td>
                    <td>{{ $profil->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        <a href="{{ route('profil.edit', $profil) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                        <a href="{{ route('profil.destroy', $profil) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $profil->id }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="logout-form-{{ $profil->id }}" action="{{ route('profil.destroy', $profil) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- /basic initialization -->
@endsection