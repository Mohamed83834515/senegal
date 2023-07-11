@extends('dashboard.layouts.dashboard', ['title' => 'Transactions'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Transferts d'argent</span>
                <span class="breadcrumb-item active">Transactions</span>
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
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row" ng-controller="transactions">
    <!-- Left content -->

    <div class="w-100" ng-init="initialiseVariable(
        '{{ request()->query('periode') ?? 'jour' }}',
        '{{ request()->query('structure') ?: "" }}',
        '{{ request()->query('type') ?: "" }}',
        '{{ request()->query('jour') ?: "" }}',
        '{{ request()->query('semaine') ?: "" }}',
        '{{ request()->query('mois') ?: "" }}',
        '{{ request()->query('datedebut') ?: "" }}',
        '{{ request()->query('datefin') ?: "" }}',
        '{{ request()->query('annee') ?: "" }}'
    )">

        <!-- Right content -->
        <div class="flex-fill">
            <!-- Single line -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <h6 class="card-title">Liste des transactions</h6>

                    <div class="header-elements align-items-start">
                        <div class="form-check mr-3">
                            <label class="form-check-label">
                                <input type="radio" name="periode" value="jour" class="form-input-styled" ng-model="search.periode" data-fouc>
                                Jour
                            </label>
                        </div>
                        <div class="form-check mr-3">
                            <label class="form-check-label">
                                <input type="radio" name="periode" value="semaine" class="form-input-styled" ng-model="search.periode" data-fouc>
                                Semaine
                            </label>
                        </div>
                        <div class="form-check mr-3">
                            <label class="form-check-label">
                                <input type="radio" name="periode" value="mois" class="form-input-styled" ng-model="search.periode" data-fouc>
                                Mois
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="periode" value="annee" class="form-input-styled" ng-model="search.periode" data-fouc>
                                Année
                            </label>
                        </div>
                        {{-- <span class="badge bg-primary">@{{ projets.length }} projets</span> --}}
                    </div>
                </div>

                <!-- Action toolbar -->
                <div class="bg-light">
                    <div class="navbar navbar-light bg-light navbar-expand-lg pt-lg-2">
                        <div class="text-center d-lg-none w-100">
                            <button type="button" class="navbar-toggler w-100" data-toggle="collapse" data-target="#inbox-toolbar-toggle-single">
                                <i class="icon-circle-down2"></i>
                            </button>
                        </div>

                        <form 
                            class="navbar-collapse text-center text-lg-left flex-wrap collapse" 
                            id="inbox-toolbar-toggle-single"
                            action="{{ route('transaction.index') }}"
                            method="GET"
                        >
                            @csrf
                            @method('GET')

                            <input type="hidden" name="periode" value="@{{ search.periode }}">

                            <div class="mt-3 mt-lg-0 header-elements-inline ml-auto">
                                @if (!Auth()->user()->structure_id)
                                    <div class="form-group mr-2">
                                        <label>Structure:</label>
                                        <select class="select" name="structure" ng-model="search.structure">
                                            <option value="">Tous</option>
                                            @foreach ($structures as $structure)
                                                <option 
                                                    value="{{ $structure->id_str }}"
                                                    {{ request()->query('structure') == $structure->id_str ? 'selected' : '' }}
                                                >{{ $structure->libelle_str }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="form-group mr-2">
                                    <label>Type :</label>
                                    <select class="select" name="type" ng-model="search.type" aria-describedby="type">
                                        <option value="">Tous</option>
                                        @foreach ($typeParametre->where('code_typ', 'tyt')->first()->parametres as $parametre)
                                            <option 
                                                value="{{ $parametre->id_par }}"
                                                {{ request()->query('type') == $parametre->id_par ? 'selected' : '' }}
                                            >{{ $parametre->libelle_par }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mr-2">
                                    <label>Opérateurs :</label>
                                    <select class="select" name="operateur" ng-model="search.operateur" aria-describedby="operateur">
                                        <option value="">Tous</option>
                                        @foreach ($operateurs as $operateur)
                                            <option 
                                                value="{{ $operateur->id_ope }}"
                                                {{ request()->query('operateur') == $operateur->id_ope ? 'selected' : '' }}
                                            >{{ $operateur->libelle_ope }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group mr-2" ng-if="search.periode == 'jour'">
                                    <label>date du jour:</label>
                                    @php
                                        $date = new DateTime(now());
                                        $day = $date->format('Y-m-d');
                                    @endphp
                                    <input type="date" name="jour" value="{{ request()->query('jour') ?: $day }}" class="form-control">
                                </div>

                                <div class="form-group mr-2" ng-show="search.periode == 'semaine'">
                                    <label>Semaine:</label>
                                    <select class="select" name="semaine" aria-describedby="semaine">
                                        @foreach (get_liste_semaine() as $semaine)
                                            <option 
                                                value="{{ $semaine }}"
                                                @if (request()->query('semaine'))
                                                    {{ request()->query('semaine') == $semaine ? 'selected' : '' }}
                                                @else
                                                    @php
                                                        $date = new DateTime(now());
                                                        $week = $date->format("W");
                                                        $select = ($week == $semaine) ? 'selected' : '';
                                                    @endphp
                                                {{$select}}
                                                @endif

                                            >{{ $semaine }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mr-2" ng-show="search.periode == 'mois'">
                                    <label>Mois:</label>
                                    <select class="select" name="mois" aria-describedby="mois">
                                        @foreach (get_liste_mois() as $mois)
                                            <option 
                                                value="{{ $mois["id"] }}"
                                                @if (request()->query('mois'))
                                                    {{ request()->query('mois') == $mois["id"] ? 'selected' : '' }}
                                                @else
                                                    @php
                                                        $date = new DateTime(now());
                                                        $month = $date->format("m");
                                                        
                                                        $select = ($month == $mois["id"]) ? 'selected' : '';
                                                    @endphp
                                                    {{$select}}
                                                @endif

                                            >{{ $mois["libelle"] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mr-2" ng-show="search.periode == 'semaine' || search.periode == 'mois' || search.periode == 'annee'">
                                    <label>Année:</label>
                                    <select class="select" name="annee" aria-describedby="annee">
                                        @foreach (get_liste_annee() as $annee)
                                            <option 
                                                value="{{ $annee }}" 
                                                @if (request()->query('annee'))
                                                {{ request()->query('annee') == $annee ? 'selected' : '' }}
                                                @else
                                                    @php
                                                        $date = new DateTime(now());
                                                        $an = $date->format("Y");
                                                        $select = ($an == $annee) ? 'selected' : '';
                                                    @endphp
                                                {{$select}}
                                                @endif
                                            >{{ $annee }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @php
                                    $date = Carbon\Carbon::now();
                                    $dateDebut = $date->startOfWeek()->format('Y-m-d');
                                    $dateFin = $date->endOfWeek()->format('Y-m-d');
                                @endphp 
                                <div class="form-group mr-2" ng-if="search.periode == 'semaine'">
                                    <label class="text-small">date début:</label>
                                    <input type="date" name="datedebut" value="{{ request()->query('datedebut') ?: $dateDebut }}" disabled class="form-control">
                                </div>
                                <div class="form-group" ng-if="search.periode == 'semaine'">
                                    <label>date fin:</label>
                                    <input type="date" name="datefin" value="{{ request()->query('datefin') ?: $dateFin }}" disabled class="form-control">
                                </div>

                            </div>

                            <div class="mb-3 mb-lg-0">

                                <div class="btn-group ml-3">
                                    <div class="ml-lg-3 mb-3 mb-lg-0">
                                        <button type="submit" class="btn bg-primary btn-block">
                                            <i class="icon-filter4 mr-2"></i>
                                            Rechercher
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /action toolbar -->


            </div>
            <!-- /single line -->
        </div>
        <!-- /right content -->

        <!-- Horizontal cards -->
        <div class="row overflow-auto">
            @if (count($transactions) > 0)
                <div class="col-md-12">
                    <div class="card">
                        <table class="table table-striped datatable-responsive datatable-header-basic">
                            <thead>
                                <tr>
                                    @if (!Auth()->user()->structure_id)
                                    <th>Agence</th>
                                    @endif
                                    <th>Opérateur</th>
                                    <th>Type</th>
                                    <th>Client</th>
                                    <th>Montant</th>
                                    <th>Commission</th>
                                    <th>Date de création</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        @if (!Auth()->user()->structure_id)
                                        <td>Agence</td>
                                        @endif
                                        <td>{{ $transaction->operateur->libelle_ope }}</td>
                                        <td>{{ $transaction->typeTransaction->libelle_par }}</td>
                                        <td>{{ $transaction->nom_tra.' '.$transaction->numero_destinataire_tra }}</td>
                                        <td>{{ $transaction->montant_tra }}</td>
                                        <td>{{ $transaction->commission_tra }}</td>
                                        <td>{{ $transaction->created_at->format('d/m/Y à H:i:s') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('transaction.edit', $transaction) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                                {{-- <i class="far fa-edit"></i> --}}
                                            </a>
                                        
                                            <a href="{{ route('transaction.destroy', $transaction) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $transaction->id }}');">
                                                {{-- <i class="far fa-trash-alt"></i> --}}
                                            </a>
                                            <form id="logout-form-{{ $transaction->id }}" action="{{ route('transaction.destroy', $transaction) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="alert bg-info text-white alert-styled-left ">
                        {{-- <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> --}}
                        <span class="font-weight-semibold">Désolé! </span> Auccune donnée disponible pour ces critères</a>.
                    </div>
                </div>
            @endif
            
        </div>
        <!-- /horizontal cards -->

    </div>
    <!-- /left content -->

    <!-- Iconified modal -->
    <div id="modal_iconified" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('transaction.store') }}">
                @csrf
                @method('POST')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvelle transaction</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label>Opérateurs :</label>
                            <select class="select" name="operateur" aria-describedby="operateur">
                                @foreach ($operateurs as $operateur)
                                    <option 
                                        value="{{ $operateur->id_ope }}"
                                    >{{ $operateur->libelle_ope }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label>Type :</label>
                            <select class="select" name="type" aria-describedby="type">
                                @foreach ($typeParametre->where('code_typ', 'tyt')->first()->parametres as $parametre)
                                    <option 
                                        value="{{ $parametre->id_par }}"
                                    >{{ $parametre->libelle_par }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label>Nom</label>
                            <input type="text" name="nom" placeholder="Eugene" class="form-control">
                        </div>

                        <div class="col-sm-6">
                            <label>Numéro</label>
                            <input type="text" name="numero" placeholder="Kopyov" data-mask="+225-99-99-99-99-99" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <label>Montant</label>
                            <input type="number" name="montant" placeholder="10000" class="form-control">
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
<!-- /inner container -->
@endsection