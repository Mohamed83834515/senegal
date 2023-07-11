@extends('dashboard.layouts.dashboard', ['title' => 'Approvisionnements'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Gestion de stock</span>
                <span class="breadcrumb-item active">Approvisionnements</span>
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
<div class="card" ng-controller="approvisionnement">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>
                <th>Fournisseur</th>
                <th>Montant</th>
                <th>Date de livraison</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvisionnements as $approvisionnement)
                <tr>
                    <td>{{ $approvisionnement->partenaire->libelle_ptn.' - '.$approvisionnement->partenaire->telephone_ptn }}</td>
                    <td>{{ number_format($approvisionnement->montant_apv, 2, ',', ' ') }}</td>
                    <td>{{ $approvisionnement->date_livraison_apv->format('d/m/Y') }}</td>
                    <td>{{ $approvisionnement->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        <a href="{{ route('approvisionnement.show', $approvisionnement) }}" class="icon-eye8 text-brown-800 mr-2" data-toggle="tooltip" data-placement="bottom" title="Modifier"></a>
                        {{-- <a href="{{ route('approvisionnement.edit', $approvisionnement) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier"></a> --}}

                        <a href="{{ route('approvisionnement.destroy', $approvisionnement) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $approvisionnement->id_apv }}');"></a>
                        <form id="delete-form-{{ $approvisionnement->id_apv }}" action="{{ route('approvisionnement.destroy', $approvisionnement) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Iconified modal -->
    <div id="modal_iconified" class="modal fade">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('approvisionnement.store') }}">
                @csrf
                @method('POST')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvel Approvisionnement</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label>Fournisseur</label>
                            <select class="form-control select-search" name="fournisseur" data-fouc aria-describedby="produit" required>
                                @foreach ($fournisseurs as $fournisseur)
                                    <option 
                                        value="{{ $fournisseur->id_ptn }}"
                                    >{{ $fournisseur->libelle_ptn }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-sm-6">
                            <label>Date de reception prévue</label>
                            <input type="date" name="date_reception"  class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12 flex justify-content-between align-items-center">
                            <span>Produits</span>
                            <a ng-click="ajouterProduit()" class="pointer-event"><i class="icon-add mr-2"></i></a>
                        </div>
                    </div>

                    <div class="row mb-2" ng-repeat="produit in produits">
                        <div class="col-md-6">
                            <label>Produit :</label>
                            <select class="select2-angularjs" name="produit[]" aria-describedby="produit" ng-init="initialiseSelect()">
                                @foreach ($produits as $produit)
                                    <option 
                                        value="{{ $produit->id_pro }}"
                                    >{{ $produit->libelle_pro }}</option>
                                @endforeach
                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label>Quantité</label>
                            <input type="number" name="quantite[]"  class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label>Prix</label>
                            <input type="number" name="prix[]"  class="form-control" required>
                        </div>
                        <div class="col-md-1 pt-4">
                            <a ng-click="retirerProduit(produit)" class="pointer-event text-danger"><i class="icon-trash mr-2"></i></a>
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