@extends('dashboard.layouts.dashboard', ['title' => 'Conventions'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Programmation</span>
                <span class="breadcrumb-item active">Conventions</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 mr-2 mx-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter une convention
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
                <th>N°Réf.</th>
                <th>Convention</th>
                <th>Partenaire</th>
                <th>Montant (FCFA)</th>
                <th>Dates (Signature)</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programmes as $programme)
                <tr>
                    <td>{{ $programme->code_cvt }}</td>
                    <td>{{ $programme->reference_cvt }}</td>
                    <td>{{ $programme->intitule_cvt}}</td>
                    <td>{{ $programme->partenaire->code_pat}}</td>
                    <td>{{ $programme->montant_cvt}}</td>
                    <td>{{ $programme->date_signature_cvt}}</td>
                    <td class="text-center">
                        <a href="{{ route('convention.show', $programme) }}" class="icon-eye8 text-brown-800 mr-2" data-toggle="tooltip" data-placement="bottom" title="Visualiser">
                        </a>
                        <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $programme->id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier hhhh">
                        </a>
                       
                        <a href="{{ route('convention.destroy', $programme) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $programme->id }}');">
                        </a>
                        <form id="delete-form-{{ $programme->id }}" action="{{ route('convention.destroy', $programme) }}" method="POST" style="display: none;">
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
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Modification convention</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-6 mb-2">
                            <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Nº Réf <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="ref" name="ref" aria-describedby="sigle">
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Intitulé/Désignation  <span class="text-danger text-bold"></span></label>
                            <input type="text" class="form-control" id="intitule" name="intitule" aria-describedby="definition">
                        </div>
                         
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Partenaire <span class="text-danger text-bold"></span></label>
                            <select class="form-control" id="type_partenaire" name="type_partenaire" aria-describedby="produit" ng-init="initialiseSelect()">

                                @foreach ($type_programmes as $produit)
                                <option 
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Date signature <span class="text-danger text-bold"></span></label>
                            <input type="date" id="date_signature" name="date_signature" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label>Montant</label>
                            <input type="number"  id="montant" name="montant" placeholder="200000" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Date début <span class="text-danger text-bold"></span></label>
                            <input type="date" id="date_debut" name="date_debut" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Date fin <span class="text-danger text-bold"></span></label>
                            <input type="date" id="date_fin" name="date_fin" class="form-control" required>
                        </div>
                            

                           <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Champ d'application <span class="text-danger text-bold"></span></label>
                            <textarea type="text" class="form-control" id="champ" name="champ" aria-describedby="definition"></textarea>
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
                <form class="modal-content" method="POST" action="{{ route('convention.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvelle convention</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Nº Réf <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="ref" aria-describedby="sigle">
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Intitulé/Désignation  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="intitule" aria-describedby="definition">
                            </div>
                             
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Partenaire <span class="text-danger text-bold"></span></label>
                                <select class="form-control" name="type_partenaire" aria-describedby="produit" ng-init="initialiseSelect()">

                                    @foreach ($type_programmes as $produit)
                                    <option 
                                        value="{{ $produit->id_pat }}"
                                    >{{ $produit->sigle_pat }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date signature <span class="text-danger text-bold"></span></label>
                                <input type="date" name="date_signature" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label>Montant</label>
                                <input type="number" name="montant" placeholder="200000" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date début <span class="text-danger text-bold"></span></label>
                                <input type="date" name="date_debut" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Date fin <span class="text-danger text-bold"></span></label>
                                <input type="date" name="date_fin" class="form-control" required>
                            </div>
                                

                               <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Champ d'application <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="champ" aria-describedby="definition"></textarea>
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

           var lien="./convention_edit/"
           //var lien1="../type_tache_edit/"
           var liena='./convention_update/'
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
                $('#code').val(response.convention.code_cvt);
                $('#ref').val(response.convention.reference_cvt);
                $('#intitule').val(response.convention.intitule_cvt);
                $('#type_partenaire').val(response.convention.idpat_cvt);
                $('#date_signature').val(response.convention.date_signature_cvt);
                $('#montant').val(response.convention.montant_cvt);
                $('#date_debut').val(response.convention.date_debut_cvt);
                $('#date_fin').val(response.convention.date_fin_cvt);
                $('#champ').val(response.convention.champ_app_cvt);
                 }
                            });
                            
    });

    });
</script>
@endsection
