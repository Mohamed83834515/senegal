@extends('dashboard.layouts.dashboard', ['title' => 'Détails convention'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Programmation</a>
                <a href="#" class="breadcrumb-item">PTBA</a>
                <span class="breadcrumb-item active">Détails PTBA</span>
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
                    <a href="#" onclick="window.history.back()"><i class="icon-arrow-left52 mr-2"></i></a>
                     <span class="info">PTBA: {{$libelle_ptba}}</span> 
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        {{-- <li class="list-inline-item">
                            Total vente:
                            <span class="text-success font-weight-bold ml-auto">10000000 F CFA</span>
                        </li>
                        <li class="list-inline-item">
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
                            <i class="icon-menu7 mr-2"></i> Tâches
                            <span class="badge bg-slate badge-pill ml-2">{{ count($type_activites) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#indicateur" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Indicateurs
                            <span class="badge bg-slate badge-pill ml-2">{{ count($indicateurs) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#cout" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Coûts
                            <span class="badge bg-slate badge-pill ml-2">{{ count($couts) }}</span>
                        </a>
                    </li>
                    
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="projet-overview">

                    <div class="table-responsive">
                    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                            <thead>
                                <tr>
                                    <th>Tâches</th>
                                    <th>(%)</th> 
                                    <th>Responsable</th>
                                    @for ($i = 0; $i < count($mois); $i++)
                                    <th>{{ $mois[$i] }}</th> 
                                    @endfor
                                    
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($type_activites as $resultat)
                                <tr>
                                <td>   {{ $resultat->intitule_pt }}</td>
                                <td>{{ $resultat->proportion_pt }}</td> 
                                <td>
                                    @if($resultat->user)
                                     {{ $resultat->user->fonction->nom_fnct }}
                                @else 
                                    
                                @endif
                                  </td>
                                 @php
                                    
                                     //dd($resultat->periode_pt)
                                 @endphp
                                @for ($i = 0; $i < count($mois); $i++)
                                <td>
                                   
                            </td>
                                @endfor
                                <td class="text-center">
                                    <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $resultat->id_pt }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                    </a>
                                </td>
                                </tr>
                               @endforeach 
                           
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="indicateur">

                    <div class="table-responsive">
                    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                            <thead>
                                <tr>
                                    <th>Indicateur</th>
                                    <th>Unité</th>
                                    <th>Valeur cible</th>
                                    <th>Résultat lié</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($indicateurs as $resultat)
                                <tr>
                                <td> {{ $resultat->intitule_pi }}</td>
                                <td>{{ $resultat->unite_pi }}</td>
                                <td> {{ $resultat->valeur_cible_pi }}</td>
                                <td>{{ $resultat->indicateur_produit_pi }}</td> 
                                <td class="text-center">
                                    
                                    <a href="#" class="icon-pencil7 text-info modaleditindicateur" id="{{ $resultat->id_pi }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                     </a>
                                     <a href="{{ route('ptba_indicateur.destroy', $resultat) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $resultat->id_pi }}');">
                                    </a>
                                    <form id="delete-form-{{ $resultat->id_pi }}" action="{{ route('ptba_indicateur.destroy', $resultat) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                </tr>
                               @endforeach 
                           
                            
                        
                                {{-- <tr>
                                    <td>{{ $projet->code_prj}}</td>
                                    <td>{{ $projet->sigle_prj}}</td> 
                                </tr> --}}
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="cout">

                    <div class="table-responsive">
                    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                            <thead>
                                <tr>
                                    <th>Bailleurs</th>
                                    <th>Montant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($couts as $resultat)
                                <tr>
                                <td> {{ $resultat->bailleur_pc }}</td>
                                <td>{{ $resultat->montant_pc }}</td>
                                <td class="text-center">
                                    <a href="#" class="icon-pencil7 text-info modaleditcout" id="{{ $resultat->id_pc }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                     </a>
                                     <a href="{{ route('ptba_cout.destroy', $resultat) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $resultat->id_pc }}');">
                                    </a>
                                    <form id="delete-form-{{ $resultat->id_pc }}" action="{{ route('ptba_cout.destroy', $resultat) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                </tr>
                               @endforeach 
                           
                            
                        
                                {{-- <tr>
                                    <td>{{ $projet->code_prj}}</td>
                                    <td>{{ $projet->sigle_prj}}</td> 
                                </tr> --}}
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /projet overview -->
        <div id="modal_edit_cout" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editformcout" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Modification d'un coût</h5> 
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="{{ $id_activite}}" id="type_activite" name="type_activite" aria-describedby="sigle">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Bailleur   <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="bailleur" name="bailleur"  data-placeholder="choisissez les types" >
                                    <option >--Choisir--</option>
        
                                    @foreach ($partenaires as  $value)
                                        <option data-icon="" value="{{$value->id_pat  }}">
                                           {{ $value->definition_pat }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Coût <span class="text-danger text-bold"></span></label>
                            <input type="number" class="form-control" id="couts" name="couts" aria-describedby="valeur"></textarea>
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
        <div id="modal_edit_indicateur" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editformindicateur" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'un indicateur</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="{{ $id_activite}}" id="type_activite" name="type_activite" aria-describedby="sigle">
                            
                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Libellé de l'indicateur  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="intitule" name="intitule"  required></textarea>
                           
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil"  required>
                            </div>

                            
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Unité de mesure   <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="unite" name="unite"  data-placeholder="choisissez les types" >
                                    <option >--Choisir--</option>
        
                                    @foreach ($unite_mesure as  $value)
                                        <option data-icon="" value="{{$value->id_uti }}">
                                           {{ $value->code_uti }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Valeur cible <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="valeur_cible" name="valeur_cible" aria-describedby="valeur"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Indicateurs  @if (session('id_projet'))
                                @php
                                //dd(session('id_programme'));
                                     $programme = $projets->where('id_prj', '=', session('id_projet'))->first();
                                    // dd($programme)
                                @endphp
                             
                             {{ $programme->sigle_prj }}
                                 
                                @endif <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="indicateurpcga" name="indicateurpcga" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                @foreach ($indic as $typ)
                                        
                                <option data-icon="" value="{{$typ->id_iprg}}">
                                   {{ $typ->code_iprg.' '.$typ->intitule_iprg }}
                                </option>
                               
                            @endforeach>
                                 </select>
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
        <div id="modal_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editform" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'un résultat</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Reponsable<span class="text-danger text-bold"></span></label>
                                <select class="form-control" id="responsable" name="responsable" aria-describedby="responsable" ng-init="initialiseSelect()">

                                    @foreach ($responsable as $produit)
                                    <option 
                                        value="{{ $produit->id }}"
                                    >{{ $produit->nom }} {{ $produit->prenom }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Nombre de lot <span class="text-danger text-bold"></span></label>
                                <input type="text" id="lot" name="lot" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label for="inputEmail4" class="text-black">Chronogramme  <span class="text-danger text-bold"></span></label>
                                
                                <select class="form-control select @error('debut') is-invalid @enderror" name="debut[]" aria-describedby="debut" data-placeholder="choisissez les types" data-fouc multiple>
                                    <option data-icon="" value="0"
                                        {{ check_module_selected(old('debut'), 0) ? 'selected' : '' }}>Janvier
                                    </option>
                                    <option data-icon="" value="1"
                                        {{ check_module_selected(old('debut'), 1) ? 'selected' : '' }}>Février
                                    </option>
                                    <option data-icon="" value="2"
                                        {{ check_module_selected(old('debut'), 2) ? 'selected' : '' }}>Mars
                                    </option>
                                    <option data-icon="" value="3"
                                        {{ check_module_selected(old('debut'), 3) ? 'selected' : '' }}>Avril
                                    </option>
                                    <option data-icon="" value="4"
                                        {{ check_module_selected(old('debut'), 4) ? 'selected' : '' }}>Mai
                                    </option>
                                    <option data-icon="" value="5"
                                        {{ check_module_selected(old('debut'), 5) ? 'selected' : '' }}>Juin
                                    </option>
                                    <option data-icon="" value="6"
                                        {{ check_module_selected(old('debut'), 6) ? 'selected' : '' }}>Juillet
                                    </option>
                                    <option data-icon="" value="7"
                                        {{ check_module_selected(old('debut'), 7) ? 'selected' : '' }}>Août
                                    </option>
                                    <option data-icon="" value="8"
                                        {{ check_module_selected(old('debut'), 8) ? 'selected' : '' }}>Septembre
                                    </option>
                                    <option data-icon="" value="9"
                                        {{ check_module_selected(old('debut'), 9) ? 'selected' : '' }}>Octobre
                                    </option>
                                    <option data-icon="" value="10"
                                        {{ check_module_selected(old('debut'), 10) ? 'selected' : '' }}>Novembre
                                    </option>
                                    <option data-icon="" value="11"
                                        {{ check_module_selected(old('debut'), 11) ? 'selected' : '' }}>Décembre
                                    </option>

                                </select>
                             </div>
                            
                                <input type="hidden" class="form-control" value="" name="convention" aria-describedby="sigle">
                            
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date début   <span class="text-danger text-bold"></span></label>
                                <input type="date" class="form-control" id="date_debut"  name="date_debut" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date fin  <span class="text-danger text-bold"></span></label>
                                <input type="date" class="form-control" id="date_fin" name="date_fin" aria-describedby="definition">
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
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('convention_resultat.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'un résultat</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="" name="convention" aria-describedby="sigle">
                            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Intitulé  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="intitule" aria-describedby="definition">
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
        <div id="modal_idicateur" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('ptba_indicateur.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'un indicateur</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="{{ $id_activite}}" id="type_activite" name="type_activite" aria-describedby="sigle">
                            
                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Libellé de l'indicateur  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="intitule" name="intitule"  required></textarea>
                           
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil"  required>
                            </div>

                            
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Unité de mesure   <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="unite" name="unite"  data-placeholder="choisissez les types" >
                                    <option >--Choisir--</option>
        
                                    @foreach ($unite_mesure as  $value)
                                        <option data-icon="" value="{{$value->id_uti }}">
                                           {{ $value->code_uti }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Valeur cible <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="valeur_cible" name="valeur_cible" aria-describedby="valeur"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Indicateurs @if (session('id_projet'))
                                @php
                                //dd(session('id_programme'));
                                     $programme = $projets->where('id_prj', '=', session('id_projet'))->first();
                                    // dd($programme)
                                @endphp
                             
                             {{ $programme->sigle_prj }}
                                 
                                @endif <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="indicateurpcga" name="indicateurpcga" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                @foreach ($indic as $typ)
                                        
                                <option data-icon="" value="{{$typ->id_iprg}}">
                                   {{ $typ->code_iprg.' '.$typ->intitule_iprg }}
                                </option>
                               
                            @endforeach>
                                 </select>
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
        <div id="modal_cout" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('ptba_cout.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'un coût</h5>    <a ng-click="ajouterProduit()" class="pointer-event"><i class="icon-add mr-2"></i></a>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="{{ $id_activite}}" id="type_activite" name="type_activite" aria-describedby="sigle">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Bailleur   <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="bailleur" name="bailleur"  data-placeholder="choisissez les types" >
                                    <option >--Choisir--</option>
        
                                    @foreach ($partenaires as  $value)
                                        <option data-icon="" value="{{$value->id_pat  }}">
                                           {{ $value->definition_pat }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Coût <span class="text-danger text-bold"></span></label>
                            <input type="number" class="form-control" id="couts" name="couts" aria-describedby="valeur"></textarea>
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
                    <span class="text-uppercase font-size-sm font-weight-semibold">PTBA</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                     
                    {{-- <a href="#" class="btn btn-warning btn-block mb-2" data-toggle="modal" data-target="#modal_iconified">
                        <i class="icon-user mr-2"></i> Ajouter une Tâche
                    </a> --}}
                        <form id="livrer-form-1" action="" method="POST" style="display: none;">
                            @csrf
                            @method('POST')
                        </form>
                        <a href="#" class="btn bg-teal-400 btn-block mb-2" data-toggle="modal" data-target="#modal_idicateur">
                            Ajouter un indicateur
                        </a>
                        <a href="#" class="btn bg-success-400 btn-block mb-2 " data-toggle="modal" data-target="#modal_cout" >
                            <span>
                                <i class="icon-truck mr-1"></i>
                                Ajouter coût
                             </span>
                        </a>


                   
                </div>
                
                 
            </div>
            <!-- /projet details -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>
<!-- /inner container -->
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../ptba_tache_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../ptba_tache_planification_update/'
          // var liena1='../type_tache_update/'
            var statut=$(this).attr("statut");
            
            /* if(statut==0)
            {
                var liens=lien
                var liensa=liena
            }
            else{
                var liens=lien1
                var liensa=liena1
            } */
            $('#editform').attr('action',liena+ids)
           $('#modal_edit').modal('show')
           //alert(page)
           $.ajax({
       
                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                 $('#id').val(response.tache.id_pt);
                $('#responsable').val(response.tache.responsable_pt);
                $('#lot').val(response.tache.lot_pt);
                $('#debut').val(response.tache.periode_pt);
                $('#date_debut').val(response.tache.date_debut_pt);
                $('#date_fin').val(response.tache.date_fin_pt);
                 }
                            });
                            
    });

    $(document).on('click','.modaleditindicateur',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../ptba_indicateur_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../ptba_indicateur_update/'
          // var liena1='../type_tache_update/'
            var statut=$(this).attr("statut");
            
            /* if(statut==0)
            {
                var liens=lien
                var liensa=liena
            }
            else{
                var liens=lien1
                var liensa=liena1
            } */
            $('#editformindicateur').attr('action',liena+ids)
           $('#modal_edit_indicateur').modal('show')
           //alert(page)
           $.ajax({
       
                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                 $('#id').val(response.tache.id_pi);
                $('#code').val(response.tache.code_pi);
                $('#type_activite').val(response.tache.activite_ptba_pi);
                $('#indicateurpcga').val(response.tache.indicateur_produit_pi);
                $('#intitule').val(response.tache.intitule_pi);
                $('#unite').val(response.tache.unite_pi);
                $('#valeur_cible').val(response.tache.valeur_cible_pi);
                 }
                            });
                            
    });
    $(document).on('click','.modaleditcout',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../ptba_cout_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../ptba_cout_update/'
          // var liena1='../type_tache_update/'
            var statut=$(this).attr("statut");
            
            /* if(statut==0)
            {
                var liens=lien
                var liensa=liena
            }
            else{
                var liens=lien1
                var liensa=liena1
            } */
            $('#editformcout').attr('action',liena+ids)
           $('#modal_edit_cout').modal('show')
           //alert(page)
           $.ajax({
       
                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                $('#bailleur').val(response.taches.bailleur_pc);
                $('#couts').val(response.taches.montant_pc);
                 }
                            });
                            
    });

    });
</script>
@endsection
