@extends('dashboard.layouts.dashboard', ['title' => 'Détails de la vente'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Paramatrages</a>
                <a href="#" class="breadcrumb-item">Localités</a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Inner container -->
<script>
    $(document).ready(function(){

        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./localite_edit/"
           var lien1="../localite_edit/"
           var liena='./localite_update/'
           var liena1='../localite_update/'
            var statut=$(this).attr("statut");

            if(statut==0)
            {
                var liens=lien
                var liensa=liena
            }
            else{
                var liens=lien1
                var liensa=liena1
            }
            $('#editform').attr('action',liensa+ids)
           $('#modal_edit').modal('show')
           //alert(page)
           $.ajax({

                url:liens+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                 $('#id').val(response.localite.id_localite);
                $('#code_reg').val(response.localite.code_localite);
                $('#nom_reg').val(response.localite.intitule_localite);
                $('#abrege_reg').val(response.localite.abreviation_localite);
                $('#couleur_reg').val(response.localite.code_localite_national);
                $('#id_niveau').val(response.localite.idniv_localite);
                $('#parent').val(response.localite.id_parent_localite);
                 }
                            });

    });

    $(document).on('click','.modaleditlocalite',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./niveaulocalite_edit/"
           var lien1="../niveaulocalite_edit/"
           var liena='./niveaulocalite_update/'
           var liena1='../niveaulocalite_update/'
            var statut=$(this).attr("statut");

            if(statut==0)
            {
                var liens=lien
                var liensa=liena
            }
            else{
                var liens=lien1
                var liensa=liena1
            }
            $('#editformniveau').attr('action',liensa+ids)
           $('#modal_categorie_lovalite').modal('show')
           //alert(page)
           $.ajax({

                url:liens+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                    $('#id_n').val(response.niveau.id_nvl);
                 $('#nom_n').val(response.niveau.libelle_nvl);
                $('#niveau_n').val(response.niveau.niveau);
                $('#taille_n').val(response.niveau.taille_nvl);
                 }
                            });

    });


    });
