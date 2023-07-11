@extends('dashboard.layouts.dashboard', ['title' => 'Type activité'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Programmation</span>
                <span class="breadcrumb-item active">Type d'activité</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2 mr-2 mx-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter un type d'activité
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

                <th>Code</th>
                <th>Types d'activités</th>
                <th>Tâches</th> 
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programmes as $programme)
                <tr>
                    <td>{{ $programme->code_tpa }}</td>
                    <td>{{ $programme->libelle_tpa }}</td>
                    <td>
                        @foreach ($orders as $nbre)

                        @if($programme->id_tpa == $nbre->type_activite_pt)
                            @php
                            $nbr= $nbre->total_tache
                                
                            @endphp
                            @if(!$nbr)
                                0 tâches
                            @else
                               {{ $nbr }} tâche(s) 
                            @endif
                         
                        
                            
                        @endif
                        
                         
                        @endforeach
                    
                    </td> 
                    <td class="text-center">
                        <a href="{{ route('type_activite.show', $programme->id_tpa) }}" class="icon-eye8 text-brown-800 mr-2" data-toggle="tooltip" data-placement="bottom" title="Visualiser">
                        </a>
                        <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $programme->id_tpa }}"  data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                        <a href="{{ route('type_activite.destroy', $programme) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $programme->id_tpa }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $programme->id_tpa }}" action="{{ route('type_activite.destroy', $programme) }}" method="POST" style="display: none;">
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
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouveau type d'activité</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-12 mb-2">
                            <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                        </div>

                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Intitulé/Désignation  <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="intitule" name="intitule" aria-describedby="definition">
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
                <form class="modal-content" method="POST" action="{{ route('type_activite.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouveau type d'activité</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
 
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Intitulé/Désignation  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="intitule" aria-describedby="definition">
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link"  data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
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

           var lien="./type_activite_edit/"
           //var lien1="../type_tache_edit/"
           var liena='./type_activite_update/'
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
                 $('#id').val(response.type.id_tpa);
                $('#code').val(response.type.code_tpa);
                $('#intitule').val(response.type.libelle_tpa);
                 }
                            });
                            
    });

    });
</script>
@endsection
