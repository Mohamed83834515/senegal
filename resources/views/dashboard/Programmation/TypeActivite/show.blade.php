@extends('dashboard.layouts.dashboard', ['title' => 'Type activité'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Programmation</a>
                <a href="#" class="breadcrumb-item">Type d'activité</a>
                <span class="breadcrumb-item active">Détails Type d'activité</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
         
       
            
        @if(empty($orders->total_proportion) || $orders->total_proportion<100)
           <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a   href="" class="btn bg-success-400 btn-block mt-2 mb-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-user mr-2"></i> Ajouter une tâche
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
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    <a href="" onclick="window.history.back()"><i class="icon-arrow-left52 mr-2"></i></a>
                     <span class="info">Activité: {{$libelle_tpa}}</span> <br>
                     <span class="info">Total proportion: @if(!$orders)
                    0 
                    @else
                    {{$orders->total_proportion}}
                        
                     @endif
                        </span>
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
                            <span class="badge bg-slate badge-pill ml-2">
                                 @if(isset($taches))
                                 {{ count($taches) }}
                                    @endif </span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Activités
                            <span class="badge bg-slate badge-pill ml-2">{{ count($ConventionActivite) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Indicateurs
                            <span class="badge bg-slate badge-pill ml-2">0</span>
                        </a>
                    </li> --}}
                    
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="projet-overview">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Tâches</th> 
                                    <th>Proportion (%)</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($taches))
                                @foreach ($taches as $tache)
                                <tr>
                                <td> {{ $tache->code_pt }}</td>
                                <td>{{ $tache->intitule_pt }}</td> 
                                <td>{{ $tache->proportion_pt }}</td> 
                                <td class="text-center">
                                    <a href="" class="icon-pencil7 text-info modaledit" id="{{ $tache->id_pt }}"   data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        {{-- <i class="far fa-edit"></i> --}}
                                    </a>
                                    
                                    <a href="{{ route('ptba_tache.destroy', $tache) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $tache->id_pt }}');">
                                    </a>
                                    <form id="delete-form-{{ $tache->id_pt }}" action="{{ route('ptba_tache.destroy', $tache) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                </tr>
                               
                               
                               @endforeach
                          
                               @endif
                        
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
        <div id="modal_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editform" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Modification d'une tâche</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="" id="type_activite" name="type_activite" aria-describedby="sigle">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Tâche   <span class="text-danger text-bold"></span></label>
                                <textarea type="textarea" class="form-control" id="intitule" name="intitule" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Proportion (%)   <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="proportion" name="proportion" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
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
                <form class="modal-content" method="POST" action="{{ route('ptba_tache.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'une tâche</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $id_activite}}" id="type_activite" name="type_activite" aria-describedby="sigle">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Tâche   <span class="text-danger text-bold"></span></label>
                                <textarea type="textarea" class="form-control" id="intitule" name="intitule" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Proportion (%)   <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="proportion" name="proportion" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
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
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../ptba_tache_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../ptba_tache_update/'
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
                $('#code').val(response.tache.code_pt);
                $('#intitule').val(response.tache.intitule_pt);
                $('#type_activite').val(response.tache.type_activite_pt);
                $('#proportion').val(response.tache.proportion_pt);
                 }
                            });
                            
    });

    });
</script>
@endsection
