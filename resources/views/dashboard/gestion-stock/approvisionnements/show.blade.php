@extends('dashboard.layouts.dashboard', ['title' => 'Détails de l\'approvisionnement'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Gestion de stock</a>
                <a href="#" class="breadcrumb-item">Approvisionnements</a>
                <span class="breadcrumb-item active">Détails de l'approvisionnement</span>
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
                    <a href="{{ route('approvisionnement.index') }}"><i class="icon-arrow-left52 mr-2"></i></a>
                    Fournisseurs: {{ $approvisionnement->partenaire->libelle_ptn }}
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        <li class="list-inline-item">
                            {{-- <i class="icon-target2 mr-2"></i>  --}}
                            <span class="text-success ml-auto">{{ number_format($approvisionnement->montant_apv, 2, ',', ' ') }} F CFA</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                    <li class="nav-item">
                        <a href="#projet-overview" class="nav-link active" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Produits
                            <span class="badge bg-slate badge-pill ml-2">{{ count($approvisionnement->produitApprovisionnes) }}</span>
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
                                @foreach ($approvisionnement->produitApprovisionnes as $produitApp)
                                <tr>
                                    <td>{{ $produitApp->produit->libelle_pro }}</td>
                                    <td>{{ $produitApp->quantite_pap }}</td>
                                    <td>{{ $produitApp->prix_pap }}</td>
                                    <td>{{ number_format($produitApp->quantite_pap*$produitApp->prix_pap, 2, ',', ' ') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /projet overview -->

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

                {{-- <div class="card-body pb-0">
                    <a href="#" class="btn bg-teal-400 btn-block mb-2">Investir</a>
                </div> --}}

                <table class="table table-borderless table-xs border-top-0 my-2">
                    <tbody>
                        <tr>
                            <td class="font-weight-semibold" style="width: 40% !important">Téléphone:</td>
                            <td class="text-right">{{ $approvisionnement->partenaire->telephone_ptn }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Reception le:</td>
                            <td class="text-right">{{ $approvisionnement->date_livraison_apv->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Crée par:</td>
                            <td class="text-right">{{ $approvisionnement->user->prenom.' '.$approvisionnement->user->nom }}</td>
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