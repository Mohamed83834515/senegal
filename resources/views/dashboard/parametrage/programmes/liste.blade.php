@extends('dashboard.layouts.dashboard', ['title' => 'programmes'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Paramétrage </span>
                <span class="breadcrumb-item active">programmes</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2 mr-2 mx-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter un programme
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="">
   <br>
    <div class="row">
        @foreach ($programmes as $programme)
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
                        

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15"><a href="#" class="text-dark">Sigle: {{ $programme->sigle_prg }}</a></h5>
                            <p class="text-muted mb-4">Nom: {{ $programme->nom_prg}}</p>
                            <span class="avatar-title  bg-success text-white font-size-16">
                                Budget estimatif: {{  $programme->budget_estimatif_prg }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 border-top">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-3">
                            <span class="badge bg-success">Ouvert</span>
                        </li>
                        <li class="list-inline-item me-3">
                            <i class= "fa fa-calendar"></i> 
                            {{ $programme->date_fin_prg }}
                             {{-- @php
                            $date = date("d-m-Y", strtotime($programme->annee_debut_prg));
                        @endphp
                             {{ $date }} --}}
                        </li>
                       
                         <li class="list-inline-item me-3">
                            <a href="#"><i class= "icon-pencil7 text-info modaledit" id="{{ $programme->id_prg }}"></i> </a>
                            
                        </li>
                        <li class="list-inline-item me-3">
                        <a href="{{ route('programme.destroy', $programme) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $programme->id_prg }}');">
                        </a>
                        <form id="delete-form-{{ $programme->id_prg }}" action="{{ route('programme.destroy', $programme) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
     
    </div>
    <div id="modal_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
            <form class="modal-content" id="editform" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification programme</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code du programme <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Sigle <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="sigle" name="sigle" aria-describedby="sigle"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="nom" name="nom" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Objectif  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="objectif" name="objectif" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Vision  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="vision" name="vision" aria-describedby="definition"></textarea>
                            </div>

                               <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date de debut <span class="text-danger text-bold"></span></label>
                                <input type="date" id="date_debut" name="date_debut" class="form-control" required>
                            </div>
                               <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date de fin <span class="text-danger text-bold"></span></label>
                                <input type="date"  id="date_fin" name="date_fin" class="form-control" required>
                            </div>

                               <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Budget estimatif <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="budget" name="budget" aria-describedby="contact"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Type programme <span class="text-danger text-bold"></span></label>
                                <select class="form-control" id="type" name="type" aria-describedby="produit" ng-init="initialiseSelect()">

                                        <option value="1">Programme cadre</option>
                                        <option value="2">Plan d'amenagement et de gestion</option>

                                    
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
                <form class="modal-content" method="POST" action="{{ route('programme.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau programme</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code du programme <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Sigle <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="sigle" name="sigle" aria-describedby="sigle"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="nom" name="nom" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Objectif  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="objectif" name="objectif" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Vision  <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="vision" name="vision" aria-describedby="definition"></textarea>
                            </div>

                               <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Année  debut <span class="text-danger text-bold"></span></label>
                                <input type="number" id="date_debut" name="date_debut" class="form-control" required>
                            </div>
                               <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Année  fin <span class="text-danger text-bold"></span></label>
                                <input type="number"  id="date_fin" name="date_fin" class="form-control" required>
                            </div>

                               <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Budget estimatif <span class="text-danger text-bold"></span></label>
                                <input type="number" class="form-control" id="budget" name="budget" aria-describedby="contact"></textarea>
                            </div>
                            {{-- <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Type programme <span class="text-danger text-bold"></span></label>
                                <select class="form-control" id="type" name="type" aria-describedby="produit" ng-init="initialiseSelect()">

                                        <option value="1">Programme cadre</option>
                                        <option value="2">Plan d'amenagement et de gestion</option>

                                  
                                </select>
                            </div> --}}

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
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var liens="./programme_edit/"
           //var liens="../projet_edit/"
           var liensa='./programme_update/'
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
                $('#code').val(response.programme.code_prg);
                $('#sigle').val(response.programme.sigle_prg);
                $('#nom').val(response.programme.nom_prg);
                $('#objectif').val(response.programme.objectif_prg);
                $('#vision').val(response.programme.vision_prg); 
                $('#date_debut').val(response.programme.annee_debut_prg);
                $('#date_fin').val(response.programme.annee_fin_prg);
                $('#budget').val(response.programme.budget_estimatif_prg);
                $('#type').val(response.programme.type_programme_prg);
                 }
                            });
                            
    });

    });
</script>
@endsection
