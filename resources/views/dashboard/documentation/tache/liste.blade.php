@extends('dashboard.layouts.dashboard', ['title' => 'Tache'])
@section('page_header')
<div class="page-header-content header-elements-md-inline">

    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil </a>
            <span class="breadcrumb-item">Documentation </span>
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active"> Tache ({{$dossier->libelle_dossier}})</span>
         </div>
    </div>
    @foreach ($doss as $doss)
    @if ($doss->responsable ==  Auth::user()->id)
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_tache" class="btn bg-teal-400">Créer une tâche</a>
    </div>
    @endif
    @endforeach


    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection
@section('content')
<div class="container ">
        {{-- @if (isset($fichier))
        @foreach ($fichier as $files)--}}

        @if (isset($tache))
                <div class="">
                  <div class="row">
                    @foreach ($tache as $tch)
                    @if ($tch->user_id == Auth::user()->id || $tch->responsable== Auth::user()->id || $tch->status == "validé" )
                    <div class="col-lg-3 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="{{asset('assets')}}/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <p>{{$tch->status}}</p>
                            @if ($doss->responsable ==  Auth::user()->id)
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a href="#" class="icon-pencil7 dropdown-item text-info tache_edit" id="{{$tch->id}}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier le nom">
                                    Modifier
                                </a>
                                <a href="{{ route('tache.destroy', $tch->id) }}" class="icon-trash dropdown-item text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $tch->id}}');">
                               Supprimer
                                </a>
                                <form id="delete-form-{{ $tch->id }}" action="{{ route('tache.destroy', $tch->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                {{-- <a class="dropdown-item" href="javascript:void(0);">Modifier</a>
                                <a class="dropdown-item" href="javascript:void(0);">Supprimer</a> --}}
                              </div>
                            </div>
                            @endif
                          </div>
                          <div class="text-center"><a href="{{route('tache.show', $tch->id)}}">
                          <h3 class="card-title text-nowrap mb-1">{{$tch->libelle_tch}}</h3></a>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                            <a href="#" class="text-success info" id="{{$tch->id}}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier le nom">
                                Plus d'info
                            </a>
                          </small>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>

                @else
                <p>Aucune tache</p>
                @endif
</div>
<div id="modal_tache" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{route('tache.store')}}">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvelle Tache</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                <input type="hidden" class="form-control" value="{{$dossier->id_doss}}" name="dossier" placeholder="" required>
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Nom de la tache  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" name="libelle_tch" placeholder="libellé de la tâche" required>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                        <textarea  class="form-control" name="commentaire_tache"  required>
                        </textarea>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Status  <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control" name="status" required>
                            <option value="nouvelle">nouvelle</option>
                            <option value="non valide">Non Validé</option>
                            <option value="validé">Validé</option>
                        </select>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Assigné A  <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control" name="user_id"  required>
                        @foreach ($users as $users)
                        <option value="{{$users->user_id}}">{{$users->nom}}</option>
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
<div id="edit_tache" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" id="edittch" action="">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Modification Tache</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Nom de la tache  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" id="libelle_tch" name="libelle_tch" placeholder="libellé de la tâche" required>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                        <textarea  class="form-control" id="commentaire_tache" name="commentaire_tache"  required>
                        </textarea>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Status  <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control" id="status" name="status" required>
                            <option value="nouvelle">nouvelle</option>
                            <option value="non valide">Non Validé</option>
                            <option value="validé">Validé</option>
                        </select>
                        {{-- <input type="text" class="form-control" id="status" name="status" placeholder="status" required> --}}
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Assigné A  <span class="text-danger text-bold">*</span></label>
                        <select  class="form-control" name="user_id" id="user_id"  required>
                        @foreach ($user as $user)
                        <option value="{{$user->user_id}}">{{$user->nom}}</option>
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

<div id="edit_tachee" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" id="edittch" action="#">


            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-md-12 mb-12">
                        <input type="text" class="form-control" id="libelle" name="libelle_tch" placeholder="libellé de la tâche" readonly>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <textarea  class="form-control" id="commentaire" name="commentaire_tache"  readonly>
                        </textarea>
                      </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <input type="text" class="form-control" id="statu" name="status" placeholder="status" readonly>
                      </div>
                </div>


            </div>

            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {

       $(document).on('click','.tache_edit',function(){
             var id_tch=$(this).attr("id");
                // alert (id_tch)
               $('#edittch').attr('action',"{{url('dashboard/documentation/tache_update')}}"+'/'+id_tch)
               $('#edit_tache').modal('show')
               $.ajax({
                   url: "{{url('dashboard/documentation/tache_edit')}}"+'/'+id_tch,
                   method: "GET",
                   success: function (response) {
                       console.log(response);
                   $('#libelle_tch').val(response.tache.libelle_tch);
                   $('#commentaire_tache').val(response.tache.commentaire_tache);
                   $('#user_id').val(response.tache.user_id);
                   $('#status').val(response.tache.status);

                   }

                });
       });

       $(document).on('click','.info',function(){
             var id_tch=$(this).attr("id");
                // alert (id_tch)
               $('#edit_tachee').modal('show')
               $.ajax({
                   url: "{{url('dashboard/documentation/tache_edit')}}"+'/'+id_tch,
                   method: "GET",
                   success: function (response) {
                       console.log(response);
                   $('#libelle').val(response.tache.libelle_tch);
                   $('#commentaire').val(response.tache.commentaire_tache);
                   $('#user').val(response.tache.user_id);
                   $('#statu').val(response.tache.status);

                   }

                });
       });

    })
</script>
@endsection
