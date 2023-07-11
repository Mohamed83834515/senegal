@extends('dashboard.layouts.dashboard', ['title' => 'Modules'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <div class="mb-3">
            <h3 class="mb-1"></i> <span class="font-weight-semibold">Modules</span></h3>
            <span class="text-muted d-block">
                <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
                <span class="breadcrumb-item">Administration</span>
                <span class="breadcrumb-item active">Module</span>
            </span>
        </div>
        
    </div>

    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('module.create') }}" class="btn bg-teal">Ajouter un module</a>
    </div>
</div>
@endsection

@section('content')
<!-- Basic initialization -->
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic">
        <thead>
            <tr>
                <th>Nom du module</th>
                <th>Module parent</th>
                <th>Lien</th>
                <th>Classe css</th>
                <th>Icône</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
                <tr>
                    <td>{{ $module->libelle }}</td>
                    <td>{{ $module->parent_module ? $module->parent_module->libelle : 'Aucun' }}</td>
                    <td>{{ $module->lien }}</td>
                    <td>{{ $module->class }}</td>
                    <td><i class="{{ $module->icone }}"></i></td>
                    <td class="text-center">
                        <a href="{{ route('module.edit', $module) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                        <a href="{{ route('module.destroy', $module) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $module->id }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="logout-form-{{ $module->id }}" action="{{ route('module.destroy', $module) }}" method="POST" style="display: none;">
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