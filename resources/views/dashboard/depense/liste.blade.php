@extends('dashboard.layouts.dashboard', ['title' => 'Dépenses'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item active">Dépenses</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="{{ route('depense.create') }}" class="breadcrumb-elements-item">
                    <i class="icon-add mr-2"></i>
                    Ajouter une dépense
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic">
        <thead>
            <tr>
                <th>Date de la dépense</th>
                <th>Motif</th>
                <th>Montant</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($depenses as $depense)
                <tr>
                    <td>{{ $depense->date_depense_dep }}</td>
                    <td>{{ $depense->motif_dep }}</td>
                    <td>{{ $depense->montant_dep }}</td>
                    <td>{{ $depense->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        <a href="{{ route('depense.show', $depense) }}" class="icon-eye8 text-brown-800" data-toggle="tooltip" data-placement="bottom" title="Visualiser">
                        </a>

                        <a href="{{ route('depense.edit', $depense) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                        </a>

                        <a href="{{ route('depense.destroy', $depense) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $depense->id }}');">
                        </a>
                        <form id="logout-form-{{ $depense->id }}" action="{{ route('depense.destroy', $depense) }}" method="POST" style="display: none;">
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