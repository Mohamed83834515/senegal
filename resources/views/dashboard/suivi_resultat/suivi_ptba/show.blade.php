@extends('dashboard.layouts.dashboard', ['title' => 'Détails PTBA'])

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

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a  href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_obs">
                     
                    Ajouter une observation
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
                    <a href="" onclick="window.history.back()"><i class="icon-arrow-left52 mr-2"></i></a>
                     <span class="info">Suivi PTBA: {{$libelle_ptba}}</span> 
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
                            <i class="icon-menu7 mr-2"></i> Observations
                            <span class="badge bg-slate badge-pill ml-2">{{ count($observations) }}</span>
                        </a>
                    </li>
                    
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="projet-overview">

                    <div class="table-responsive">
                    <table class="table table-striped table-border " id="">
                            <thead>
                                <tr>
                                    <th >Tâches</th>
                                    <th >Poids(%)</th>  
                                    <th >Date de suivi</th> 
                                    <th >Observation</th>
                                    <th>Validée</th>
                                    <th>Lot</th> 
                                    <th >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form class="modal-content" method="POST" action="{{ route('modifier') }}">
                                    @csrf
                                    @method('PUT')
                                 @foreach ($all_suivi as $resultat)
                                <tr>
                                <td>  {{ $resultat->tache->intitule_pt }}</td>
                                <td>{{ $resultat->proportion_stp }}</td> 
                                <td>
                                    @if($resultat->date_suivi_stp)
                                    {{ $resultat->date_suivi_stp }}
                                    @else
                                    Pas définie
                                    @endif
                                    {{-- <input type="date" id="date_suivi" name="date_suivi[]" value="{{ $resultat->date_suivi_pt }}" class="form-control" > --}}
                                </td>
                                <td>
                                    @if($resultat->observation_stp)
                                    {{ $resultat->observation_stp }}
                                    @else
                                    Aucune observation
                                    @endif
                                    {{-- <input type="date" id="date_suivi" name="date_suivi[]" value="{{ $resultat->date_suivi_pt }}" class="form-control" > --}}
                                </td>
                                <input type="hidden"  value="{{ $resultat->id_stp}}" id="id_stp[]" name="id_stp[]" >
                                <input type="hidden" name="proportion_stp[]"  value="{{ $resultat->proportion_stp }}" id="proportion_stp[]" >
                                <input type="hidden"   value="{{ $resultat->id_tache_stp}}" id="id_tache_stp[]" name="id_tache_stp[]" >
                                <input type="hidden"  value="{{ $resultat->id_ptba_stp}}" id="id_ptba_stp[]" name="id_ptba_stp[]" >
                                <td>
                                    
                                    <input type="checkbox" id="valide_stp[]" name="valide_stp[]" value="{{ $resultat->id_stp}}">
                                </td> 
                                <td>
                                    @if($resultat->lot_stp)
                                        {{ $resultat->lot_stp }}
                                    @else
                                        0
                                    @endif
                                    @php
                                    $tache = $type_activites->where('id_pt', '=', $resultat->id_tache_stp)->first();
                                   // dd($tache);
                                @endphp
                               / {{ $tache->lot_pt }}
                                    {{-- <input type="text" id="lot_stp[]" name="lot_stp[]" value="{{ $resultat->lot_stp }}" class="form-control" > --}}
                                </td>
                                
                                {{-- <td><input type="file" id="source" name="source"  ></td> --}}
                                {{-- <td><input type="text" id="observation_stp" name="observation_stp[]" value="{{ $resultat->observation_stp }}" class="form-control" ></td> --}}
                                <td>
                                
                                    <a href="" class="icon-pencil7 text-info modaleditsuivi" id="{{ $resultat->id_stp }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                    </a>
                                </td>
                                </tr>
                               @endforeach 
                               <tr style="background-color: #4e4b4b7d">
                                <td colspan="" style="color: red"><b>Niveau d'avancement</b></td>
                                <td style="color: red"><b>
                                    {{-- {{ $resultat->lot_stp }} --}}
                                    %</b></td>
                                <td colspan="5"></td>
                                {{-- <td>
                                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                            </td> --}}
                          
                            </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="indicateur">

                    <div class="table-responsive">
                    <table class="table table-striped " id="DataTables_Table_0">
                        <thead>
                              
                                
                                <tr>
                                    <th>Lieu</th>
                                    <th>Date suivi</th>
                                    <th>Résultat (NBRE)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($indicateurs as $resultat)
                                 <tr style="background-color: #4e4b4b7d">
                                    <th colspan="3" >{{ $resultat->intitule_pi }}({{ $resultat->unite_pi }})(<samp style="color: red"><b> {{ $resultat->valeur_cible_pi }}</b></samp>)</th>
                                    <td class="text-center">
                                        <a href="" class=" indicateur_ajout" id="{{ $resultat->id_pi }}"   data-placement="bottom" title="Ajout">
                                            <i class="icon-add mr-2"></i>
                                        </a>
                                    </td>
                                </tr>
                                @php
                 $SuiviIdi = $ListesSuiviIndi->where('id_indicateur_sip', '=', $resultat->id_pi)->all();
                                
                            @endphp
                            @foreach ($SuiviIdi as $resul)
                                <tr>
                                <td> {{ $resul->lieu_sip }}</td>
                                <td>{{ $resul->date_suivi_sip }}</td>
                                <td>{{ $resul->valeur_suivi_sip }}</td> 
                                <td class="text-center">
                                    
                                    <a href="" class="icon-pencil7 text-info modaleditindicateur" id="{{ $resul->id_sip }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                     </a>
                                     <a href="{{ route('suivi_indicateur_ptba.destroy', $resul) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $resul->id_sip }}');">
                                    </a>
                                    <form id="delete-form-{{ $resul->id_sip }}" action="{{ route('suivi_indicateur_ptba.destroy', $resul) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                </tr>
                                @endforeach 
                                <br>
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
                    <table class="table table-striped  " id="DataTables_Table_0">
                            <thead>
                                <tr>
                                    <th>Executant</th>
                                    <th>Observation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($observations as $resultat)
                                <tr>
                                <td> {{ $resultat->executant_op }}</td>
                                <td>{{ $resultat->observation_op }}</td>
                                <td class="text-center">
                                    <a href="" class="icon-pencil7 text-info modaleditobs" id="{{ $resultat->id_op }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                     </a>
                                     <a href="{{ route('observation_ptba.destroy', $resultat) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $resultat->id_op }}');">
                                    </a>
                                    <form id="delete-form-{{ $resultat->id_op }}" action="{{ route('observation_ptba.destroy', $resultat) }}" method="POST" style="display: none;">
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
            </div>
        </div>
      
        <div id="modal_edit_ind" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                    <form class="modal-content" id="editformind" action="" method="POST">
                    
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Indicateur</h5> 
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Localité   <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="lieu" name="lieu" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date de suivi   <span class="text-danger text-bold"></span></label>
                                <input type="date" class="form-control" id="date_suivi_ind" name="date_suivi_ind" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Résultat  (NBRE)    <span class="text-danger text-bold"></span></label>
                                <input type="number" class="form-control" id="valeur" name="valeur" aria-describedby="definition">
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
        <div id="modal_edit_obs" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editformobs" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Modification d'une observation</h5>    <a ng-click="ajouterProduit()" class="pointer-event"><i class="icon-add mr-2"></i></a>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="{{ $id_activite}}" id="id_ptba_op" name="id_ptba_op" aria-describedby="sigle">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Executant  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="executant_op" name="executant_op" aria-describedby="definition">
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Observation  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="observation_op" name="observation_op" aria-describedby="definition"></textarea>
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
        <div id="modal_obs" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('observation_ptba.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'une observation</h5>    <a ng-click="ajouterProduit()" class="pointer-event"><i class="icon-add mr-2"></i></a>
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="{{ $id_activite}}" id="id_ptba_op" name="id_ptba_op" aria-describedby="sigle">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Executant  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="executant_op" name="executant_op" aria-describedby="definition">
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Observation  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="observation_op" name="observation_op" aria-describedby="definition"></textarea>
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
        <div id="modal_indic" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('suivi_indicateur_ptba.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Indicateur</h5> 
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="" id="id_indicateur" name="id_indicateur" aria-describedby="sigle">
                    <input type="hidden" class="form-control" value="{{ $id_activite}}" id="id_activite" name="id_activite" aria-describedby="sigle">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Localité   <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="lieu" name="lieu" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date de suivi   <span class="text-danger text-bold"></span></label>
                                <input type="date" class="form-control" id="date_suivi_ind" name="date_suivi_ind" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Résultat  (NBRE)    <span class="text-danger text-bold"></span></label>
                                <input type="number" class="form-control" id="valeur" name="valeur" aria-describedby="definition">
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
        <div id="modal_edit_suivi" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editformsuivi" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Suivi tâches</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Date suivi<span class="text-danger text-bold"></span></label>
                                <input type="date" id="date_suivi" name="date_suivi" class="form-control" required>
                                <input type="hidden" class="form-control" value="{{ $id_activite}}" id="id_spt" name="id_pt" aria-describedby="sigle">
                            </div>
                            <div class="col-md-12">
                               
                                <label for="inputEmail4" class="text-black">Statut  <span class="text-danger text-bold"></span></label>
                                
                                <select id="statut"   class="form-control select @error('debut') is-invalid @enderror" name="statut" aria-describedby="debut" data-placeholder="choisissez les types" data-fouc multiple>
                                    <option data-icon="" value="1">En cours</option> 
                                    <option data-icon="" value="2">Réalisé</option> 
                                    <option data-icon="" value="3">Non démarré</option> 

                                </select>
                             </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Nombre de lot <span class="text-danger text-bold"></span></label>
                                <input type="text" id="lot" name="lot" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                               
                                <label for="inputEmail4" class="text-black">Source de vérification  <span class="text-danger text-bold"></span></label>
                                
                              <input type="file" id="source" name="source" >
                             </div>
                            
                                <input type="hidden" class="form-control" value="" name="convention" aria-describedby="sigle">
                            
                           
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Commentaire <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="observation" name="observation" aria-describedby="definition"></textarea>
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
  
    <!-- /right sidebar component -->

</div>
<!-- /inner container -->
<script>
    $(document).ready(function(){
        $(document).on('click', '.indicateur_ajout', function(){
    var id_indicateur =$(this).attr("id");
   // alert(id_indicateur);
  $('#id_indicateur').val(id_indicateur);
  $('#modal_indic').modal('show');   
  });
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

           var lien="../suivi_indicateur_ptba_edit/"
           var liena='../suivi_indicateur_ptba_update/'
            var statut=$(this).attr("statut");
            $('#editformind').attr('action',liena+ids)
           $('#modal_edit_ind').modal('show')
           $.ajax({
                url:lien+ids,
                method: "GET",
                success: function (response) {
                    console.log(response);
                $('#lieu').val(response.indicateur.lieu_sip);
                $('#date_suivi_ind').val(response.indicateur.date_suivi_sip);
                $('#valeur').val(response.indicateur.valeur_suivi_sip);
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

    $(document).on('click','.modaleditobs',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../observation_ptba_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../observation_ptba_update/'
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
            $('#editformobs').attr('action',liena+ids)
           $('#modal_edit_obs').modal('show')
           //alert(page)
           $.ajax({
       
                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                $('#id_ptba_op').val(response.observation.id_ptba_op);
                $('#executant_op').val(response.observation.executant_op);
                $('#observation_op').val(response.observation.observation_op);
                 }
                            });
                            
    });
    $(document).on('click','.modaleditsuivi',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../suivi_tache_ptba_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../suivi_tache_ptba_update/'
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
            $('#editformsuivi').attr('action',liena+ids)
           $('#modal_edit_suivi').modal('show')
           //alert(page)
           $.ajax({
       
                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                    $('#id').val(response.indicateur.id_stp);
                    $('#date_suivi').val(response.indicateur.date_suivi_stp);
                    $('#statut').val(response.indicateur.valide_stp);
                    $('#lot').val(response.indicateur.lot_stp);
                    $('#source').val(response.indicateur.source_stp);
                    $('#observation').val(response.indicateur.observation_stp); 
                 }
                            });
                            
    });
    });
</script>
@endsection
