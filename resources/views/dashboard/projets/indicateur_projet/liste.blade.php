@extends('dashboard.layouts.dashboard', ['title' => 'Détails de la vente'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Cadre résultat</a>
                <a href="#" class="breadcrumb-item active"> Indicateurs Projet</a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        @if (session('id_projet'))
            <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-1 mt-1 mr-2 mx-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter un indicateur du cadre résultat
                </a>
            </div>
        </div>
        @endif
        
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Inner container -->
<div  class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    Indicateurs projet 
                </h5>
                @if (session('id_projet'))
                  <div class="breadcrumb justify-content-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">--Choisissez--
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @foreach ($niveau_cadres as $item)
                            <li><a href="{{ route('indicateur_projet.show', $item->id_ncrp ) }}">{{ $item->libelle_ncrp }}</a></li>
                            @endforeach
                        </ul>
                      </div>
                
       
            </div>  
                @endif
                
            </div>


            <div class="tab-content">

                <div class="tab-pane fade show active" id="region">
                 
                    @if (session('id_projet'))
                        <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                        <thead>
                       <th>Code</th>
                       <th>Indicateur</th>
                       <th>
                        @foreach ($NiveauCadre as $item)
                        {{ $item->libelle_ncrp }}
                     @endforeach
                       </th>
                       <th>Réference</th>
                       <th>Cible</th>
                       <th>Source</th>
                       <th>Valeur cible</th>
                       <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($indicateur as $indicateur)
                                <tr>
                                    <td>{{ $indicateur->code_iprj }}</td>
                                    <td>{{ $indicateur->intitule_iprj}}</td>
                                    <td>{{ $indicateur->intitule_crp}}</td>
                                    <td>{{ $indicateur->intitule_reference_iprj}}</td>
                                    <td>{{ $indicateur->intitule_cible_iprj}}</td>
                                    <td>{{ $indicateur->source_verification_iprj}}</td>
                                    <td>{{ $indicateur->valeur_cible_rmp_iprj}}</td>
                                    <td class="text-center">
                                        <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $indicateur->id_iprj }}" statut="{{ $statut }}"  data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        
                                        </a>
                                        <a href="{{ route('indicateur_projet.destroy', $indicateur) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $indicateur->id_iprj }}');">
                                        </a>
                                        <form id="delete-form-{{ $indicateur->id_iprj }}" action="{{ route('indicateur_projet.destroy', $indicateur) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                       <div class="alert alert-danger" >
                       Veuillez choisir un projet
                      </div> 
                    @endif
                    


                    

                </div>

            </div>
        </div>
      
      
      

    </div>
    <div id="modal_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" id="editform" action="" method="POST">
                        
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                
                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification d'indicateur 
                         @foreach ($NiveauCadre as $item)
                        {{ $item->libelle_ncrp }}
                     @endforeach </h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
    
                <div class="modal-body">
    
                    <div class="row mb-2">
    
                        <div class="col-md-4 mb-2">
                            <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control"    name="code" id="code"  required>
                        </div>
    
                        <div class="col-md-8">
                            <label for="inputEmail4" class="text-black">Intitulé   <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="intitule" name="intitule" aria-describedby="sigle"></textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black"> 
                                @foreach ($NiveauCadre as $item)
                                {{ $item->libelle_ncrp }}
                             @endforeach 
                              <span class="text-danger text-bold"></span></label>
                                
                            <select class="form-control select " id="cadre_resultat" name="cadre_resultat" data-placeholder="choisissez les types" >
                               <option>--Choisissez--</option>
                                @foreach ($intituleCadre as $item)
                                <option data-icon="" value="{{ $item->id_crp }}">
                                    {{ $item->intitule_crp }}
                                </option>
                             @endforeach
                                </select>
                        </div>
                           <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Intitulé de la valeur de réference    <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="initiale_valeur_ref" name="initiale_valeur_ref" aria-describedby="cible"></textarea>
                        </div>
                           <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Année réference <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="annee_ref" name="annee_ref" aria-describedby="valeur"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Valeur réference  <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="valeur_ref" name="valeur_ref" aria-describedby="annee"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Intitulé de la valeur cible   <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control"  name="initiale_valeur_cible" id="initiale_valeur_cible" ></textarea>
                        </div>
                           <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Valeur cible <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="valeur_cible" name="valeur_cible" aria-describedby="valeur"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Unité de mesure   <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="unite_mesure" name="unite_mesure"  data-placeholder="choisissez les types" >
                                <option >--Choisir--</option>
    
                                @foreach ($unite_mesure as  $value)
                                    <option data-icon="" value="{{$value->id_uti }}">
                                       {{ $value->code_uti }}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Echelle   <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="echele" name="echele"  data-placeholder="choisissez les types" >
                                <option  >--Choisir--</option>
                                <option  value="nationnale">Nationnale</option>
                                <option  value="regionnale">Régionnale</option>
                        </select>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Cible par année <span class="text-danger text-bold"></span></label>
                            <input type="number" class="form-control" id="cible_annee" name="cible_annee" aria-describedby="valeur"></textarea>
                        </div>
                        <div class="col-md-3">
                            <label for="inputEmail4" class="text-black">Cible révue <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="cible_revue" name="cible_revue" aria-describedby="valeur"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Sources véficationt </label>
                            <textarea type="text" class="form-control" id="source" name="source" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Indicateurs @if (session('id_projet'))
                                @php
                                //dd(session('id_programme'));
                                     $programme = session('projetuser')->where('id_prj', '=', session('id_projet'))->first();
                                    // dd($programme)
                                @endphp
                             
                             {{ $programme->sigle_prj }}
                                 
                                @endif
                                 <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="indicateurpcga" name="indicateurpcga" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                @foreach ($indic as $typ)
                                        
                                <option data-icon="" value="{{$typ->id_iprg}}">
                                   {{ $typ->code_iprg.' '.$typ->intitule_iprg }}
                                </option>
                               
                            @endforeach>
                                 </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Catégorie d'indicateur <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="categorie" name="categorie" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                 <option data-icon="" value="1">Catégorie</option>
                                 <option data-icon="" value="2">Catégorie</option>
                                 </select>
                        </div>
                           <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Mode de suivi <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="mode_suivi" name="mode_suivi" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                 <option data-icon="" value="direct">Direct</option>
                                 <option data-icon="" value="fiche">Fiche</option>
                                 <option data-icon="" value="ptba">PTBA</option>
                                 </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Mode de calcul <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " id="mode_calcul" name="mode_calcul" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                 <option data-icon="" value="somme">Somme</option>
                                 <option data-icon="" value="moyenne">Moyenne</option>
                                 <option data-icon="" value="repport">Repport</option>
                                 </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Accueil ?<span class="text-danger text-bold"></span></label>
    
                            <select class="form-control select " id="page" name="page" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                 <option data-icon="" value="oui">Oui</option>
                                 <option data-icon="" value="non">Non</option>
                                 </select>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Responsables de la collecte </label>
                            <input type="text" class="form-control" id="responsable" name="responsable" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Fournisseurs </label>
                            <input type="text" class="form-control" id="fournisseur" name="fournisseur" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-4">
                            <label for="inputEmail4" class="text-black">Périodicité<span class="text-danger text-bold"></span></label>
    
                            <select class="form-control select " id="periodicite" name="periodicite" data-placeholder="choisissez les types" >
                                <option>--Choisissez--</option>
                                 <option data-icon="" value="semestrielle">Semestrielle</option>
                                 <option data-icon="" value="annuelle">Annuelle</option>
                                 <option data-icon="" value="fin">Fin du projet</option>
                                 </select>
                        </div>
                       
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                    <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
                </div>
            </form>
        </div>
    </div>
 <!-- Iconified modal -->
 <div id="modal_iconified" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('indicateur_projet.store') }}">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Ajout d'indicateur 
                     @foreach ($NiveauCadre as $item)
                    {{ $item->libelle_ncrp }}
                 @endforeach </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-md-4 mb-2">
                        <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" id="code"   name="code" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                    </div>

                    <div class="col-md-8">
                        <label for="inputEmail4" class="text-black">Intitulé   <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" id="intitule" name="intitule" aria-describedby="sigle"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="text-black"> 
                            @foreach ($NiveauCadre as $item)
                            {{ $item->libelle_ncrp }}
                         @endforeach 
                          <span class="text-danger text-bold"></span></label>

                        <select class="form-control select " id="cadre_resultat" name="cadre_resultat" data-placeholder="choisissez les types" >
                           <option>--Choisissez--</option>
                            @foreach ($intituleCadre as $item)
                            <option data-icon="" value="{{ $item->id_crp }}">
                                {{ $item->intitule_crp }}
                            </option>
                         @endforeach
                            </select>
                    </div>
                       <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Intitulé de la valeur de réference    <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" id="initiale_valeur_ref" name="initiale_valeur_ref" aria-describedby="cible"></textarea>
                    </div>
                       <div class="col-md-3">
                        <label for="inputEmail4" class="text-black">Année réference <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" id="annee_ref" name="annee_ref" aria-describedby="valeur"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="text-black">Valeur réference  <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" id="valeur_ref" name="valeur_ref" aria-describedby="annee"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Intitulé de la valeur cible   <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" id="initiale_valeur_cible" name="initiale_valeur_cible" aria-describedby="cible"></textarea>
                    </div>
                       <div class="col-md-3">
                        <label for="inputEmail4" class="text-black">Valeur cible <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" id="valeur_cible" name="valeur_cible" aria-describedby="valeur"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="text-black">Unité de mesure   <span class="text-danger text-bold"></span></label>
                        <select class="form-control select " id="unite_mesure" name="unite_mesure"  data-placeholder="choisissez les types" >
                            <option >--Choisir--</option>

                            @foreach ($unite_mesure as  $value)
                                <option data-icon="" value="{{$value->id_uti }}">
                                   {{ $value->code_uti }}
                                </option>
                            @endforeach
                    </select>
                </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Echelle   <span class="text-danger text-bold"></span></label>
                        <select class="form-control select " id="echele" name="echele"  data-placeholder="choisissez les types" >
                            <option  >--Choisir--</option>
                            <option  value="nationnale">Nationnale</option>
                            <option  value="regionnale">Régionnale</option>
                    </select>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="text-black">Cible par année <span class="text-danger text-bold"></span></label>
                        <input type="number" class="form-control" id="cible_annee" name="cible_annee" aria-describedby="valeur"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="inputEmail4" class="text-black">Cible révue <span class="text-danger text-bold"></span></label>
                        <input type="text" class="form-control" id="cible_revue" name="cible_revue" aria-describedby="valeur"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="inputEmail4" class="text-black">Sources véficationt </label>
                        <textarea type="text" class="form-control" id="source" name="source" aria-describedby="definition"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Indicateurs 		@if (session('id_projet'))
                            @php
                            //dd(session('id_programme'));
                                 $programme = session('projetuser')->where('id_prj', '=', session('id_projet'))->first();
                                // dd($programme)
                            @endphp
                         
                         {{ $programme->sigle_prj }}
                             
                            @endif
                            
                             
                        <select class="form-control select " id="indicateurpcga" name="indicateurpcga" data-placeholder="choisissez les types" >
                            <option>--Choisissez--</option>
                            @foreach ($indic as $typ)
                                    
                            <option data-icon="" value="{{$typ->id_iprg}}">
                               {{ $typ->code_iprg.' '.$typ->intitule_iprg }}
                            </option>
                           
                        @endforeach>
                             </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="text-black">Catégorie d'indicateur <span class="text-danger text-bold"></span></label>
                        <select class="form-control select " id="categorie" name="categorie" data-placeholder="choisissez les types" >
                            <option>--Choisissez--</option>
                             <option data-icon="" value="1">Catégorie</option>
                             <option data-icon="" value="2">Catégorie</option>
                             </select>
                    </div>
                       <div class="col-md-4">
                        <label for="inputEmail4" class="text-black">Mode de suivi <span class="text-danger text-bold"></span></label>
                        <select class="form-control select " id="mode_suivi" name="mode_suivi" data-placeholder="choisissez les types" >
                            <option>--Choisissez--</option>
                             <option data-icon="" value="direct">Direct</option>
                             <option data-icon="" value="fiche">Fiche</option>
                             <option data-icon="" value="ptba">PTBA</option>
                             </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="text-black">Mode de calcul <span class="text-danger text-bold"></span></label>
                        <select class="form-control select " id="mode_calcul" name="mode_calcul" data-placeholder="choisissez les types" >
                            <option>--Choisissez--</option>
                             <option data-icon="" value="somme">Somme</option>
                             <option data-icon="" value="moyenne">Moyenne</option>
                             <option data-icon="" value="repport">Repport</option>
                             </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="text-black">Accueil ?<span class="text-danger text-bold"></span></label>

                        <select class="form-control select " id="page" name="page" data-placeholder="choisissez les types" >
                            <option>--Choisissez--</option>
                             <option data-icon="" value="oui">Oui</option>
                             <option data-icon="" value="non">Non</option>
                             </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="text-black">Responsables de la collecte </label>
                        <input type="text" class="form-control" id="responsable" name="responsable" aria-describedby="definition"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="text-black">Fournisseurs </label>
                        <input type="text" class="form-control" id="fournisseur" name="fournisseur" aria-describedby="definition"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="inputEmail4" class="text-black">Périodicité<span class="text-danger text-bold"></span></label>

                        <select class="form-control select " id="periodicite" name="periodicite" data-placeholder="choisissez les types" >
                            <option>--Choisissez--</option>
                             <option data-icon="" value="semestrielle">Semestrielle</option>
                             <option data-icon="" value="annuelle">Annuelle</option>
                             <option data-icon="" value="fin">Fin du projet</option>
                             </select>
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
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./indicateur_projet_edit/"
           var lien1="../indicateur_projet_edit/"
           var liena='./indicateur_projet_update/'
           var liena1='../indicateur_projet_update/'
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
                $('#id').val(response.indicateur.id_iprj);
                $('#cadre_resultat').val(response.indicateur.niveau_iprj);
                $('#indicateurpcga').val(response.indicateur.code_indicateur_iprj);
                $('#code').val(response.indicateur.code_iprj);
                $('#intitule').val(response.indicateur.intitule_iprj);
                $('#unite_mesure').val(response.indicateur.unite_iprj);
                $('#initiale_valeur_cible').val(response.indicateur.intitule_cible_iprj);
                $('#valeur_cible').val(response.indicateur.valeur_cible_iprj);
                $('#cible_revue').val(response.indicateur.valeur_cible_rmp_iprj);
                $('#initiale_valeur_ref').val(response.indicateur.intitule_reference_iprj);
                $('#annee_ref').val(response.indicateur.annee_reference_iprj);
                $('#valeur_ref').val(response.indicateur.valeur_reference_iprj);
                $('#periodicite').val(response.indicateur.periodicite_iprj);
                $('#source').val(response.indicateur.source_verification_iprj);
                $('#mode_calcul').val(response.indicateur.fonction_agregat_iprj);
                $('#responsable').val(response.indicateur.responsable_iprj);
                $('#fournisseur').val(response.indicateur.fournisseur_iprj);
                $('#echele').val(response.indicateur.echelle_iprj);
                $('#mode_suivi').val(response.indicateur.mode_suivi_iprj);
                $('#categorie').val(response.indicateur.categorie_indicateur_iprj);
                $('#page').val(response.indicateur.paccueil);
                 }
                            });
                            
    });

    });
</script>

@endsection

