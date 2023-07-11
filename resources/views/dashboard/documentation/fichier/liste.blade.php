@extends('dashboard.layouts.dashboard', ['title' => 'Fichiers'])
@section('page_header')
<div class="page-header-content header-elements-md-inline">

    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil </a>
            <span class="breadcrumb-item">Documentation </span>
            <span class="breadcrumb-item">Tache </span>
            @foreach ($tache as $tache)
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active">Assigné à : ({{$tache->nom}})</span>
         </div> <br>
         {{-- <span class="breadcrumb-item">Responsable de la tache : ({{$tache->nom}}) </span> --}}
            @endforeach
    </div>
    @if ($tache->user_id == Auth::user()->id)
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_fichier" class="btn bg-teal-400">Créer un fichier</a>
    </div>
    @endif

    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection

@section('content')
<div class="container ">
    <br>
    <div class="card">
        <table class="table table-striped datatable-responsive datatable-header-basic">
         <thead>
        <tr>
         <td style="color: black">N° </td>
         <td style="color: black">Le nom du fichier </td>
         <td style="color: black">Commmentaire </td>
         <td style="color: black">Fichier </td>
         <td style="color: black">Tache </td>
         <td style="color: black"> Date d'ajout</td>
         <td style="color: black">Action </td>
         </tr>

        </thead>
            <tbody>

                @foreach ($fichier as $files)
                <tr>
                    <td>{{$id ++}}</td>
                    <td>{{$files->libelle_fichier}}</td>
                    <td>{{$files->commentaire}}</td>
                    <td>{{$files->fichier}}</td>
                    <td>{{$files->status}}</td>
                    <td>{{date('d/m/Y à H:i:s ', strtotime($files->created_at))}}</td>
                     <td> {{--<a href="{{ route('download', ['filename' => $files->fichier])}}" class="text-primary icon-download" title="Télécharger le fichier"></a> <br>
                        <a href="#" class="icon-pencil7 text-dark fichier_edit" id="{{$files->id_fich}}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier le fichier">--}}
                        @if ( $files->user_id  ==  Auth::user()->id )
                            <a href="{{ route('fichier.destroy', $files->id_fich) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $files->id_fich }}');">
                            </a>
                            <form id="delete-form-{{ $files->id_fich }}" action="{{ route('fichier.destroy', $files->id_fich) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endif
                        <a href="#" class="icon-pencil7 text-info fich_edit" id="{{$files->id_fich}}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier le nom">
                        </a>
                        <a href="{{ route('download', ['filename' => $files->fichier])}}" class="text-primary icon-download" title="Télécharger le fichier"></a> <br>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    {{-- <div class="row">

        @if (isset($fichier))
        @foreach ($fichier as $files)
        <div class="col-lg-2 col-md-2 col-sm-10 col-xs-10 Services-tab  item">
                <div class="folded-corner">
                    <div class="text">
                        <p class="item-title">
                            {{ $files->libelle_fichier}}
                        </p><!-- /.item-title -->
                        <i class="fa fa-file fa-5x fa-icon-image"></i>


                    </div>
                    <div class="service_tab_1">
                        <div class="text">
                            <a href="{{ route('download', ['filename' => $files->fichier])}}" class="text-primary" title="Télécharger le fichier">Télécharger</a> <br>
                            <a href="#" class="icon-pencil7 text-dark fichier_edit" id="{{$files->id_fich}}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier le fichier">
                            </a>
                            <a href="#" class="icon-pencil7 text-info fich_edit" id="{{$files->id_fich}}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier le nom">
                            </a>
                            {{-- @if ( $files->responsable  ==  Auth::user()->id )
                            <a href="{{ route('fichier.destroy', $files->id_fich) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $files->id_fich }}');">
                            </a>
                            <form id="delete-form-{{ $files->id_fich }}" action="{{ route('fichier.destroy', $files->id_fich) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endif -}}
                        </div>
                    </div>

                </div>
            </a>


        </div>

        @endforeach

        @else

        <p>Aucun fichier 🤷‍♂️</p>

        @endif
    </div> --}}

</div>
<div id="modal_fichier" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{route('create.fichier')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvel Fichier</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                {{-- @foreach ($tache as $tache) --}}
                  <input type="hidden" class="form-control"  name="id_dossier" placeholder="libellé du fichier" required>
                  <input type="hidden" class="form-control" value="{{$tache->id}}" name="tache_id" placeholder="libellé du fichier" required>
                {{-- @endforeach --}}
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Nom du fichier  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" name="libelle_fichier" placeholder="libellé du fichier" required>
                    </div>

                </div>
                {{-- <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                        <textarea  class="form-control" placeholder="commentaire" name="commentaire"  required>
                        </textarea>
                      </div>
                </div> --}}
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Fichier  <span class="text-danger text-bold">*</span></label>
                        <input type="file" class="form-control" name="fichier" placeholder="fichier" required>
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

<div id="edit_fichier" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" id="editfich" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
       {{ method_field('PATCH') }}

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Modification fichier</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Nom du fichier  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" id="libelle_fichier" name="libelle_fichier" placeholder="libellé du fichier" required>
                    </div>

                </div>

                @if ($tache->responsable == Auth::user()->id)
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                        <textarea  class="form-control" placeholder="commentaire" id="commentaire" name="commentaire"  required>
                        </textarea>
                      </div>
                </div>
                {{-- <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control val" placeholder="validation"  name="validation"  required>
                            <option value="non validé">Non validé</option>
                            <option value="validé">Validé</option>
                        </select>
                      </div>
                </div> --}}
                @endif
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
            </div>
        </form>
    </div>
</div>

<div id="edit_fichier1" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" id="editfichier" action="" enctype="multipart/form-data">
            {{ csrf_field() }}
       {{ method_field('PATCH') }}

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvel Fichier</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Fichier  <span class="text-danger text-bold">*</span></label>
                        <input type="file" class="form-control"  name="fichier" placeholder="fichier" required>
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
<script>
    $(document).ready(function() {

       $(document).on('click','.fich_edit',function(){
             var id_fich=$(this).attr("id");
            // //   var lien="{{url('fichier_edit/')}}"
            //   var liena='./fichier_update/'
               $('#editfich').attr('action',"{{url('dashboard/documentation/fichier_update')}}"+'/'+id_fich)
               $('#edit_fichier').modal('show')
               $.ajax({
                   url: "{{url('dashboard/documentation/fichier_edit')}}"+'/'+id_fich,
                   method: "GET",
                   success: function (response) {
                       console.log(response);
                   $('#libelle_fichier').val(response.Fichier.libelle_fichier);
                   $('#commentaire').val(response.Fichier.commentaire);
                   $('#fichier').val(response.Fichier.fichier);

                   }

                });
       });


       $(document).on('click','.fichier_edit',function(){
             var id_fich=$(this).attr("id");
            // //   var lien="{{url('fichier_edit/')}}"
            //   var liena='./fichier_update/'
               $('#editfichier').attr('action',"{{url('dashboard/documentation/update_file')}}"+'/'+id_fich)
               $('#edit_fichier1').modal('show')
       });

       $(document).on('change','.val',function(){
         var val="une fois le fichier validé, il n'est plus modifiable"
            alert(val)
       })

    })
</script>
@endsection
