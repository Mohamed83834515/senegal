@extends('dashboard.layouts.dashboard', ['title' => 'fiches dynamiques'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Suivi des résultats</span>
                <span class="breadcrumb-item active">fiches dynamiques</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Nouvel classeur
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection
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
@section('content')
<div class="card">
    <br>
    <div class="container">
        <div class="row" >
            @if (isset($calsseurs))
            @foreach ($calsseurs as $calsseur)
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab  item">

                   <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image"></i>
                            <p class="item-title">
                                    <h4> {{ $calsseur->libelle_cl}} </h4>
                                </p><!-- /.item-title -->
                                <p>
                                    <a href="{{ route('classeur.view', $calsseur->id_cl) }}" >    Ouvrir le classeur </a>
                                </p>
                                <a href="" class="icon-pencil7 text-info modaledit" id="{{ $calsseur->id_cl }}" data-toggle="tooltip" data-placement="bottom" title="Modifier ">
                                </a>

                                <a href="{{ route('classeur.destroy', $calsseur) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $calsseur->id_cl }}');">
                                </a>
                                <form id="delete-form-{{ $calsseur->id_cl }}" action="{{ route('classeur.destroy', $calsseur) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>

                    </div>
                </div>


            </div>
            @endforeach

            @else

           <p>Aucun Classeur</p>

            @endif
        </div>

    </div>

    <div id="modal_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" id="editform" action="" method="POST">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Ajouter un classeur</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Libellé  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="libellé" required>
                        </div>

                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Couleur  <span class="text-danger text-bold">*</span></label>
                            <input type="color" class="form-control" id="couleur" name="couleur" placeholder="couleur" required>
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
        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('classeur.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvel classeur</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-md-12 mb-12">
                                <label for="inputEmail4" class="text-black">Libellé  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="libelle" name="libelle" placeholder="libellé" required>
                            </div>

                            <div class="col-md-12 mb-12">
                                <label for="inputEmail4" class="text-black">Couleur  <span class="text-danger text-bold">*</span></label>
                                <input type="color" class="form-control" id="couleur" name="couleur" placeholder="couleur" required>
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

           var lien="./classeur_edit/"
           var liena='./classeur_update/'

            $('#editform').attr('action',liena+ids)
           $('#modal_edit').modal('show')
           //alert(page)
           $.ajax({

                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);

                $('#libelle').val(response.classeur.libelle_cl);
                $('#couleur').val(response.classeur.couleur_cl);
                 }
                            });

    });

    });
</script>
@endsection
