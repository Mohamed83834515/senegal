@extends('dashboard.layouts.dashboard', ['title' => 'Suivi des résultats'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Suivi des résultats</a>
                <a href="#" class="breadcrumb-item">Indicateurs programme</a>
                <span class="breadcrumb-item active">Détails</span>
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
                     <span class="info">Suivi Indicateurs: @foreach ($indicateur as $item){{ $item->intitule_iprg }} @endforeach</span> 
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        
                    </ul>
                </div>
            </div>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="projet-overview">

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
                                    @if (isset($indicateur))
                                     @foreach ($indicateur as $resultat)
                                     <tr style="background-color: #4e4b4b7d">
                                        <th colspan="3" >{{ $resultat->intitule_iprj }}(<samp style="color: red"><b> {{ $resultat->valeur_cible_iprj }}</b></samp>)</th>
                                        <td class="text-center">
                                            <a href="" class=" indicateur_ajout" id="{{ $resultat->id_iprj }}"   data-placement="bottom" title="Ajout">
                                                <i class="icon-add mr-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                             {{--        @php
                     $SuiviIdi = $ListesSuiviIndi->where('id_indicateur_sip', '=', $resultat->id_pi)->all();
                                    
                                @endphp --}}
                                @if (isset($ListesSuiviIndi))
                                 @foreach ($ListesSuiviIndi as $resul)
                                    <tr>
                                    <td> {{ $resul->lieu_pp }}</td>
                                    <td>{{ $resul->date_suivi_pp }}</td>
                                    <td>{{ $resul->valeur_suivi_pp }}</td> 
                                    <td class="text-center">
                                        
                                        <a href="" class="icon-pencil7 text-info modaleditindicateur" id="{{ $resul->id_pp }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                         </a>
                                         <a href="{{ route('suivi_indicateur_pp.destroy', $resul) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $resul->id_pp }}');">
                                        </a>
                                        <form id="delete-form-{{ $resul->id_pp }}" action="{{ route('suivi_indicateur_pp.destroy', $resul) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                    </tr>
                                    @endforeach 
                                    @endif
                                    <br>
                                   @endforeach 
                                   @endif
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
                                <label for="inputEmail4" class="text-black">Année de suivi   <span class="text-danger text-bold"></span></label>
                                <input type="number" class="form-control" id="annee_ind" name="annee_ind" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date de suivi   <span class="text-danger text-bold"></span></label>
                                <input type="date" class="form-control" id="date_suivi_ind" name="date_suivi_ind" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Résultat  (NBRE)    <span class="text-danger text-bold"></span></label>
                                <input type="number" class="form-control" id="valeur" name="valeur" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
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
                <form class="modal-content" method="POST" action="{{ route('suivi_indicateur_pp.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Indicateur</h5> 
                        
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <input type="hidden" class="form-control" value="projet" id="pro_projet" name="pro_projet" aria-describedby="sigle">
                    <input type="hidden" class="form-control" value="" id="id_indicateur" name="id_indicateur" aria-describedby="sigle">
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Localité   <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="lieu" name="lieu" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Année de suivi   <span class="text-danger text-bold"></span></label>
                                <input type="number" class="form-control" id="annee_ind" name="annee_ind" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date de suivi   <span class="text-danger text-bold"></span></label>
                                <input type="date" class="form-control" id="date_suivi_ind" name="date_suivi_ind" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Résultat  (NBRE)    <span class="text-danger text-bold"></span></label>
                                <input type="number" class="form-control" id="valeur" name="valeur" aria-describedby="definition">
                            </div>
                            <div class="col-md-6">
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
    </div>
    <!-- /left content -->



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
      

    $(document).on('click','.modaleditindicateur',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../suivi_indicateur_pp_edit/"
           var liena='../suivi_indicateur_pp_update/'
            var statut=$(this).attr("statut");
            $('#editformind').attr('action',liena+ids)
           $('#modal_edit_ind').modal('show')
           $.ajax({
                url:lien+ids,
                method: "GET",
                success: function (response) {
                    console.log(response);
                $('#lieu').val(response.indicateur.lieu_pp);
                $('#annee_ind').val(response.indicateur.annee_pp);
                $('#valeur').val(response.indicateur.valeur_suivi_pp);
                $('#date_suivi_ind').val(response.indicateur.date_suivi_pp);
                $('#observation_op').val(response.indicateur.observation_pp);
                 }
                            });
                            
    });
 

   

    });
</script>
@endsection
