@extends('dashboard.layouts.dashboard', ['title' => 'Dossiers'])
@section('page_header')
<div class="page-header-content header-elements-md-inline">

    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil </a>
            <span class="breadcrumb-item">Documentation </span>
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active"> Dossier</span>
         </div>
    </div>
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_dossier" class="btn bg-teal-400">Créer un dossier</a>
    </div>
    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection
@section('content')
<style type="text/css">


    /*

    */

    h3 {
      color: rgba(0 0 0 / 90%);
    }
    .text{
        color: rgba(0 0 0 / 90%);
        text-align: center;
    }


    .folded-corner:hover .text{
        visibility: visible;
        color: #000000;;
    }
    .Services-tab{
        margin-top:20px;
        margin-bottom:20px;


    }

    /*
      nav link items
    */
    .folded-corner{
      padding: 25px 25px;
      position: relative;
      font-size: 90%;
      text-decoration: none;
      color: #999;
      background: transparent;
      transition: all ease .5s;
      border: 1px solid rgba(219 162 38);
    }
    .folded-corner:hover{
        background-color: rgba(94 185 83);
    }

    /*
      paper fold corner
    */

    .folded-corner:before {
      content: "";
      position: absolute;
      top: 0;
      right: 0;
      border-style: solid;
      border-width: 0 0px 0px 0;
      border-color: #ddd #000;
      transition: all ease .3s;
    }

    /*
      on li hover make paper fold larger
    */
    .folded-corner:hover:before {
        background-color: #D00003;
      border-width: 0 50px 50px 0;
      border-color: #eee #000;

    }

    .service_tab_1{
        background-color: #f5f5f5;
    }
    .service_tab_1:hover .fa-icon-image{
        color: #000;
        transform: rotate(360deg) scale(1.5);
    }


    .fa-icon-image{
        color: rgba(219 162 38);
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        font-weight: normal;
        line-height: 1;
        font-size-adjust: none;
        font-stretch: normal;
        -moz-font-feature-settings: normal;
        -moz-font-language-override: normal;
        text-rendering: auto;
        transition: all .65s linear 0s;
        text-align: center;
        transition: all 1s cubic-bezier(.99,.82,.11,1.41);
    }

    .custom-table{border-collapse:collapse;width:100%;border:solid 1px #c0c0c0;font-family:open sans;font-size:12px}
                .custom-table th,.custom-table td{text-align:left;padding:8px;border:solid 1px #c0c0c0}
                .custom-table th{color:#000080}
                .custom-table tr:nth-child(odd){background-color:#f7f7ff}
                .custom-table>thead>tr{background-color:#dde8f7!important}
                .tbtn{border:0;outline:0;background-color:transparent;font-size:13px;cursor:pointer}
                .toggler{display:none}
                .toggler1{display:table-row;}
                .custom-table a{color: #0033cc;}
                .custom-table a:hover{color: #f00;}
                .page-header{background-color: #eee;}

                .trimestre-selectionne {
      background-color: green;
      color: white;
    }

    .trimestre-non-selectionne {
      background-color: red;
      color: white;
    }


    </style>
     <div class="container">
        <div class="row" >
            @if (isset($Dossier))
            @foreach ($Dossier as $dossiers)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab  item">

                   <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image"></i>
                             <p class="item-title">
                                    <h4> {{ $dossiers->libelle_dossier}} </h4>
                                </p>
                                <p>
                                    <a href="{{ route('dossier.show', $dossiers->id_doss) }}" >    Ouvrir le dossier </a>
                                </p>
                                <a href="#" class="icon-pencil7 text-info doss_edit" id="{{  $dossiers->id_doss }}"  data-toggle="tooltip" data-placement="bottom"  title="Modifier ">
                                </a>

                                <a href="{{ route('dossier.destroy', $dossiers->id_doss) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $dossiers->id_doss }}');">
                                </a>
                                <form id="delete-form-{{ $dossiers->id_doss }}" action="{{ route('dossier.destroy', $dossiers->id_doss) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                    </div>
                </div>


            </div>
            @endforeach

            @else

           <p>Aucun Dossier</p>

            @endif
        </div>

    </div>
    <div id="modal_dossier" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('create.dossier') }}">
                @csrf
                @method('POST')

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvel Dossier</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Nom dossier  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" name="libelle_dossier" placeholder="libellé du dossier" required>
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
                            <select  class="form-control" id="select72" name="id_grp_user"  required>
                                @foreach ($groupes as $grp)
                                    <option value=""  selected></option>
                                    <option value="{{$grp->id}}">{{$grp->designation}}</option>
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

    <div id="edit_mod" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" id="editdoss" action="">
                {{ csrf_field() }}
               {{ method_field('PATCH') }}

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvel Dossier</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Nom dossier  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="libelle_dossier" name="libelle_dossier" required>
                        </div>

                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Commentaire  <span class="text-danger text-bold">*</span></label>
                            <textarea  class="form-control" id="commentaire" name="commentaire"  required>
                            </textarea>
                          </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Groupe d'utilisateur  <span class="text-danger text-bold">*</span></label>
                            <select  class="form-control select32" id="groupe_id" name="id_grp_user"  required>
                                @foreach ($groupes as $grp)
                                    <option value="{{$grp->id}}">{{$grp->designation}}</option>
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

            $(document).on('click','.doss_edit',function(){
                  var id_doss=$(this).attr("id");
                //   alert(id_doss)
                   var lien="./dossier_edit/"
                   var liena='./dossier_update/'
                    $('#editdoss').attr('action',liena+id_doss)
                    $('#edit_mod').modal('show')
                    $.ajax({
                        url:lien+id_doss,
                        method: "GET",
                        success: function (response) {
                            console.log(response);
                        $('#libelle_dossier').val(response.Dossier.libelle_dossier);
                        $('#commentaire').val(response.Dossier.commentaire);
                        $('#groupe_id').val(response.Dossier.id_grp_user);
                        $('#select32').select2({
                        dropdownParent:  $('#edit_mod'),
                        placeholder: 'Choissisez',
                        });
                        }

                        });
            });

         })
         $('#select72').select2({
        dropdownParent:  $('#modal_dossier'),
        placeholder: 'Choissisez',
         });
    </script>

@section('script')
{{-- <script src="{{asset("/assets/js/forms-selects.js")}}"></script> --}}
<script src="{{asset("/assets/vendor/libs/select2/select2.js")}}"></script>
@endsection
@endsection