</script>
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    Liste des localités
                </h5>
                <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_categorie_lovalite">
                    <i class="icon-add mr-2"></i>
                    Ajouter une catégorie localité
                </a>
            </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class=" card-title nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">

                    @foreach ($niveau_localites as $item)
                       <li class="nav-item">
                        {{-- <a href="{{ route('localite.show', $item->niveau ) }}" class="nav-link" >
                            <i class="icon-menu7 mr-2"></i>{{ $item->libelle_nvl }}
                            {{-- <span class="badge bg-slate badge-pill ml-2">{{ count($localites) }}</span> -}}
                        </a> --}}
                    </li>
                    @endforeach




                </ul>

            </div>

            <div class="tab-content">

                <div class="tab-pane fade show active" id="region">
                    <div class="breadcrumb justify-content-center">
                        <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                            <i class="icon-add mr-2"></i>
                            Ajouter
                            @if (isset($PremierNiveau))
                                @if($id==1)
                                 {{ $PremierNiveau->libelle_nvl }}
                            @else
                            {{ $PremierNiveau->libelle_nvl }}
                            @endif

                            @endif

                        </a>
                    </div>
                        <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                            <thead>
                                <tr>

                                    <th>Code</th>
                                    @for ($i=1;$i<=$id;$i++)
                                    <th>
                                    @php

                                     $type = $niveau->where('id_nvl', '=', $i)->first();

                                    @endphp

                                    @if ( isset($type))

                                   {{ $type->libelle_nvl }}

                                    @endif


                                    </th>
                                    @endfor


                                    <th>@if($id==1)Abrégé@endif </th>
                                    <th>@if($id==1)
                                        Couleur
                                    @endif  </th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php

                                  if($cadr)
                                    {
                                        $type = $localites->where('idniv_localite', '=', $cadr->id_nvl);
                                    }


                            @endphp
                            @foreach ($type as $region)



                                    <tr>
                                        <td>{{ $region->code_localite }}</td>
                                        @if (isset($region->parent->parent->parent))
                                        <td>{{ $region->parent->parent->parent->intitule_localite }}</td>
                                        @endif
                                         @if(isset($region->parent->parent))
                                        <td>{{ $region->parent->parent->intitule_localite }}</td>
                                        @endif

                                        @if(isset($region->parent))
                                        <td>{{ $region->parent->intitule_localite }}</td>
                                        @endif

                                        <td>{{ $region->intitule_localite }}</td>
                                        <td>{{ $region->abreviation_localite }}</td>
                                        <td style="background-color: {{ $region->code_localite_national }} ">{{ $region->code_localite_national }}</td>
                                        <td class="text-center">
                                            <a href="" class="icon-pencil7 text-info modaledit" id="{{ $region->id_localite }}" statut="{{ $statut }}"  data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                            </a>
                                            <a href="{{ route('localite.destroy', $region) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $region->id_localite }}');">
                                            </a>
                                            <form id="delete-form-{{ $region->id_localite }}" action="{{ route('localite.destroy', $region) }}" method="POST" style="display: none;">
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
                                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Ajouter
                                            @if (isset( $PremierNiveau))
                                              @if($id==1)
                                            {{ $PremierNiveau->libelle_nvl }}
                                       @else
                                       {{ $PremierNiveau->libelle_nvl }}
                                            @endif

                                       @endif </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row mb-2">

                                            <div class="col-md-12 mb-2">
                                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                                <input type="text" class="form-control" id="code_reg" name="code_reg" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                                                <input type="hidden" class="form-control" id="code" value="{{ $id }}" name="id_niveau" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                                            </div>


                                            <div class="col-md-12">
                                                <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold"></span></label>
                                                <textarea type="text" class="form-control" id="nom_reg" name="nom_reg" aria-describedby="definition"></textarea>
                                            </div>

                                            @if($id==1)
                                                 <div class="col-md-12 mb-2">
                                                <label for="inputEmail4" class="text-black">Abréviation <span class="text-danger text-bold">*</span></label>
                                                <input type="text" class="form-control" id="abrege_reg" name="abrege_reg" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                                            </div>



                                               <div class="col-md-12">
                                                <label for="inputEmail4" class="text-black">Couleur <span class="text-danger text-bold"></span></label>
                                                <input type="color" class="form-control" id="couleur_reg" name="couleur_reg" aria-describedby="contact"></textarea>
                                              </div>

                                              @else
                                              <div class="col-md-12">
                                                <label for="inputEmail4" class="text-black">{{ $Avant->libelle_nvl }} <span class="text-danger text-bold"></span></label>
                                              <select class="form-control select @error('type') is-invalid @enderror" id="parent" name="parent" aria-describedby="type" data-placeholder="choisissez les types" data-fouc >

                                                @foreach ($Avant->localites as $typ)
                                                    <option data-icon="" value="{{$typ->id_localite}}"
                                                        {{ check_module_selected(old('type'), $typ->id_localite) ? 'selected' : '' }}>
                                                        {{ $typ->intitule_localite }}
                                                    </option>

                                                @endforeach
                                            </select>
                                        </div>
                                              @endif



                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <!-- Iconified modal -->
                            <div id="modal_iconified" class="modal fade" tabindex="-1">
                                <div class="modal-dialog">
                                    <form class="modal-content" method="POST" action="{{ route('localite.store') }}">
                                        @csrf
                                        @method('POST')

                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title"><i class="icon-design mr-2"></i> Ajouter
                                                @if (isset( $PremierNiveau))
                                                  @if($id==1)
                                                {{ $PremierNiveau->libelle_nvl }}
                                           @else
                                           {{ $PremierNiveau->libelle_nvl }}
                                                @endif

                                           @endif </h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="row mb-2">

                                                <div class="col-md-12 mb-2">
                                                    <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                                    <input type="text" class="form-control" id="code_reg" name="code_reg" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                                                    <input type="hidden" class="form-control" id="code" value="{{ $id }}" name="id_niveau" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold"></span></label>
                                                    <textarea type="text" class="form-control" name="nom_reg" aria-describedby="definition"></textarea>
                                                </div>

                                                @if($id==1)
                                                     <div class="col-md-12 mb-2">
                                                    <label for="inputEmail4" class="text-black">Abréviation <span class="text-danger text-bold">*</span></label>
                                                    <input type="text" class="form-control" id="code" name="abrege_reg" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                                                </div>



                                                   <div class="col-md-12">
                                                    <label for="inputEmail4" class="text-black">Couleur <span class="text-danger text-bold"></span></label>
                                                    <input type="color" class="form-control" name="couleur_reg" aria-describedby="contact"></textarea>
                                                  </div>

                                                  @else
                                                  <div class="col-md-12">
                                                    <label for="inputEmail4" class="text-black">{{ $Avant->libelle_nvl }} <span class="text-danger text-bold"></span></label>
                                                  <select class="form-control select @error('type') is-invalid @enderror" name="parent" aria-describedby="type" data-placeholder="choisissez les types" data-fouc >

                                                    @foreach ($Avant->localites as $typ)
                                                        <option data-icon="" value="{{$typ->id_localite}}"
                                                            {{ check_module_selected(old('type'), $typ->id_localite) ? 'selected' : '' }}>
                                                            {{ $typ->intitule_localite }}
                                                        </option>

                                                    @endforeach
                                                </select>
                                            </div>
                                                  @endif



                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                                            <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /iconified modal -->


                </div>

            </div>
        </div>
        <!-- /projet overview -->


        <div id="modal_categorie_lovalite" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau catégorie localité</h5>
                        <button type="button" class="close" placeholder="Nouveau catégorie localité" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-striped datatable-responsive" id="">
                            <thead>
                            <tr>
                                <th>Niveau</th>
                                <th>Categorie</th>
                                <th>Taille code</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if (isset($categorie))
                                          @foreach ($categorie as $categorie)
                                <tr>
                                    <td>{{ $categorie->niveau }}</td>
                                    <td>{{ $categorie->libelle_nvl}}</td>
                                    <td>{{ $categorie->taille_nvl}}</td>
                                    <td class="text-center">
                                        <a href="" class="icon-pencil7 text-info modaleditlocalite" id="{{ $categorie->id_nvl }}" statut="{{ $statut }}"  data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        </a>
                                        <a href="{{ route('niveaulocalite.destroy', $categorie) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $categorie->id_nvl }}');">
                                        </a>
                                        <form id="delete-form-{{ $categorie->id_nvl }}" action="{{ route('niveaulocalite.destroy', $categorie) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                                @endif

                            </tbody>
                        </table>
                        <br>
                        <form class="" method="POST" action="{{ route('niveaulocalite.store') }}">
                            @csrf
                            @method('POST')

                        <div class="row mb-2">
                            <div class="col-md-3 mb-2">
                                <label for="inputEmail5" class="text-black">Niveau <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="niveau_n" name="niveau_n" placeholder="niveau" required>
                            </div>
                            <input type="hidden" id="id_n" name="id_n">
                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Catégorie <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom_n" name="nom_n" placeholder="Catégorie" required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="inputEmail5" class="text-black">Taille <span class="text-danger text-bold">*</span></label>
                                <input type="number" class="form-control" id="taille_n" name="taille_n" placeholder="niveau" required>
                            </div>


                        </div>
                        <br>
                        <div class="modal-footer">
                            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                            <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                        </div>
                    </form>
                    </div>


            </div>
        </div>
        </div>

    </div>
    <!-- /left content -->



</div>
<!-- /inner container -->

@endsection
