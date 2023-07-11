@extends('dashboard.layouts.dashboard', ['title' => 'Groupe d\'utilisateur'])
@section('page_header')
<div class="page-header-content header-elements-md-inline">

    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil </a>
            <span class="breadcrumb-item">Documentation </span>
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active"> Groupe d'utilisateur</span>
         </div>
    </div>
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_profil" class="btn bg-teal-400">Créer un groupe</a>
    </div>
    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection
@section('content')

<br>
<div class="row">
    @foreach ($groupe as $grp)
    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
    <div class="card border border-dark">
        <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="card-info">
            <p class="card-text" style="font-size: 16px;color:#e79300;">Nombre d'utilisateur : {{$grp->nbr_user}}</p>
            <br>
            <div class="d-flex align-items-end mb-2">
                <a class="h4 card-title mb-0 me-2" href="#">
                 {{$grp->designation}}
                </a>
                <a href="#" class="icon-pencil7 p-1 text-info grp_edit" id="{{  $grp->id}}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier ">
                </a>
                <a href="{{ route('GroupeUser.destroy', $grp) }}" class="fas fa-trash p-1 text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $grp->id }}');">
                </a>
                <form id="logout-form-{{ $grp->id }}" action="{{ route('GroupeUser.destroy', $grp) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <small class="text-success"></small>
            </div>
            </div>
            <div class="card-icon">
            <span class="badge bg-label-dark rounded p-2">
                <i class="bx bx-archive bx-sm"></i>
            </span>
            </div>
        </div>
        </div>
    </div>
    </div>
    @endforeach
</div>

<div id="modal_profil" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('GroupeUser.store') }}">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvel Groupe</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Nom dossier  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" name="designation" placeholder="libellé du dossier" required>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                        <textarea  class="form-control" placeholder="commentaire" name="commentaire"  required>
                        </textarea>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Groupe d'utilisateur  <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control select52" id="select72" name="user_id[]" multiple  required>
                           @foreach ($user as $users)

                            <option value="{{$users->id}}">{{$users->nom}}</option>

                           @endforeach

                        </select>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Responsable du groupe <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control select52" id="select72" name="responsable"  required>
                            @foreach ($user as $users)

                            <option value="{{$users->id}}">{{$users->nom}}</option>

                           @endforeach
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

<div id="edit_gp" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" id="editgrp" method="POST" action="">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Modification groupe</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Nom dossier  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" id="designation" name="designation" placeholder="libellé du dossier" required>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                        <textarea  class="form-control" id="commentaire" placeholder="commentaire" name="commentaire"  required>
                        </textarea>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Groupe d'utilisateur  <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control select32" id="user" name="user_id[]" aria-describedby="user_id" multiple  required>


                        </select>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Responsable du groupe <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control select32" id="responsable" name="responsable"  required>
                            @foreach ($user as $users)

                            <option value="{{$users->id}}">{{$users->nom}}</option>

                           @endforeach
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

<script>
      $(document).ready(function() {

$(document).on('click','.grp_edit',function(){
      var id_grp=$(this).attr("id");
    //   alert(id_grp)
       var lien="./grp_edit/"
       var liena='./grp_update/'
        $('#editgrp').attr('action',liena+id_grp)
        $('#edit_gp').modal('show')
        $.ajax({
            url:lien+id_grp,
            method: "GET",
            success: function (response) {
                console.log(response);
            $('#designation').val(response.groupe_user.designation);
            $('#commentaire').val(response.groupe_user.commentaire);
            $('#responsable').val(response.groupe_user.responsable);
            var use=  response.user
            var plans = response.groupe_profil;
                        var html = "";
                       for(let i =0;i <plans.length;i++){
                            html += `
                            <option value="`+plans[i]['user_id']+`" selected>`+plans[i]['nom']+`</option>
                            `;
                        }
                        for(let i =0;i <use.length;i++){
                            html += `
                            <option value="`+use[i]['id']+`">`+use[i]['nom']+`</option>
                            `;
                        }
                        $("#user").html(html);



            $('.select32').select2({
            dropdownParent:  $('#edit_gp'),
            // multiple:'multiple',
            placeholder: 'Choissisez',
            });
            }

            });
});

})
    $('.select52').select2({
          dropdownParent:  $('#modal_profil'),
          placeholder: 'Choissisez',
          });
</script>

@section('script')
{{-- <script src="{{asset("/assets/js/forms-selects.js")}}"></script> --}}
<script src="{{asset("/assets/vendor/libs/select2/select2.js")}}"></script>
@endsection
@endsection
