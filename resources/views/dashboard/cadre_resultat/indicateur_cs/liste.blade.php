@extends('dashboard.layouts.dashboard', ['title' => 'Indicateur Programme'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Cadre résultat</a>
                <a href="#" class="breadcrumb-item active"> Indicateurs Programmes</a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a  href="#" class="btn bg-teal-400 btn-block mx-3" data-toggle="modal" data-target="#modal_iconified">

                    Ajouter un indicateur du cadre strategique
                </a>
            </div>
        </div>
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
                    Indicateurs Objectif
                </h5>
                <div class="breadcrumb justify-content-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">--Choisissez--
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @foreach ($niveau_cadres as $item)
                            <li><a href="{{ route('indicateur_cs.show', $item->id_ncl ) }}">{{ $item->libelle_ncl }}</a></li>
                            @endforeach
                        </ul>
                      </div>


            </div>
            </div>


            <div class="tab-content">

                <div class="tab-pane fade show active" id="region">


                    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                        <thead>
                       <th>Code</th>
                       <th>Indicateur</th>
                       <th>
                        @foreach ($NiveauCadre as $item)
                        {{ $item->libelle_ncl }}
                     @endforeach
                       </th>
                       <th>Cible</th>
                       <th>Réference</th>
                       <th>Sources de vérification</th>
                       <th>Actions</th>
                        </thead>
                        <tbody>
                            @if (isset($indicateur))
                               @foreach ($indicateur as $indicateur)
                                <tr>
                                    <td>{{ $indicateur->code_iprg }}</td>
                                    <td>{{ $indicateur->intitule_iprg}}</td>
                                    <td>
                                       @php
                                           $cadreParent = $allCadre->where('id_cl','=',$indicateur->niveau_iprg)->first();
                                       @endphp
                                       @if($cadreParent)
                                         {{ $cadreParent->intitule_cl }}


                                       @endif

                                    </td>
                                    <td>{{ $indicateur->valeur_cible_iprg}}</td>
                                    <td>{{ $indicateur->valeur_reference_iprg}}</td>
                                    <td>{{ $indicateur->source_verification_iprg}}</td>

                                    <td class="text-center">
                                        <a href="" class="icon-pencil7 text-info modaledit" id="{{ $indicateur->id_iprg }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">

                                        </a>

                                        <a href="{{ route('indicateur_cs.destroy', $indicateur) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $indicateur->id_iprg }}');">
                                        </a>
                                        <form id="delete-form-{{ $indicateur->id_iprg }}" action="{{ route('indicateur_cs.destroy', $indicateur) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>




                </div>

            </div>
        </div>




    </div>
    <!-- /left content -->
    <div id="modal_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" id="editform" action="" method="POST">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification d'indicateur
                         @foreach ($NiveauCadre as $item)
                        {{ $item->libelle_ncl }}
                     @endforeach </h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-4 mb-2">
                            <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                        </div>

                        <div class="col-md-8">
                            <label for="inputEmail4" class="text-black">Intitulé  <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" name="intitule" id="intitule" aria-describedby="sigle"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">
                                @foreach ($NiveauCadre as $item)
                                {{ $item->libelle_ncl }}
                             @endforeach
                              <span class="text-danger text-bold">*</span></label>

                            <select class="form-control select " name="cadre" id="cadre" data-placeholder="choisissez les types" required>
                               {{-- <option>--Choisissez--</option> --}}
                                @foreach ($intituleCadre as $item)
                                <option data-icon="" value="{{ $item->id_cl }}">
                                    {{ $item->intitule_cl }}
                                </option>

                             @endforeach

                                </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Méthodes de collecte  <span class="text-danger text-bold"></span></label>

                            <select class="form-control select @error('type') is-invalid @enderror" name="initiale_cible[]" aria-describedby="type" data-placeholder="choisissez les types" multiple >

                                <option data-icon="" value="1">Enregistrement</option>
                                <option data-icon="" value="2">Rapportage</option>
                                <option data-icon="" value="3"> observations directes</option>
                                <option data-icon="" value="4">Enquêtes</option>
                                <option data-icon="" value="5">Mission d'audit</option>
                                <option data-icon="" value="6">Mission d'évaluation</option>
                                <option data-icon="" value="7">Enregistrement des bénéficiaires</option>
                                <option data-icon="" value="8">Rapport de formation</option>
                                </select>

                        </div>
                           <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Valeur cible <span class="text-danger text-bold"></span></label>
                            <input type="number" class="form-control" name="valeur_cible" id="valeur_cible" aria-describedby="valeur"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Périodicité de calcul <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " name="mode_calcul" data-placeholder="choisissez les types" >

                                <option data-icon="" value="1">Annuelle</option>
                                <option data-icon="" value="2">Semestrielle</option>
                                <option data-icon="" value="3">Trimestrielle</option>
                                <option data-icon="" value="4">Mensuelle</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Sources des données  <span class="text-danger text-bold"></span></label>

                            <select class="form-control select @error('type') is-invalid @enderror" name="donnees[]" aria-describedby="type" data-placeholder="choisissez les types" multiple>

                                @foreach ($partenaires as $produit)
                                <option
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>

                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Année de réference   <span class="text-danger text-bold"></span></label>

                            <input type="number" class="form-control" name="annee_ref" id="annee_ref" aria-describedby="annee"></textarea>

                        </div>
                           <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Valeur réference <span class="text-danger text-bold"></span></label>
                            <input type="number" class="form-control" name="valeur_ref" id="valeur_ref" aria-describedby="contact"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Niveau de désagregaton <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " name="desagregation" data-placeholder="choisissez les types" >

                                 <option data-icon="" value="1">National</option>
                                 </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Unité de mesure   <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " name="unite_mesure" id="unite_mesure"  data-placeholder="choisissez les types" >


                                @foreach ($unite_mesure as  $value)
                                    <option data-icon="" value="{{$value->id_uti }}">
                                       {{ $value->code_uti }}
                                    </option>
                                @endforeach
                        </select>
                        </div>
                           <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Mode de calcul <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " name="mode_calcul" id="mode_calcul" data-placeholder="choisissez les types" >

                                 <option data-icon="" value="somme">Somme</option>
                                 <option data-icon="" value="moyenne">Moyenne</option>
                                 <option data-icon="" value="ratio">Ratio</option>
                                 </select>
                        </div>
                        <div class="col-md-8">
                            <label for="inputEmail4" class="text-black">Sources vérification </label>
                            <textarea type="text" class="form-control" name="source" id="source" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Moyen de diffusion <span class="text-danger text-bold"></span></label>
                            <select class="form-control select @error('type') is-invalid @enderror" name="diffusion[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                                 <option data-icon="" value="1">Rapport de revue</option>
                                 <option data-icon="" value="2">Autres rapports</option>
                                 </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Responsable du calcul<span class="text-danger text-bold"></span></label>

                             <select class="form-control select @error('type') is-invalid @enderror" name="responsabilite[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                                @foreach ($partenaires as $produit)
                                <option
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Responsable collecte de données<span class="text-danger text-bold"></span></label>

                             <select class="form-control select @error('type') is-invalid @enderror" name="methode_collecte_iprg[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                                @foreach ($partenaires as $produit)
                                <option
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Page d'accueil ?<span class="text-danger text-bold"></span></label>

                            <select class="form-control select " name="page" id="page" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                 <option data-icon="" value="oui">Oui</option>
                                 <option data-icon="" value="non">Non</option>
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
 <!-- Iconified modal -->
 <div id="modal_iconified" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('indicateur_cs.store') }}">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Ajout d'indicateur
                     @foreach ($NiveauCadre as $item)
                    {{ $item->libelle_ncl }}
                 @endforeach </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-md-4 mb-2">
                        <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                    </div>

                    <div class="col-md-8">
                        <label for="inputEmail4" class="text-black">Intitulé  <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" name="intitule" aria-describedby="sigle"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="text-black">

                            @if($cadr)
                                 {{ $cadr->libelle_ncl }}


                            @endif



                          <span class="text-danger text-bold">*</span></label>

                        <select class="form-control select " name="cadre" data-placeholder="choisissez les types" required>
                           {{-- <option>--Choisissez--</option> --}}
                            @foreach ($intituleCadre as $item)
                            <option data-icon="" value="{{ $item->id_cl }}">
                                {{ $item->intitule_cl }}
                            </option>

                         @endforeach

                            </select>
                    </div>
                       <div class="col-md-6">
                        <strong for="inputEmail4" class="text-black label">Méthodes de collecte  <span class="text-danger text-bold"></span></strong>

                        <select class="form-control select @error('type') is-invalid @enderror" name="initiale_cible[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple >

                            <option data-icon="" value="1">Enregistrement</option>
                            <option data-icon="" value="2">Rapportage</option>
                            <option data-icon="" value="3"> observations directes</option>
                            <option data-icon="" value="4">Enquêtes</option>
                            <option data-icon="" value="5">Mission d'audit</option>
                            <option data-icon="" value="6">Mission d'évaluation</option>
                            <option data-icon="" value="7">Enregistrement des bénéficiaires</option>
                            <option data-icon="" value="8">Rapport de formation</option>
                            </select>

                    </div>
                       <div class="col-md-3">
                        <strong for="inputEmail4" class="text-black label">Valeur cible <span class="text-danger text-bold"></span></strong>
                        <input type="number" class="form-control" name="valeur_cible" aria-describedby="valeur"></textarea>
                    </div>
                    <div class="col-md-3">
                        <strong for="inputEmail4" class="text-black label">Périodicité de calcul <span class="text-danger text-bold"></span></strong>
                        <select class="form-control select " name="periodicite" data-placeholder="choisissez les types" >

                            <option data-icon="" value="1">Annuelle</option>
                            <option data-icon="" value="2">Semestrielle</option>
                            <option data-icon="" value="3">Trimestrielle</option>
                            <option data-icon="" value="4">Trimestrielle</option>
                            </select>
                    </div>
                    <div class="col-md-6">
                        <strong for="inputEmail4" class="text-black label">Sources des données  <span class="text-danger text-bold"></span></strong>

                        <select class="form-control select @error('type') is-invalid @enderror" name="donnees[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                            @foreach ($partenaires as $produit)
                            <option
                                value="{{ $produit->id_pat }}"
                            >{{ $produit->sigle_pat }}</option>
                        @endforeach

                            {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                        </select>

                    </div>
                    <div class="col-md-3">
                        <strong for="inputEmail4" class="text-black label">Année de réference   <span class="text-danger text-bold"></span></strong>

                        <input type="number" class="form-control" name="annee_ref" aria-describedby="annee"></textarea>

                    </div>
                       <div class="col-md-3">
                        <strong for="inputEmail4" class="text-black label">Valeur réference <span class="text-danger text-bold"></span></strong>
                        <input type="number" class="form-control" name="valeur_ref" aria-describedby="contact"></textarea>
                    </div>
                    <div class="col-md-4">
                        <strong for="inputEmail4" class="text-black label">Niveau de désagregaton <span class="text-danger text-bold"></span></strong>
                        <select class="form-control select " name="desagregation" data-placeholder="choisissez les types" >

                             <option data-icon="" value="1">National</option>
                             </select>
                    </div>
                    <div class="col-md-4">
                        <strong for="inputEmail4" class="text-black label">Unité de mesure   <span class="text-danger text-bold"></span></strong>
                        <select class="form-control select " name="unite_mesure"  data-placeholder="choisissez les types" >


                            @foreach ($unite_mesure as  $value)
                                <option data-icon="" value="{{$value->id_uti }}">
                                   {{ $value->code_uti }}
                                </option>
                            @endforeach
                    </select>
                    </div>
                       <div class="col-md-4">
                        <strong for="inputEmail4" class="text-black label">Mode de calcul <span class="text-danger text-bold"></span></strong>
                        <select class="form-control select " name="mode_calcul" data-placeholder="choisissez les types" >

                             <option data-icon="" value="somme">Somme</option>
                             <option data-icon="" value="moyenne">Moyenne</option>
                             <option data-icon="" value="ratio">Ratio</option>
                             </select>
                    </div>
                    <div class="col-md-8">
                        <label for="inputEmail4" class="text-black">Sources vérification </label>
                        <textarea type="text" class="form-control" name="source" aria-describedby="definition"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="text-black">Moyen de diffusion <span class="text-danger text-bold"></span></label>
                        <select class="form-control select @error('type') is-invalid @enderror" name="diffusion[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple >

                             <option data-icon="" value="1">Rapport de revue</option>
                             <option data-icon="" value="2">Autres rapports</option>
                             </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Responsable du calcul<span class="text-danger text-bold"></span></label>

                         <select class="form-control select @error('type') is-invalid @enderror" name="responsabilite[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                            @foreach ($partenaires as $produit)
                            <option
                                value="{{ $produit->id_pat }}"
                            >{{ $produit->sigle_pat }}</option>
                        @endforeach

                            {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Responsable collecte de données<span class="text-danger text-bold"></span></label>

                         <select class="form-control select @error('type') is-invalid @enderror" name="methode_collecte_iprg[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                            @foreach ($partenaires as $produit)
                            <option
                                value="{{ $produit->id_pat }}"
                            >{{ $produit->sigle_pat }}</option>
                        @endforeach

                            {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Page d'accueil ?<span class="text-danger text-bold"></span></label>

                        <select class="form-control select " name="page" data-placeholder="choisissez les types" >
                            <option>--Choisissez--</option>
                             <option data-icon="" value="oui">Oui</option>
                             <option data-icon="" value="non">Non</option>
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
<!-- /iconified modal -->

</div>
<!-- /inner container -->
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./indicateur_cs_edit/"
           var lien1="../indicateur_cs_edit/"
           var liena='./indicateur_cs_update/'
           var liena1='../indicateur_cs_update/'
            var statut=$(this).attr("statut");

            if(statut==0)
            {
                var liens=lien
                var liensa=liena
            }
            else{
                var liens=lien1
                var liensa=liena1
            }
            $('#editform').attr('action',liensa+ids)
           $('#modal_edit').modal('show')
           //alert(page)
           $.ajax({

                url:liens+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                 $('#id').val(response.cadre.id_iprg);
                $('#code').val(response.cadre.code_iprg);
                $('#intitule').val(response.cadre.intitule_iprg);
                $('#cadre').val(response.cadre.niveau_iprg);
                $('#initiale_cible').val(response.cadre.intitule_cible_iprg);
                $('#valeur_cible').val(response.cadre.valeur_cible_iprg);
                $('#annee_ref').val(response.cadre.annee_reference_iprg);
                $('#valeur_ref').val(response.cadre.valeur_reference_iprg);
                $('#unite_mesure').val(response.cadre.unite_iprg);
                $('#source').val(response.cadre.source_verification_iprg);
                $('#mode_calcul').val(response.cadre.mode_calcul_iprg);
                $('#page').val(response.cadre.page_iprg);
                 }
                            });

    });

    });
</script>
@endsection
