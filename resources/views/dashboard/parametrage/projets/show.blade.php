@extends('dashboard.layouts.dashboard', ['title' => 'Détails projet'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Paramétrages</a>
                <a href="#" class="breadcrumb-item">Projets</a>
                <span class="breadcrumb-item active">Détails projet</span>
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
                    <a href="" onclick="window.history.back()"><i class="icon-arrow-left52 mr-2"></i></a>
                    {{ $projet->code_prj}}: <span class="info">{{ $projet->intitule_prj}}</span>
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        {{-- <li class="list-inline-item">
                            Coût du projet:
                            <span class="text-success font-weight-bold ml-auto">10000000 F CFA</span>
                        </li> --}}
                        {{-- <li class="list-inline-item">
                            Montant restant:
                            <span class="text-danger font-weight-bold ml-auto">10000000 F CFA</span>
                        </li> --}}
                    </ul>
                </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                    <li class="nav-item">
                        <a href="#projet-overview" class="nav-link active" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Financement
                            {{-- <span class="badge bg-slate badge-pill ml-2">
                                </span> --}}

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Direction
                            {{-- <span class="badge bg-slate badge-pill ml-2">

                            </span> --}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#user-overview" class="nav-link " data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Personnes dédiées
                            <span class="badge bg-slate badge-pill ml-2"></span>
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
                                    <th>Code</th>
                                    <th>Libelle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    {{-- @if($projet->financement_prj)

                                    @else

                                    @endif
                                @foreach ($projet->financement_prj as $pat)
                            @php


                                $parte = $partenaires->where('id_pat', '=', $pat)->first();

                            @endphp
                            @if($parte)
                                <td> {{ $parte->code_pat }}</td>
                            <td>{{  $parte->sigle_tpt }}</td>
                            @endif

                            </tr>
                        @endforeach --}}
                                {{-- <tr>
                                    <td>{{ $projet->code_prj}}</td>
                                    <td>{{ $projet->sigle_prj}}</td>
                                </tr> --}}

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="vente-versement">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Sigle</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($projet->direction_lead_prj)
                                   <tr>
                                    @foreach ($projet->direction_lead_prj as $pat)
                                @php


                                    $parte = $partenaires->where('id_tpt', '=', $pat)->first();

                                @endphp
                                @if($parte)
                                <td> {{ $parte->code_tpt }}</td>
                                <td>{{  $parte->nom_tpt }}</td>
                                @endif

                                </tr>
                            @endforeach
                                @endif --}}

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="user-overview">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                </tr>
                            </thead>
                            <tbody>



                                   <tr>
                                    @foreach ($users as $pat)


                                    @php
                                        $type = $utilisateurs->where('id', '=', $pat->iduser_pru)->first();

                                    @endphp
                                @if($type)
                                <td> {{ $type->nom }}</td>
                                <td>{{  $type->prenom }}</td>
                                @endif

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
                <form class="modal-content" method="POST" action="{{ route('projet_user.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Personnels dédiés au projet</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            <label for="inputEmail4" class="text-black">Personnes dédiée <span class="text-danger text-bold"></span></label>
                            {{-- data-fouc --}}
                            <select class="form-control select52 @error('type') is-invalid @enderror" name="user[]" aria-describedby="type" data-placeholder="choisissez les types"  multiple>
                                    @foreach ($utilisateurs as $type)
                                        <option data-icon="" value="{{$type->id}}"
                                            {{ check_module_selected(old('type'), $type->id) ? 'selected' : '' }}>
                                            {{ $type->nom }}  {{ $type->nom }}
                                        </option>

                                    @endforeach
                                </select>
                                <input type="hidden" name="projet" value="{{ $projet->id_prj }}">
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

                    <a href="" class="btn btn-warningg btn-block mb-2" data-toggle="modal" data-target="#modal_iconified">
                        <i class="icon-user mr-2"></i> Ajouter personnes dédiées
                    </a>



                        {{-- <a href="" data-toggle="tooltip" data-placement="top" title="Livrer" class="btn bg-success-400 btn-block mb-2" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','livrer-form-1');">
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
                        <form id="livrer-form-1" action="" method="POST" style="display: none;">
                            @csrf
                            @method('POST')
                        </form>

                        <a href="#" class="btn bg-success-400 btn-block mb-2 disabled" >
                            <span>
                                <i class="icon-truck mr-1"></i>
                                Livré
                            </span>
                        </a> --}}


                    {{-- <a href="#" class="btn bg-teal-400 btn-block mb-2" data-toggle="modal" data-target="#modal_iconified">Faire un versement</a> --}}
                </div>

                <table class="table table-borderless table-xs border-top-0 my-2">
                    <tbody>
                        <tr>

                            <td class="text-right">

                            </td>
                        </tr>
                        <div class="text-center">
                            <span>Objectif:</span>
                            <p>{{ $projet->couverture_prj}}</p>
                          </div>
                        {{-- <tr>
                            <td class="text-center">Objectifs:{{ $projet->couverture_prj}}</td>

                        </tr> --}}
                        <tr>
                            <td class="font-weight-semibold">Programme:</td>
                            <td class="text-right">{{ $projet->programme->sigle_prg}}</td>
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
<script>
    $('.select52').select2({
         dropdownParent:  $('#modal_iconified'),
         placeholder: 'Choissisez',
         });
</script>
@section('script')

{{-- <script src="{{asset("/assets/js/forms-selects.js")}}"></script> --}}
<script src="{{asset("/assets/vendor/libs/select2/select2.js")}}"></script>
@endsection
@endsection
