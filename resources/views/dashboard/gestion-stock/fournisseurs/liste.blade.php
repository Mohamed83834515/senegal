@extends('dashboard.layouts.dashboard', ['title' => 'Fournisseurs'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Gestion de stock</span>
                <span class="breadcrumb-item active">Fournisseurs</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Basic initialization -->
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->libelle_ptn }}</td>
                    <td>{{ $fournisseur->telephone_ptn ?? '...' }}</td>
                    <td>{{ $fournisseur->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        <a href="{{ route('fournisseur.edit', $fournisseur) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                        <a href="{{ route('fournisseur.destroy', $fournisseur) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $fournisseur->id_ptn }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $fournisseur->id_ptn }}" action="{{ route('fournisseur.destroy', $fournisseur) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('fournisseur.store') }}">
                    @csrf
                    @method('POST')
    
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau Fournisseur</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <label>Nom</label>
                                <input type="text" name="nom" placeholder="Ouattara" class="form-control" required>
                            </div>
    
                            <div class="col-sm-6">
                                <label>Téléphone</label>
                                <input type="text" name="telephone" placeholder="+225 00-00-00-00-00" class="form-control">
                            </div>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /iconified modal -->
</div>
<!-- /basic initialization -->
@endsection