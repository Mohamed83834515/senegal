@extends('dashboard.layouts.dashboard', ['title' => 'Détails de la vente'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Gestion des ventes</a>
                <a href="#" class="breadcrumb-item">Ventes</a>
                <span class="breadcrumb-item active">Détails de la vente</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    <a href="{{ route('vente.index') }}"><i class="icon-arrow-left52 mr-2"></i></a>
                    Client: {{ $vente->partenaire->libelle_ptn }}
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        <li class="list-inline-item">
                            Total vente:
                            <span class="text-success font-weight-bold ml-auto">{{ number_format($vente->montant_cmd, 2, ',', ' ') }} F CFA</span>
                        </li>
                        <li class="list-inline-item">
                            Montant restant:
                            <span class="text-danger font-weight-bold ml-auto">{{ number_format(($vente->montant_cmd-$vente->montant_payer_cmd), 2, ',', ' ') }} F CFA</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                    <li class="nav-item">
                        <a href="#projet-overview" class="nav-link active" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Produits 
                            <span class="badge bg-slate badge-pill ml-2">{{ count($vente->produitCommandes) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Versements
                            <span class="badge bg-slate badge-pill ml-2">{{ count($vente->versements) }}</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="projet-overview">
                
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Produit</th>
                                    <th>Quantité</th>
                                    <th>Montant</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vente->produitCommandes as $produitApp)
                                <tr>
                                    <td>{{ $produitApp->produit->libelle_pro }}</td>
                                    <td>{{ $produitApp->quantite_pcm }}</td>
                                    <td>{{ number_format($produitApp->prix_pcm, 2, ',', ' ') }}</td>
                                    <td>{{ number_format($produitApp->quantite_pcm*$produitApp->prix_pcm, 2, ',', ' ') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="vente-versement">
                
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vente->versements as $versement)
                                <tr>
                                    <td>{{ number_format($versement->montant_ver, 2, ',', ' ') }}</td>
                                    <td>{{ $versement->created_at->format('d/m/Y à H:i:s') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /projet overview -->

        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('vente.ajouterVersement', $vente) }}">
                    @csrf
                    @method('POST')
    
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvelle vente</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
    
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label>Montant du versement</label>
                                <input type="number" name="versement" placeholder="200000" class="form-control" required>
                            </div>
                        </div>
    
                    </div>
    
                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- projet details -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Détails</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                    <a href="{{ route('vente.imprimeFacture', $vente) }}" class="btn btn-danger btn-block mb-2">
                        <i class="icon-printer mr-2"></i> Imprimer
                    </a>

                    @if ($vente->statutCommandes[0]->idsta_stc == 3)
                        <a href="{{ route('vente.livrer', $vente) }}" data-toggle="tooltip" data-placement="top" title="Livrer" class="btn bg-success-400 btn-block mb-2" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','livrer-form-{{ $vente->id_cmd }}');">
                            <span>
                                <i class="icon-alarm mr-1"></i>
                                En attente
                            </span>
                            <span class="icon-arrow-right7 mx-2"></span>
                            <span>
                                <i class="icon-truck mr-1"></i>
                                Livré
                            </span>
                        </a>
                        <form id="livrer-form-{{ $vente->id_cmd }}" action="{{ route('vente.livrer', $vente) }}" method="POST" style="display: none;">
                            @csrf
                            @method('POST')
                        </form>
                    @else
                        <a href="#" class="btn bg-success-400 btn-block mb-2 disabled" >
                            <span>
                                <i class="icon-truck mr-1"></i>
                                Livré
                            </span>
                        </a>
                    @endif

                    <a href="#" class="btn bg-teal-400 btn-block mb-2" data-toggle="modal" data-target="#modal_iconified">Faire un versement</a>
                </div>

                <table class="table table-borderless table-xs border-top-0 my-2">
                    <tbody>
                        <tr>
                            <td class="font-weight-semibold" style="width: 40% !important">Téléphone:</td>
                            <td class="text-right">{{ $vente->partenaire->telephone_ptn }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Livraison le:</td>
                            <td class="text-right">{{ $vente->date_livraison_cmd->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Crée par:</td>
                            <td class="text-right">{{ $vente->user->prenom.' '.$vente->user->nom }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /projet details -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>
<!-- /inner container -->  

@endsection