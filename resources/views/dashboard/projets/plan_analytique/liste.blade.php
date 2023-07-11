@extends('dashboard.layouts.dashboard', ['title' => 'Plan Analytique'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Projets</a>
                <a href="#" class="breadcrumb-item">Plan Analytique</a>
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
            

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class=" card-title nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">

                    @foreach ($niveau_cadres as $item)
                       <li class="nav-item">
                        <a href="{{ route('plans_analytique.show', $item->niveau_npa ) }}" class="nav-link" >
                            <i class="icon-menu7 mr-2"></i>{{ $item->libelle_npa }}
                        </a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                    <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter
                    @if($id==1)
                    @if (isset($PremierNiveau))
                        {{ $PremierNiveau->libelle_npa }}
                    @endif
                         
                    @else
                    {{ $PremierNiveau->libelle_npa }}
                    @endif
                </a>
                    </li>



                </ul>

            </div>

            <div class="tab-content">

                <div class="tab-pane fade show active" id="region">
               

                    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                        <thead>
                        <tr>

                            <th>Code</th>
                            @php
                            $type = $niveau->where(
                                'niveau_npa', '=', $id-1,
                                'idprg_npa','=',session('id_projet')
                                )->first();
                            $type2 = $niveau->where(
                                'niveau_npa', '=', $id,
                                'idprg_npa','=',session('id_projet')
                                )->first();
                           
                            
                        @endphp
                        @if (isset($type))
                        <th> {{ $type->libelle_npa }}</th>    
                        @endif
                        @if (isset($type2))
                        <th> {{ $type2->libelle_npa }}</th>
                        @endif


                            @if($id==1)
                            
                             @endif  
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                       // dd($cadr);
                         if($cadr)
                        {
                            $type = $cadre_logique->where('id_niv_pa', '=', $cadr->id_npa);
                        }
                      
                        @endphp
                        @if($type)
                            
                         @foreach ($type as $region)
                            <tr>
                                <td>{{ $region->code_pa }}</td>
                               
                                @if(isset($region->parent))
                                    <td colspan="2">{{ $region->parent->intitule_pa }}</td>
                                @endif

                                <td>{{ $region->intitule_pa }}</td>
                               
                                @if($id==1)
                             
                                    @endif 
                                <td class="text-center">
                                    <a href="" class="icon-pencil7 text-info modaledit" id="{{ $region->id_pa }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        {{-- <i class="far fa-edit"></i> --}}
                                    </a>
                                    
                                    <a href="{{ route('plan_analytique.destroy', $region) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $region->id_pa }}');">
                                    </a>
                                    <form id="delete-form-{{ $region->id_pa }}" action="{{ route('plan_analytique.destroy', $region) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                            
                        @endif
                      
                        </tbody>
                    </table>




                </div>

            </div>
        </div>
        <!-- /projet overview -->
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
                               {{ $PremierNiveau->libelle_npa }} 
                            @endif
                                
                            @else
                                {{ $PremierNiveau->libelle_npa }}
                            @endif </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="code" aria-describedby="code" placeholder="Saississez le code" required>
                                <input type="hidden" class="form-control" id="niveau" value="{{ $id }}" name="niveau" required>
                           </div>
                           <div class="col-md-12 mb-2">
                            <label for="inputEmail4" class="text-black">Code correspondance<span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="code_cor" name="code_cor" placeholder="code" aria-describedby="code" placeholder="Saississez le code" >
                        </div>


                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">
                                    @if (isset($PremierNiveau))
                                       {{ $PremierNiveau->libelle_npa }}   
                                    @endif
                                    
                                    <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="intitule" id="intitule" aria-describedby="definition"></textarea>
                            </div>

                           
                            @if($id==1)
                          
                            @else
                           
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">{{ $Avant->libelle_npa }} <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " name="parent" id="parent" data-placeholder="choisissez les types"  >
                                    
                                    @foreach ($cadres as $typ)
                                    
                                    @if ($typ->id_niv_pa==$Avant->id_npa)
                                    <option data-icon="" value="{{$typ->id_pa}}"
                                        {{ check_module_selected(old('type'), $typ->id_pa) ? 'selected' : '' }}>
                                        {{ $typ->intitule_pa }}
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
        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('plans_analytique.store') }}">
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
                               {{ $PremierNiveau->libelle_npa }} 
                            @endif
                                
                            @else
                                {{ $PremierNiveau->libelle_npa }}
                            @endif </h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="code" aria-describedby="code" placeholder="Saississez le code" required>
                                <input type="hidden" class="form-control" id="niveau" value="{{ $id }}" name="niveau" required>
                           </div>
                           <div class="col-md-12 mb-2">
                            <label for="inputEmail4" class="text-black">Code correspondance<span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="code_cor" name="code_cor" placeholder="code" aria-describedby="code" placeholder="Saississez le code" >
                        </div>


                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">
                                    @if (isset($PremierNiveau))
                                       {{ $PremierNiveau->libelle_npa }}   
                                    @endif
                                    
                                    <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="intitule" id="intitule" aria-describedby="definition"></textarea>
                            </div>

                           
                            @if($id==1)
                            
                            @else
                           
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">{{ $Avant->libelle_npa }} <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " name="parent" id="parent" data-placeholder="choisissez les types"  >
                                    
                                    @foreach ($cadres as $typ)
                                    
                                    @if ($typ->id_niv_pa==$Avant->id_npa)
                                    <option data-icon="" value="{{$typ->id_pa}}"
                                        {{ check_module_selected(old('type'), $typ->id_pa) ? 'selected' : '' }}>
                                        {{ $typ->intitule_pa }}
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
                                <th>Taille</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categorie as $categorie)

                                <tr>
                                    <td>{{ $categorie->niveau_npa }}</td>
                                    <td>{{ $categorie->libelle_npa}}</td>
                                    <td>{{ $categorie->taille_npa}}</td>
                                    <td class="text-center">

                                        <a href="" class="icon-pencil7 text-info modaleditniveau" id="{{ $categorie->id_npa }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        </a>
                                        <a href="{{ route('niveau_plan_analytique.destroy', $categorie) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $categorie->id_npa }}');">
                                        </a>
                                        <form id="delete-form-{{ $categorie->id_npa }}" action="{{ route('niveau_plan_analytique.destroy', $categorie) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <form class="" method="POST" action="{{ route('niveaux_plan_analytique.store') }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_ni" name="id_ni">
                        <div class="row mb-2">
                            <div class="col-md-3 mb-2">
                                <input type="text" class="form-control" id="niveau_ni" name="niveau_ni" placeholder="Niveau" required>
                            </div>
                            <div class="col-md-6 mb-2">
                               <input type="text" class="form-control" id="nom_ni" name="nom_ni" placeholder="Catégorie" required>
                            </div>
                            <div class="col-md-3 mb-2">
                                <input type="text" class="form-control" id="taille_ni" name="taille_ni" placeholder="Taille du code" required>
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
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./plans_analytique_edit/"
           var lien1="../plans_analytique_edit/"
           var liena='./plans_analytique_update/'
           var liena1='../plans_analytique_update/'
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
                  $('#id').val(response.cadre.id_pa);
                $('#code').val(response.cadre.code_pa);
                $('#code_cor').val(response.cadre.code_cor_pa);
                $('#intitule').val(response.cadre.intitule_pa);
                $('#type').val(response.cadre.type_resultat_crp);
                $('#parent').val(response.cadre.id_parent_pa); 
                 }
                            });
                            
    });

    $(document).on('click','.modaleditniveau',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./niveaux_plan_analytique_edit/"
           var lien1="../niveaux_plan_analytique_edit/"
           var liena='./niveaux_plan_analytique_update/'
           var liena1='../niveaux_plan_analytique_update/'
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
                    $('#id_ni').val(response.niveau.id_npa);
                 $('#nom_ni').val(response.niveau.libelle_npa);
                $('#taille_ni').val(response.niveau.taille_npa);
                $('#niveau_ni').val(response.niveau.niveau_npa);
                 }
                            });
                            
    });
    });
</script>
@endsection
