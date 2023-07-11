@extends('dashboard.layouts.dashboard', ['title' => 'Type activité'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Programmation</span>
                <span class="breadcrumb-item active">Récommandation</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2 mr-2 mx-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter une récommandation
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                <th class="">Code</th>
                <th class="">Intitulé de l'activité</th>
                <th class="">Lieu</th>
                <th class="">Partenaires présents</th> 
                <th class="">Dates (Début / Fin)</th> 
                <th class="">Participants</th>  
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programmes as $programme)
                <tr>
                    <td>{{ $programme->code_rc }}</td>
                    <td>{{ $programme->intitule_rc }}</td>
                    <td>{{ $programme->region_concerne_rc }}</td>
                    <td>{{ $programme->partenaires_rc }}</td>
                    <td>{{ $programme->debut_rc }} {{ $programme->fin_rc }}</td>
                    <td><a href="#">0 Participants</a></td> 
                    <td class="text-center">
                        <a href="{{ route('recommandation.show', $programme->id_rc) }}" class="icon-eye8 text-brown-800 mr-2" data-toggle="tooltip" data-placement="bottom" title="Visualiser">
                        </a>
                        <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $programme->id_rc }}"  data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                        <a href="{{ route('recommandation.destroy', $programme) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $programme->id_rc }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $programme->id_rc }}" action="{{ route('recommandation.destroy', $programme) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="modal_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" id="editform" action="" method="POST">
                    
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Modifier récommandation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-6 mb-2">
                            <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Code" aria-describedby="code" placeholder="Saississez le code" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="inputEmail4" class="text-black">Lieu  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Lieu" aria-describedby="code" placeholder="Saississez le code" required>
                        </div>

                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Intitule de l'activité  <span class="text-danger text-bold">*</span></label>
                            <textarea type="text" class="form-control" id="intitule" name="intitule" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Objectifs de l'activité <span class="text-danger text-bold">*</span></label>
                            <textarea type="text" class="form-control" id="objectif" name="objectif" aria-describedby="definition"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Partenaire    <span class="text-danger text-bold">*</span></label>
                            <select class="form-control select " id="partenaire" name="partenaire"  data-placeholder="choisissez les types" >
                                <option >--Choisir--</option>
    
                                @foreach ($type_programmes as  $value)
                                    <option data-icon="" value="{{$value->id_pat  }}">
                                       {{ $value->definition_pat }}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Date de Début <span class="text-danger text-bold">*</span></label>
                        <input type="date" class="form-control" id="debut" name="debut" placeholder="Lieu" aria-describedby="code" placeholder="Saississez le code" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Date de fin<span class="text-danger text-bold">*</span></label>
                        <input type="date" class="form-control" id="fin" name="fin" placeholder="Lieu" aria-describedby="code" placeholder="Saississez le code" required>
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
                <form class="modal-content" method="POST" action="{{ route('recommandation.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvelle récommandation</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
    
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Code" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Lieu  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="lieu" name="lieu" placeholder="Lieu" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
    
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Intitule de l'activité  <span class="text-danger text-bold">*</span></label>
                                <textarea type="text" class="form-control" id="intitule" name="intitule" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Objectifs de l'activité <span class="text-danger text-bold">*</span></label>
                                <textarea type="text" class="form-control" id="objectif" name="objectif" aria-describedby="definition"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Partenaire    <span class="text-danger text-bold">*</span></label>
                                <select class="form-control select " id="partenaire" name="partenaire"  data-placeholder="choisissez les types" >
                                    <option >--Choisir--</option>
        
                                    @foreach ($type_programmes as  $value)
                                        <option data-icon="" value="{{$value->id_pat  }}">
                                           {{ $value->definition_pat }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="inputEmail4" class="text-black">Date de Début <span class="text-danger text-bold">*</span></label>
                            <input type="date" class="form-control" id="debut" name="debut" placeholder="Lieu" aria-describedby="code" placeholder="Saississez le code" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="inputEmail4" class="text-black">Date de fin<span class="text-danger text-bold">*</span></label>
                            <input type="date" class="form-control" id="fin" name="fin" placeholder="Lieu" aria-describedby="code" placeholder="Saississez le code" required>
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

<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./recommandation_edit/"
           //var lien1="../type_tache_edit/"
           var liena='./recommandation_update/'
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
                 $('#id').val(response.recommandation.id_rc);
                $('#code').val(response.recommandation.code_rc);
                $('#lieu').val(response.recommandation.region_concerne_rc);
                $('#intitule').val(response.recommandation.intitule_rc);
                $('#objectif').val(response.recommandation.objectif_rc);
                $('#partenaire').val(response.recommandation.partenaires_rc);
                $('#debut').val(response.recommandation.debut_rc);
                $('#fin').val(response.recommandation.fin_rc);
                 }
                            });
                            
    });

    });
</script>
@endsection
