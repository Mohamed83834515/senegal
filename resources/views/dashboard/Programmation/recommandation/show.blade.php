@extends('dashboard.layouts.dashboard', ['title' => 'Détails type de récommandation'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Programmation</a>
                <a href="#" class="breadcrumb-item">Récommandation</a>
                <span class="breadcrumb-item active">Détails Type de récommandation</span>
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
                     <span class="info">Activité </span> 
                     
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
                            <i class="icon-menu7 mr-2"></i> Planification
                            {{-- <span class="badge bg-slate badge-pill ml-2">
                                 @if(isset($taches))
                                 {{ count($taches) }}
                                    @endif </span> --}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Suivi
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
                                    <th>Recommandation</th>
                                    <th>Date buttoir</th>  
                                    <th>Type</th> 
                                    <th>Structure</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($taches))
                                @foreach ($action as $tache)
                                <tr>
                                <td> {{ $tache->code_rma }}</td>
                                <td>{{ $tache->intitule_rma }}</td> 
                                <td>{{ $tache->date_butoir_rma }}</td> 
                                <td>
                                  @php
                                      switch ($tache->type_recommandation_rma) {
    case 1:
        echo "Non-definie";
        break;
    case 2:
    echo "immediat";
        break;
        case 3:
    echo "immediat et continue";
        break;
        case 4:
    echo "A echéance";
        break;
    default:
        // código a ejecutar si $variable no coincide con ningún valor anterior
        break;
}
                                  @endphp
                                    {{-- @php
                                        switch ({{ $tache->type_recommandation_rma }})
                                         
                                            case 1:
                                               echo "non definie"
                                                break;
                                                case 2:
                                               echo "Immédiat"
                                                break;
                                                case 1:
                                               echo "Immédiat non connue"
                                                break;
                                                case 1:
                                               echo "A echeance"
                                                break;
                                        
                                    @endphp --}}
                                   
                                </td> 
                                <td>  @foreach ($tache->structure_concerne_rma as $pat)
                                    @php
                                        $type = $types->where('id_pat', '=', $pat)->first();
                                    @endphp
                                    {{ $type->sigle_pat }}
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach</td> 
                                <td class="text-center">
                                    <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $tache->id_rma }}"   data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        {{-- <i class="far fa-edit"></i> --}}
                                    </a>
                                    
                                    <a href="{{ route('ptba_tache.destroy', $tache) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $tache->id_rma }}');">
                                    </a>
                                    <form id="delete-form-{{ $tache->id_rma }}" action="{{ route('ptba_tache.destroy', $tache) }}" method="POST" style="display: none;">
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
                                <label for="inputEmail4" class="text-black">Résumé recommandation   <span class="text-danger text-bold"></span></label>
                                <textarea type="textarea" class="form-control" id="resume" name="resume" aria-describedby="definition"></textarea>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $id_activite}}" id="type_activite" name="type_activite" aria-describedby="sigle">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Intitulé complet   <span class="text-danger text-bold"></span></label>
                                <textarea type="textarea" class="form-control" id="intitule" name="intitule" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Date buttoir</label>
                                <input type="date" class="form-control" id="date_butoir" name="date_butoir" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Type recommandation  <span class="text-danger text-bold">*</span></label>
                                    <select class="form-control select " id="partenaire" name="type"  data-placeholder="choisissez les types" >
                                        <option value="1" >Non-define</option>
                                        <option value="2">Immédiat</option>
                                        <option value="3">Immédiat et continu</option>
                                        <option value="4">A échéance</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Structure concernées</label>
                                <select class="form-control select @error('type') is-invalid @enderror" name="structure[]" ng-model="Projet.direction_lead"  aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>
                                    @foreach ($partenaires as $type)
                                        <option data-icon="" value="{{$type->id_pat}}"
                                            {{ check_module_selected(old('type'), $type->id_pat) ? 'selected' : '' }}>
                                            {{ $type->sigle_pat }}
                                        </option>
    
                                    @endforeach
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
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('recommandation_action.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary"> 
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'une recommandation</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Résumé recommandation   <span class="text-danger text-bold"></span></label>
                                <textarea type="textarea" class="form-control" id="resume" name="resume" aria-describedby="definition"></textarea>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $id_activite}}" id="type_activite" name="type_activite" aria-describedby="sigle">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Intitulé complet   <span class="text-danger text-bold"></span></label>
                                <textarea type="textarea" class="form-control" id="intitule" name="intitule" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Date buttoir</label>
                                <input type="date" class="form-control" id="date_butoir" name="date_butoir" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Type recommandation  <span class="text-danger text-bold">*</span></label>
                                    <select class="form-control select " id="type" name="type"  data-placeholder="choisissez les types" >
                                        <option value="1" >Non-define</option>
                                        <option value="2">Immédiat</option>
                                        <option value="3">Immédiat et continu</option>
                                        <option value="4">A échéance</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Structure concernées</label>
                                <select class="form-control select @error('type') is-invalid @enderror" name="structure[]" ng-model="Projet.direction_lead"  aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>
                                    @foreach ($partenaires as $type)
                                        <option data-icon="" value="{{$type->id_pat}}"
                                            {{ check_module_selected(old('type'), $type->id_pat) ? 'selected' : '' }}>
                                            {{ $type->sigle_pat }}
                                        </option>
    
                                    @endforeach
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
        
    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- projet details -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Planification</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                    <a href="#" class="btn bg-success-400 btn-block mb-2" data-toggle="modal" data-target="#modal_iconified">
                        <i class="icon-user mr-2"></i> Ajouter une recommandation
                    </a>
                        <form id="livrer-form-1" action="" method="POST" style="display: none;">
                            @csrf
                            @method('POST')
                        </form>
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

           var lien="../recommandation_action_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../recommandation_action_update/'
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
                 $('#id').val(response.recommandation.id_rma);
                $('#intitule').val(response.recommandation.intitule_rma);
                $('#resume').val(response.recommandation.resume_rma);
                $('#type').val(response.recommandation.type_recommandation_rma);
                //$('#proportion').val(response.recommandation.proportion_pt);
                 }
                            });
                            
    });

    });
</script>
@endsection
