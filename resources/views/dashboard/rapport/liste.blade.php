@extends('dashboard.layouts.dashboard', ['title' => 'Rapports'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item active">Rapports</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="{{ route('rapport.create') }}" class="breadcrumb-elements-item">
                    <i class="icon-add mr-2"></i>
                    Ajouter un rapport
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
                <th>Date de la réunion</th>
                <th>Objet</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rapports as $rapport)
                <tr>
                    <td>{{ $rapport->date_reunion_rap }}</td>
                    <td>{{ $rapport->objet_rap }}</td>
                    <td>{{ $rapport->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        <a href="{{ route('rapport.show', $rapport) }}" class="icon-eye8 text-brown-800" data-toggle="tooltip" data-placement="bottom" title="Visualiser">
                        </a>

                        <a href="{{ route('rapport.edit', $rapport) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                        </a>

                        <a href="{{ route('rapport.destroy', $rapport) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $rapport->id }}');">
                        </a>
                        <form id="logout-form-{{ $rapport->id }}" action="{{ route('rapport.destroy', $rapport) }}" method="POST" style="display: none;">
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