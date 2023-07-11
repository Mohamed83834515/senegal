@extends('dashboard.layouts.dashboard', ['title' => 'Détails de la vente'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Cadre résultat</a>
                <a href="#" class="breadcrumb-item">Cadre logique</a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
            <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_niveau">
                    <i class="icon-add mr-2"></i>
                    Gestion des niveaux
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
           <!--  <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    Le cadre stratégique par programme
                </h5>
               
            </div> -->

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class=" card-title nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">

                    @foreach ($niveau_cadres as $item)
                       <li class="nav-item">
                        <a onclick="" href="{{ route('cadre_logique.show', $item->niveau_ncl ) }}" class="nav-link" >
                            <i class="icon-menu7 mr-2"></i>{{ $item->libelle_ncl }}
                        </a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                    <a href="#" class="btn bg-teal-400 btn-block mb-1 mt-1" data-toggle="modal" data-target="#modal_iconified">
                  
                    @if($cadr) <i class="icon-add mr-2"></i>
                              Ajouter @if(isset($PremierNiveau)) {{ $PremierNiveau->libelle_ncl }}@endif  
                          
                            @endif
                </a>
                    </li>
                </ul>
                
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="region">
                   
                    
                    @if($cadr)
                        
                   <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                        <thead>
                        <tr>
                            <th>Code</th>
                            @php
                                $type = $niveau->where(
                                    'niveau_ncl', '=', $id-1,
                                    'idprg_ncl', '=', session('id_programme')
                                    )->first();
                                $type2 = $niveau->where(
                                    'niveau_ncl', '=', $id,
                                    'idprg_ncl', '=', session('id_programme')
                                    )->first();
                               
                                 
                            @endphp
                            @if (isset($type))
                            <th> {{ $type->libelle_ncl }}</th>    
                            @endif
                            @if (isset($type2))
                            <th> {{ $type2->libelle_ncl }}</th>
                            @endif
                            


                            @if($id==1)
                            <th>
                                    Coût
                                </th>
                                @endif  
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        @php
                        // dd($cadr->id_ncl);
                        if($cadr)
                        {
                             $type = $cadre_logique->where(
                                'id_niv_cl', '=', $cadr->id_ncl,
                                'idprg_cl', '=', session('id_programme')
                            );
                        }
                             
                        @endphp
                        @if($type)
                            
                      @foreach ($type as $region)



                            <tr>
                                <td>{{ $region->code_cl }}</td>
                                @if(isset($region->parent))
                                    <td>{{ $region->parent->intitule_cl }}</td>
                                @endif

                                <td>{{ $region->intitule_cl }}</td>
                                @if($id==1)
                                <td>{{ $region->cout_cl }}</td>
                                    @endif 
                                <td class="text-center">
                                    <a href="" class="icon-pencil7 text-info modaledit" id="{{ $region->id_cl }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                    
                                    </a>
                                    <a href="{{ route('cadre_logique.destroy', $region) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $region->id_cl }}');">
                                    </a>
                                    <form id="delete-form-{{ $region->id_cl }}" action="{{ route('cadre_logique.destroy', $region) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            
                        @endif
                        
                        </tbody>
                    </table>
                        
                    @endif
                    




                </div>

            </div>
        </div>
        {{-- Edit modal --}}
       
        <div id="modal_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editform" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                   
                    @if ($id>0)
                    @php
                        $id=$id;
                    @endphp 
                    @else
                    @php
                        $id=1;
                    @endphp 
                    @endif
                        
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Ajouter  @if($id==1)
                            @if (isset($PremierNiveau))
                            {{ $PremierNiveau->libelle_ncl }}
                            @endif
                                
                            @else
                            @if (isset($PremierNiveau))
                            {{ $PremierNiveau->libelle_ncl }}
                            @endif
                            @endif </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="code" aria-describedby="code" placeholder="Saississez le code" required>
                                <input type="hidden" class="form-control" id="niveau" value="@if($PremierNiveau)
                                    
                               
                                    {{ $PremierNiveau->id_ncl}}
                                @endif " name="niveau" placeholder="Code" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">
                                    @if (isset($PremierNiveau))
                                    {{ $PremierNiveau->libelle_ncl }} 
                                @endif
                                 <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="intitule" id="intitule" aria-describedby="definition"></textarea>
                            </div>

                            @if($id==1)
                            <div class="col-md-6">
                             <label for="inputEmail4" class="text-black">Coût <span class="text-danger text-bold"></span></label>
                             <input type="number" class="form-control" name="cout" id="cout" aria-describedby="contact"></textarea>
                           </div>
                           @else
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="text-black">
                                        @if (isset($Avant))
                                        {{ $Avant->libelle_ncl }}
                                        @endif 
                                        <span class="text-danger text-bold"></span></label>
                                    <select class="form-control select " name="parent" id="parent" data-placeholder="choisissez les types"  >
                                        
                                        @foreach ($cadres as $typ)
                                        @if ($typ->id_niv_cl==$Avant->id_ncl)
                                        <option data-icon="" value="{{$typ->id_cl}}"
                                            {{ check_module_selected(old('type'), $typ->id_cl) ? 'selected' : '' }}>
                                            {{ $typ->intitule_cl }}
                                        </option>
                                        @endif
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
        
        {{-- end Edit modal --}}
        <!-- /projet overview -->
        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('cadre_logique.store') }}">
                    @csrf
                    @method('POST')
                   
                    @if ($id>0)
                    @php
                        $id=$id;
                    @endphp 
                    @else
                    @php
                        $id=1;
                    @endphp 
                    @endif
                        
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Ajouter  @if($id==1)
                            @if (isset($PremierNiveau))
                            {{ $PremierNiveau->libelle_ncl }}
                            @endif
                                
                            @else
                            @if (isset($PremierNiveau))
                            {{ $PremierNiveau->libelle_ncl }}
                            @endif
                            @endif </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="code" aria-describedby="code" placeholder="Saississez le code" required>
                                <input type="hidden" class="form-control" id="niveau" value="@if($PremierNiveau)
                                    
                             {{ $PremierNiveau->id_ncl}}
                                @endif " name="niveau" placeholder="Code" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">
                                    @if (isset($PremierNiveau))
                                    {{ $PremierNiveau->libelle_ncl }} 
                                @endif
                                 <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="intitule" id="intitule" aria-describedby="definition"></textarea>
                            </div>

                            @if($id==1)
                            <div class="col-md-6">
                             <label for="inputEmail4" class="text-black">Coût <span class="text-danger text-bold"></span></label>
                             <input type="number" class="form-control" name="cout" id="cout" aria-describedby="contact"></textarea>
                           </div>
                           @else
                                <div class="col-md-12">
                                    <label for="inputEmail4" class="text-black">
                                        @if (isset($Avant))
                                        {{ $Avant->libelle_ncl }}
                                        @endif 
                                        <span class="text-danger text-bold"></span></label>
                                    <select class="form-control select " name="parent" id="parent" data-placeholder="choisissez les types"  >
                                        
                                        @foreach ($cadres as $typ)
                                        @if ($typ->id_niv_cl==$Avant->id_ncl)
                                        <option data-icon="" value="{{$typ->id_cl}}"
                                            {{ check_module_selected(old('type'), $typ->id_cl) ? 'selected' : '' }}>
                                            {{ $typ->intitule_cl }}
                                        </option>
                                        @endif
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
        <div id="modal_niveau" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau niveau</h5>
                        <button type="button" class="close" placeholder="Nouveau catégorie localité" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-striped datatable-responsive" id="">
                            <thead>
                            <tr>
                                <th>Niveau</th>
                                <th>Libellé</th>
                                <th>Type</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categorie as $categorie)

                                <tr>
                                    <td>{{ $categorie->niveau_ncl }}</td>
                                    <td>{{ $categorie->libelle_ncl}}</td>
                                    <td>
                                       @if($categorie->id_type_ncl==1)
                                        @php
                                            echo "Impact";
                                        @endphp
                                    
                                       @endif
                                       @if($categorie->id_type_ncl==2)
                                       @php
                                           echo "Effets";
                                       @endphp
                                   
                                      @endif
                                      @if($categorie->id_type_ncl==3)
                                        @php
                                            echo "Produits";
                                        @endphp
                                    
                                       @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="" class="icon-pencil7 text-info modaleditniveau" id="{{ $categorie->id_ncl }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        </a>
                                        <a href="{{ route('niveau_cadre_logique.destroy', $categorie) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $categorie->id_ncl }}');">
                                        </a>
                                        <form id="delete-form-{{ $categorie->id_ncl }}" action="{{ route('niveau_cadre_logique.destroy', $categorie) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                       
                            <form class="" method="POST" action="{{ route('niveau_cadre_logique.store') }}">
                                @csrf
                                @method('POST')
                        
                        <div class="row mb-2">
                            <div class="col-md-3 mb-2">
                                <input type="text" class="form-control" id="niveau_ncl" name="niveau_ncl" placeholder="niveau" required>
                            </div>
                            <div class="col-md-6 mb-2">
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Catégorie" required>
                            </div>
                          <input type="hidden" id="id" name="id">
                            <div class="col-md-3 mb-2">
                                <select name="type" id="type" class="form-control" aria-="" ng-init="initialiseSelect()">
                                    <option  disabled selected>--Choisir--</option>
                                    <option  value="1" >Impacts</option>
                                    <option  value="2" >Effets</option>
                                    <option value="3">Produits</option>
                                    {{-- @foreach ($type_cadres as  $value)
                                        <option data-icon="" value="{{$value->id_tcl }}"
                                            {{ check_module_selected(old('type'), $value->id_tcl ) ? 'selected' : '' }}>
                                            {{ $value->type_tcl }}
                                        </option>
                                    @endforeach --}}
                                </select>
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
        <div id="modal_type" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau type</h5>
                        <button type="button" class="close"  data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-striped datatable-responsive" id="">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Type</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($type_cadres as $categorie)
                                <tr>
                                    <td>{{ $categorie->id_tcl }}</td>
                                    <td>{{ $categorie->type_tcl}}</td>

                                    <td class="text-center">
                                        <a href="" class="icon-pencil7 text-info modaledittype" id="{{ $categorie->id_tcl }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        </a>
                                        <a href="{{ route('type_cadre_logique.destroy', $categorie) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $categorie->id_tcl }}');">
                                        </a>
                                        <form id="delete-form-{{ $categorie->id_tcl }}" action="{{ route('type_cadre_logique.destroy', $categorie) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <form  method="POST" action="{{ route('type_cadre_logique.store') }}">
                            @csrf
                            @method('POST')
                        <div class="row mb-12">
                            <div class="col-md-12 mb-12">
                               <input type="text" class="form-control" id="type_tcl" name="type_tcl" placeholder="type" required>
                            </div>
                            <input type="hidden" id="id_tcl" name="id_tcl">

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
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./cadre_logique_edit/"
           var lien1="../cadre_logique_edit/"
           var liena='./cadre_logique_update/'
           var liena1='../cadre_logique_update/'
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
                 $('#id').val(response.cadre.id_cl);
                $('#code').val(response.cadre.code_cl);
                $('#niveau').val(response.cadre.id_niv_cl);
                $('#intitule').val(response.cadre.intitule_cl);
                $('#cout').val(response.cadre.cout_cl);
                $('#parent').val(response.cadre.id_parent_cl);
                 }
                            });
                            
    });

    $(document).on('click','.modaleditniveau',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./niveau_cadre_logique_edit/"
           var lien1="../niveau_cadre_logique_edit/"
           var liena='./niveau_cadre_logique_update/'
           var liena1='../niveau_cadre_logique_update/'
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
           $('#modal_niveau').modal('show')
           //alert(page)
           $.ajax({
       
                url:liens+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                    $('#id').val(response.niveau.id_ncl);
                 $('#nom').val(response.niveau.libelle_ncl);
                $('#type').val(response.niveau.id_type_ncl);
                $('#niveau_ncl').val(response.niveau.niveau_ncl);
                 }
                            });
                            
    });
    $(document).on('click','.modaledittype',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./type_cadre_logique_edit/"
           var lien1="../type_cadre_logique_edit/"
           var liena='./type_cadre_logique_update/'
           var liena1='../type_cadre_logique_update/'
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
            $('#editformtype').attr('action',liensa+ids)
           $('#modal_type').modal('show')
           //alert(page)
           $.ajax({
       
                url:liens+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                    $('#id_tcl').val(response.type.id_tcl);
                 $('#type_tcl').val(response.type.type_tcl);
                 }
                            });
                            
    });

    });
</script>
@endsection
