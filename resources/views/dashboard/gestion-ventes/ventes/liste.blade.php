@extends('dashboard.layouts.dashboard', ['title' => 'Ventes'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Gestion des ventes</span>
                <span class="breadcrumb-item active">Ventes</span>
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
<div class="card" ng-controller="vente">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>
                <th>N°</th>
                <th>Client</th>
                <th>Total</th>
                <th>Versement</th>
                <th>Reste à payer</th>
                <th>Date de livraison</th>
                <th>Date création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventes as $vente)
                <tr>
                    <td>
                        <p>

                            {{ $vente->numero_cmd }} 
                            @if ($vente->statutCommandes[0]->statut->code_par == "tys_attente")
                                <span class="text-warning-700">
                                    <i class="icon-alarm ml-1" data-toggle="tooltip" data-placement="bottom" title="En attente"></i>
                                </span>
                            @else
                                <span class="text-success-700">
                                    <i class="icon-truck ml-1" data-toggle="tooltip" data-placement="bottom" title="Livré"></i>
                                </span>
                            @endif
                        </p>
                    </td>
                    <td>{{ $vente->partenaire->libelle_ptn.' - '.$vente->partenaire->telephone_ptn }}</td>
                    <td>{{ number_format($vente->montant_cmd, 2, ',', ' ') }}</td>
                    <td>{{ number_format($vente->montant_payer_cmd, 2, ',', ' ') }}</td>
                    <td class="text-danger font-weight-bold">{{ number_format(($vente->montant_cmd-$vente->montant_payer_cmd), 2, ',', ' ') }}</td>
                    <td>{{ $vente->date_livraison_cmd->format('d/m/Y') }}</td>
                    <td>{{ $vente->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        <a href="{{ route('vente.show', $vente) }}" class="icon-eye8 text-brown-800 mr-3" data-toggle="tooltip" data-placement="bottom" title="Modifier"></a>
                        {{-- <a href="{{ route('vente.edit', $vente) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier"></a> --}}

                        <a href="{{ route('vente.destroy', $vente) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $vente->id_cmd }}');"></a>
                        <form id="delete-form-{{ $vente->id_cmd }}" action="{{ route('vente.destroy', $vente) }}" method="POST" style="display: none;">
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
            <form class="modal-content" method="POST" action="{{ route('vente.store') }}">
                @csrf
                @method('POST')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvelle vente</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row mb-2  align-items-start">
                        <span class="mr-3">Le client existe déjà ?</span>
                        <div class="form-check mr-3">
                            <label class="form-check-label">
                                <input type="radio" name="existe" value="true" class="form-input-styled" ng-model="existe" data-fouc>
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="existe" value="false" class="form-input-styled" ng-model="existe" data-fouc>
                                Non
                            </label>
                        </div>
                    </div>
                                        
                    <div class="row mb-2" ng-if="existe == 'true'">
                        <div class="col-sm-12">
                            <label>Client</label>
                            <select class="form-control select2-search-angularjs" name="client" aria-describedby="produit" ng-init="initialiseSelectSearch()" required>
                                @foreach ($clients as $client)
                                    <option 
                                        value="{{ $client->id_ptn }}"
                                    >{{ $client->libelle_ptn }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="row mb-2" ng-if="existe == 'false'">
                        <div class="col-sm-6">
                            <label>Nom</label>
                            <input type="text" name="nom" placeholder="Ouattara" class="form-control" required>
                        </div>

                        <div class="col-sm-6">
                            <label>Téléphone</label>
                            <input type="text" name="telephone" placeholder="+225 00-00-00-00-00" data-mask="+225-99-99-99-99-99" class="form-control">
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <label>Date de livraison prévue</label>
                            <input type="date" name="date_livraison" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12 flex justify-content-between align-items-center">
                            <span>Produits</span>
                            <a ng-click="ajouterProduit()" class="pointer-event"><i class="icon-add mr-2"></i></a>
                        </div>
                    </div>

                    <div class="row mb-3" ng-repeat="produit in produits">
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
                        <div class="col-md-1 pt-4" ng-if="produits.length > 1">
                            <a ng-click="retirerProduit(produit)" class="pointer-event text-danger"><i class="icon-trash mr-2"></i></a>
                        </div>
                    </div>

                    <div class="row mb-2  align-items-start">
                        <span class="mr-3">Le client a payer ?</span>
                        <div class="form-check mr-3">
                            <label class="form-check-label">
                                <input type="radio" name="aPayer" value="true" class="form-input-styled" ng-model="aPayer" data-fouc>
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="aPayer" value="false" class="form-input-styled" ng-model="aPayer" data-fouc>
                                Non
                            </label>
                        </div>
                    </div>

                    <div class="row mb-2" ng-if="aPayer == 'true'">
                        <div class="col-md-12">
                            <label>Montant du versement</label>
                            <input type="number" name="versement" placeholder="200000" class="form-control" required>
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