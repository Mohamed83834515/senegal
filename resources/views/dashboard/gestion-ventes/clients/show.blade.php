@extends('dashboard.layouts.dashboard', ['title' => 'Détails du client'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Gestion des ventes</a>
                <a href="#" class="breadcrumb-item">Clients</a>
                <span class="breadcrumb-item active">Détails du client</span>
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
                    <a href="{{ route('client.index') }}"><i class="icon-arrow-left52 mr-2"></i></a>
                    Client: {{ $client->libelle_ptn }}
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        <li class="list-inline-item">
                            Montant à payer:
                            <span class="text-danger font-weight-bold ml-auto">{{ number_format($commandeNonReglees->avg(function ($item){
                                    return (float)$item['montant_cmd'] - (float)$item['montant_payer_cmd'];
                                }), 2, ',', ' ') }} F CFA</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                    <li class="nav-item">
                        <a href="#projet-overview" class="nav-link active" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Commandes non soldées
                            <span class="badge bg-slate badge-pill ml-2">{{ count($commandeNonReglees) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Commandes soldées
                            <span class="badge bg-slate badge-pill ml-2">{{ count($commandeReglees) }}</span>
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
                                    <th>id</th>
                                    <th>Montant</th>
                                    <th>Montant Restant</th>
                                    <th>Date création</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commandeNonReglees as $commande)
                                <tr>
                                    <td>{{ $commande->numero_cmd }}</td>
                                    <td>{{ number_format($commande->montant_cmd, 2, ',', ' ') }}</td>
                                    <td class="text-danger font-weight-bold">{{ number_format($commande->montant_cmd-$commande->montant_payer_cmd, 2, ',', ' ') }}</td>
                                    <td>{{ $commande->created_at->format('d/m/Y à H:i:s') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('vente.show', $commande) }}" class="icon-eye8 text-brown-800 mr-2" data-toggle="tooltip" data-placement="bottom" title="Visualiser"></a>
                                    </td>
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
                                    <th>id</th>
                                    <th>Montant</th>
                                    <th>Montant Restant</th>
                                    <th>Date création</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commandeReglees as $commande)
                                <tr>
                                    <td>{{ $commande->id_cmd }}</td>
                                    <td>{{ number_format($commande->montant_cmd, 2, ',', ' ') }}</td>
                                    <td class="text-danger font-weight-bold">{{ number_format($commande->montant_cmd-$commande->montant_payer_cmd, 2, ',', ' ') }}</td>
                                    <td>{{ $commande->created_at->format('d/m/Y à H:i:s') }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('vente.show', $commande) }}" class="icon-eye8 text-brown-800 mr-2" data-toggle="tooltip" data-placement="bottom" title="Visualiser"></a>
                                    </td>
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
                <form class="modal-content" method="POST" action="">
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
                    <a href="{{ route('client.imprimeFacture', $client) }}" class="btn btn-danger btn-block mb-2">
                        <i class="icon-printer mr-2"></i> Imprimer
                    </a>
                </div>
                
                <table class="table table-borderless table-xs border-top-0 my-2">
                    <tbody>
                        <tr>
                            <td class="font-weight-semibold" style="width: 40% !important">Téléphone:</td>
                            <td class="text-right">{{ $client->telephone_ptn }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Crée par:</td>
                            <td class="text-right">{{ $client->user->prenom.' '.$client->user->nom }}</td>
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