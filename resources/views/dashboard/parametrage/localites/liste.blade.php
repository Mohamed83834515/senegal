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

                    Liste des localités
                </h5>

            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">

                    <li class="nav-item">
                        <a href="#region" class="nav-link active" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i>Regions
                            <span class="badge bg-slate badge-pill ml-2">{{ count($regions) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#departement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Departements
                            <span class="badge bg-slate badge-pill ml-2">{{ count($departements) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#prefecture" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Sous-prefectures
                            <span class="badge bg-slate badge-pill ml-2">{{ count($sousPrefectures) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#village" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Localités/Villages
                            <span class="badge bg-slate badge-pill ml-2">{{ count($villages) }}</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="tab-content">

                <div class="tab-pane fade show active" id="region">
                    <div class="breadcrumb justify-content-center">
                        <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                            <i class="icon-add mr-2"></i>
                            Ajouter une région
                        </a>
                    </div>
                        <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                            <thead>
                                <tr>

                                    <th>Code</th>
                                    <th>Région</th>
                                    <th>Abrégé</th>
                                    <th>Couleur</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $region)
                                    <tr>
                                        <td>{{ $region->code_reg }}</td>
                                        <td>{{ $region->nom_reg }}</td>
                                        <td>{{ $region->abrege_reg}}</td>
                                        <td style="background-color: {{$region->couleur_reg}}">{{ $region->couleur_reg}}</td>
                                        <td class="text-center">
                                            <a href="" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                                {{-- <i class="far fa-edit"></i> --}}
                                            </a>
                                            <a href="" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-');">
                                                {{-- <i class="far fa-trash-alt"></i> --}}
                                            </a>
                                            <form id="" action="" method="POST" style="display: none;">
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
                                    <form class="modal-content" method="POST" action="{{ route('region.store') }}">
                                        @csrf
                                        @method('POST')

                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvelle région</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="row mb-2">

                                                <div class="col-md-12 mb-2">
                                                    <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                                    <input type="text" class="form-control" id="code" name="code_reg" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold"></span></label>
                                                    <textarea type="text" class="form-control" name="nom_reg" aria-describedby="definition"></textarea>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <label for="inputEmail4" class="text-black">Abréviation <span class="text-danger text-bold">*</span></label>
                                                    <input type="text" class="form-control" id="code" name="abrege_reg" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                                                </div>



                                                   <div class="col-md-12">
                                                    <label for="inputEmail4" class="text-black">Couleur <span class="text-danger text-bold"></span></label>
                                                    <input type="color" class="form-control" name="couleur_reg" aria-describedby="contact"></textarea>
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
                            <!-- /iconified modal -->


                </div>
                <div class="tab-pane fade" id="departement">

                    <div class="tab-pane fade show active" id="region">
                        <div class="breadcrumb justify-content-center">
                            <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified1">
                                <i class="icon-add mr-2"></i>
                                Ajouter un département
                            </a>
                        </div>
                            <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                                <thead>
                                    <tr>

                                        <th>Code</th>
                                        <th>Région</th>
                                        <th>Départements</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departements as $departement)
                                        <tr>
                                            <td>{{ $departement->code_dep }}</td>
                                            <td>{{ $departement->region->nom_reg }}</td>
                                            <td>{{ $departement->nom_dep}}</td>
                                            <td class="text-center">
                                                <a href="" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                                    {{-- <i class="far fa-edit"></i> --}}
                                                </a>
                                                <a href="" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-');">
                                                    {{-- <i class="far fa-trash-alt"></i> --}}
                                                </a>
                                                <form id="" action="" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                                <!-- Iconified modal -->
                                <div id="modal_iconified1" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form class="modal-content" method="POST" action="{{ route('departement.store') }}">
                                            @csrf
                                            @method('POST')

                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau département</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row mb-2">

                                                    <div class="col-md-12 mb-2">
                                                        <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                                        <input type="text" class="form-control" id="code" name="code_dep" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label>Région</label>
                                                        <select class="form-control select-search" name="idreg_dep" data-fouc aria-describedby="produit" required>
                                                            @foreach ($regions as $region)
                                                                <option
                                                                    value="{{ $region->id_reg }}"
                                                                >{{ $region->nom_reg }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>



                                                       <div class="col-md-12">
                                                        <label for="inputEmail4" class="text-black">Département <span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="nom_dep" aria-describedby="contact"></textarea>
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
                                <!-- /iconified modal -->


                    </div>

                </div>
                <div class="tab-pane fade" id="prefecture">

                    <div class="tab-pane fade show active" id="region">
                        <div class="breadcrumb justify-content-center">
                            <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified2">
                                <i class="icon-add mr-2"></i>
                                Ajouter une sous-préfecture
                            </a>
                        </div>
                            <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                                <thead>
                                    <tr>

                                        <th>Code</th>
                                        <th>Région</th>
                                        <th>Départements</th>
                                        <th>Sous-Préfectures</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sousPrefectures as $prefecture)
                                        <tr>
                                            <td>{{ $prefecture->code_spf }}</td>
                                            <td>{{ $prefecture->departement->region->nom_reg}}</td>
                                            <td>{{ $prefecture->departement->nom_dep}}</td>
                                            <td>{{ $prefecture->nom_spf}}</td>
                                            <td class="text-center">
                                                <a href="" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                                    {{-- <i class="far fa-edit"></i> --}}
                                                </a>
                                                <a href="" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-');">
                                                    {{-- <i class="far fa-trash-alt"></i> --}}
                                                </a>
                                                <form id="" action="" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                                <!-- Iconified modal -->
                                <div id="modal_iconified2" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form class="modal-content" method="POST" action="{{ route('prefecture.store') }}">
                                            @csrf
                                            @method('POST')

                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau département</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row mb-2">

                                                    <div class="col-md-12 mb-2">
                                                        <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                                        <input type="text" class="form-control" id="code" name="code_spf" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label>Département</label>
                                                        <select class="form-control select-search" name="iddep_spf" data-fouc aria-describedby="produit" required>
                                                            @foreach ($departements as $region)
                                                                <option
                                                                    value="{{ $region->id_dep }}"
                                                                >{{ $region->nom_dep }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>



                                                       <div class="col-md-12">
                                                        <label for="inputEmail4" class="text-black">Sous-Préfectures <span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="nom_spf" aria-describedby="contact"></textarea>
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
                                <!-- /iconified modal -->


                    </div>

                </div>
                <div class="tab-pane fade" id="village">

                    <div class="tab-pane fade show active" id="region">
                        <div class="breadcrumb justify-content-center">
                            <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified3">
                                <i class="icon-add mr-2"></i>
                                Ajouter un village
                            </a>
                        </div>
                            <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                                <thead>
                                    <tr>

                                        <th>Code</th>
                                        <th>Région</th>
                                        <th>Départements</th>
                                        <th>Sous-Préfectures</th>
                                        <th>Villages</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($villages as $village)
                                        <tr>
                                            <td>{{ $village->code_vil }}</td>
                                            <td>{{ $village->sousPrefecture->departement->region->nom_reg}}</td>
                                            <td>{{ $village->sousPrefecture->departement->nom_dep}}</td>
                                            <td>{{ $village->sousPrefecture->nom_spf}}</td>
                                            <td>{{ $village->nom_vil}}</td>
                                            <td class="text-center">
                                                <a href="" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                                    {{-- <i class="far fa-edit"></i> --}}
                                                </a>
                                                <a href="" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-');">
                                                    {{-- <i class="far fa-trash-alt"></i> --}}
                                                </a>
                                                <form id="" action="" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                                <!-- Iconified modal -->
                                <div id="modal_iconified3" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form class="modal-content" method="POST" action="{{ route('village.store') }}">
                                            @csrf
                                            @method('POST')

                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau village</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row mb-2">

                                                    <div class="col-md-12 mb-2">
                                                        <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                                        <input type="text" class="form-control" id="code" name="code_vil" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label>Sous-prefectures</label>
                                                        <select class="form-control select-search" name="idspf_vil" data-fouc aria-describedby="produit" required>
                                                            @foreach ($sousPrefectures as $spf)
                                                                <option
                                                                    value="{{ $spf->id_spf }}"
                                                                >{{ $spf->nom_spf }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>



                                                       <div class="col-md-12">
                                                        <label for="inputEmail4" class="text-black">Nom<span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="nom_vil" aria-describedby="contact"></textarea>
                                                    </div>

                                                       <div class="col-md-6">
                                                        <label for="inputEmail4" class="text-black">Longitude<span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="logitude_vil" aria-describedby="contact"></textarea>
                                                    </div>
                                                       <div class="col-md-6">
                                                        <label for="inputEmail4" class="text-black">Longitude<span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="latitude_vil" aria-describedby="contact"></textarea>
                                                    </div>
                                                       <div class="col-md-3">
                                                        <label for="inputEmail4" class="text-black">Homme<span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="homme_vil" aria-describedby="contact"></textarea>
                                                    </div>
                                                       <div class="col-md-3">
                                                        <label for="inputEmail4" class="text-black">Femme<span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="femme_vil" aria-describedby="contact"></textarea>
                                                    </div>
                                                       <div class="col-md-3">
                                                        <label for="inputEmail4" class="text-black">Jeune<span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="jeune_vil" aria-describedby="contact"></textarea>
                                                    </div>
                                                       <div class="col-md-3">
                                                        <label for="inputEmail4" class="text-black">Menage<span class="text-danger text-bold"></span></label>
                                                        <input type="text" class="form-control" name="menage_vil" aria-describedby="contact"></textarea>
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
                                <!-- /iconified modal -->


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



</div>
<!-- /inner container -->

@endsection
