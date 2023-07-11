@extends('dashboard.layouts.dashboard', ['title' => 'Projets'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Paramétrage</span>
                <span class="breadcrumb-item active">Projets</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter un projet
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div  ng-controller="projet">
   
    <div class="row" ng-init="InitialiseProjetG()">
     
        @foreach ($partenaires as $partenaire)
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-4">
                            <div class="avatar-md">
                                
                                <span class="avatar-title rounded-circle bg-light text-danger font-size-16">
                                    <img src="{{ asset('images/companies/img-1.png') }}" alt="" height="30">
                                </span>
                            </div>
                        </div>
                        

                        <div class="flex-grow-1 overflow-hidden" >
                            <h5 class="text-truncate font-size-15"><a href="{{ route('projet.show', $partenaire) }}" class="text-dark">{{ $partenaire->sigle_prj }} || {{ $partenaire->code_prj }}</a></h5>
                            <p  class="text-muted mb-4">{{ $partenaire->intitule_prj}}  </p>
                            <div class="avatar-group">
                                <div class="avatar-group-item">
                                    {{-- <a href="javascript: void(0);" class="d-inline-block">
                                        <img src="{{ asset('images/users/avatar-4.jpg') }}" alt=""@{{affiche}}  class="rounded-circle avatar-xs">
                                    </a> --}}
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        {{-- <img src="../images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs"> --}}
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        <div class="avatar-xs">
                                            <span class="avatar-title rounded-circle bg-success text-white font-size-16">
                                                A
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="avatar-group-item">
                                    <a href="javascript: void(0);" class="d-inline-block">
                                        {{-- <img src="../images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs"> --}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 border-top">
                    <ul class="list-inline mb-0">
                        {{-- <li class="list-inline-item me-3">
                            <span class="badge bg-success">Ouvert</span>
                        </li> --}}
                        <li class="list-inline-item me-3">
                            <i class= "fa fa-calendar text-info"></i>
                            @php
                                $date = date("d-m-Y", strtotime($partenaire->date_signature_prj));
                            @endphp
                             {{ $date  }}
                        </li>
                        <li class="list-inline-item me-3">
                            <a href="{{ route('projet.show', $partenaire) }}"><i class= "icon-eye8 text-info"></i> </a>
                            
                        </li>
                        <li class="list-inline-item me-3">
                            <a href="#"><i class= "icon-pencil7 text-info modaledit" id="{{ $partenaire->id_prj }}"></i> </a>
                            
                        </li>
                        <li class="list-inline-item me-3">
                        <a href="{{ route('projet.destroy', $partenaire) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $partenaire->id_prj }}');">
                        </a>
                        <form id="delete-form-{{ $partenaire->id_prj }}" action="{{ route('projet.destroy', $partenaire) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
        {{-- <a ng-click="show = !show" href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" >
                     
                    Ajouter un projet
                </a> --}}
        <div ng-show="show"class="col-xl-4 col-sm-6" ng-repeat="liste in ListeProjet">
            {{-- <h1>@{{liste.code_prj}}</h1> --}}
        </div>
     <!-- <div class="col-xl-4 col-sm-6" ng-repeat="module in ListeProjet">
        <h1>@{{module.id_prj}}</h1>
     </div> -->
    </div>
    <div id="modal_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" id="editform" action="" method="POST">
                    
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau projet -
                        <span ng-show="VueCreationProjet == 'Etape1'">Etape 1</span>
                        <span ng-show="VueCreationProjet == 'Etape2'">Etape 2</span>
                        <span ng-show="VueCreationProjet == 'Etape3'">Etape 3</span>
                        <span ng-show="VueCreationProjet == 'Etape4'">Etape 4</span>
                        <span ng-show="VueCreationProjet == 'Etape5'">Etape 5</span>
                        <span ng-show="VueCreationProjet == 'Etape6'">Etape 6</span>
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-6 mb-2" >
                            <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="code" name="code" ng-model="Projet.code"  placeholder=""  aria-describedby="code" placeholder="Saississez l'acronyme" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Sigle <span class="text-danger text-bold">*</span></label>
                            <input type="text" placeholder="code" class="form-control" id="sigle" name="sigle" ng-model="Projet.sigle_projet" aria-describedby="sigle"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold">*</span></label>
                            <textarea type="text" placeholder="Nom" class="form-control" id="intitule_projet" name="intitule_projet" ng-model="Projet.intitule_projet" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-12" >
                            <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                            <textarea type="text" class="form-control" id="couverture" name="couverture" ng-model="Projet.couverture" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-6" >
                            <label for="inputEmail4" class="text-black">Date début <span class="text-danger text-bold">*</span></label>
                            <input type="date" required id="date_signature" name="date_signature"  ng-model="Projet.date_signature_projet" class="form-control" required>
                        </div>
                          
                         
                        <div  class="col-md-6">
                            <label for="inputEmail4" class="text-black">Date de fin <span class="text-danger text-bold">*</span></label>
                            <input type="date" required id="date_fin" name="date_fin" ng-model="Projet.date_fin" class="form-control" required>
                        </div>
                         
                       
                             <div class="col-md-12" >
                            <label for="inputEmail4" class="text-black">Programme<span class="text-danger text-bold">*</span></label>

                        <select class="form-control" id="type" name="type" aria-describedby="produit" ng-model="Projet.priorite"  data-placeholder="choisissez un projet"  >
                            @foreach ($programmes as $type)
                                <option data-icon="" value="{{$type->id_prg}}"
                                    {{ check_module_selected(old('type'), $type->id_prg) ? 'selected' : '' }}>
                                    {{ $type->sigle_prg }}
                                </option>

                            @endforeach
                        </select>
                        </div>
                   

                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-link" type="button"  data-bs-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                    <button type="submit" class="btn text-white bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>
        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('projet.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau projet -
                            <span ng-show="VueCreationProjet == 'Etape1'">Etape 1</span>
                            <span ng-show="VueCreationProjet == 'Etape2'">Etape 2</span>
                            <span ng-show="VueCreationProjet == 'Etape3'">Etape 3</span>
                            <span ng-show="VueCreationProjet == 'Etape4'">Etape 4</span>
                            <span ng-show="VueCreationProjet == 'Etape5'">Etape 5</span>
                            <span ng-show="VueCreationProjet == 'Etape6'">Etape 6</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-6 mb-2" >
                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" ng-model="Projet.code"  placeholder=""  aria-describedby="code" placeholder="Saississez l'acronyme" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Sigle <span class="text-danger text-bold">*</span></label>
                                <input type="text" placeholder="code" class="form-control" id="sigle" name="sigle" ng-model="Projet.sigle_projet" aria-describedby="sigle"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold">*</span></label>
                                <textarea type="text" placeholder="Nom" class="form-control" id="intitule_projet" name="intitule_projet" ng-model="Projet.intitule_projet" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12" >
                                <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="couverture" name="couverture" ng-model="Projet.couverture" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-6" >
                                <label for="inputEmail4" class="text-black">Date début <span class="text-danger text-bold">*</span></label>
                                <input type="date" required id="date_signature" name="date_signature"  ng-model="Projet.date_signature_projet" class="form-control" required>
                            </div>
                              
                             
                            <div  class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date de fin <span class="text-danger text-bold">*</span></label>
                                <input type="date" required id="date_fin" name="date_fin" ng-model="Projet.date_fin" class="form-control" required>
                            </div>
                             
                           
                                 <div class="col-md-12" >
                                <label for="inputEmail4" class="text-black">Programme<span class="text-danger text-bold">*</span></label>

                            <select class="form-control" id="type" name="type" aria-describedby="produit" ng-model="Projet.priorite"  data-placeholder="choisissez un projet"  >
                                @foreach ($programmes as $type)
                                    <option data-icon="" value="{{$type->id_prg}}"
                                        {{ check_module_selected(old('type'), $type->id_prg) ? 'selected' : '' }}>
                                        {{ $type->sigle_prg }}
                                    </option>

                                @endforeach
                            </select>
                            </div>
                       

                        
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn  text-white bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /iconified modal -->
</div>
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var liens="./projet_edit/"
           //var liens="../projet_edit/"
           var liensa='./projet_update/'
           //var liensa='../projet_update/'
            //var statut=$(this).attr("statut");
            
           /*  if(statut==0)
            {
                var liens=lien
                var liensa=liena
            }
            else{
                var liens=lien1
                var liensa=liena1
            } */
            $('#editform').attr('action',liensa+ids)
           $('#modal_edit').modal('show')
           //alert(page)
           $.ajax({
       
                url:liens+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                $('#code').val(response.projet.code_prj);
                $('#sigle').val(response.projet.sigle_prj);
                $('#intitule_projet').val(response.projet.intitule_prj);
                $('#couverture').val(response.projet.couverture_prj);
                $('#date_signature').val(response.projet.date_signature_prj); 
                $('#date_fin').val(response.projet.date_fin_prj);
                $('#type').val(response.projet.idprg_prj);
                 }
                            });
                            
    });

    });
</script>
@endsection
