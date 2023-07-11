@extends('dashboard.layouts.dashboard', ['title' => 'Détails de la vente'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Cadre résultat</a>
                <a href="#" class="breadcrumb-item active">Cadre résultat projet</a>
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
@if(session('id_projet'))
<div class="d-flex align-items-start flex-column flex-md-row">
 
    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    Le cadre résultat par projet
                </h5>
                <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_niveau">
                    <i class="icon-add mr-2"></i>
                    Gestion des niveaux
                </a>
            </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class=" card-title nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">

                    @foreach ($niveau_cadres as $item)
                       <li class="nav-item">
                        <a href="{{ route('cadre_resultat_projet.show', $item->id_ncrp ) }}" class="nav-link" >
                            <i class="icon-menu7 mr-2"></i>{{ $item->libelle_ncrp }}
                        </a>
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
                            @if($id==1)
                            @if (isset($PremierNiveau))
                                {{ $PremierNiveau->libelle_ncrp }}
                            @endif
                                 
                            @else
                            {{ $PremierNiveau->libelle_ncrp }}
                            @endif

                        </a>
                    </div>

                    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                        <thead>
                        <tr>

                            <th>Code</th>
                            @php
                            $type = $niveau->where('id_ncrp', '=', $id-1)->first();
                            $type2 = $niveau->where('id_ncrp', '=', $id)->first();
                           
                            
                        @endphp
                        @if (isset($type))
                        <th> {{ $type->libelle_ncrp }}</th>    
                        @endif
                        @if (isset($type2))
                        <th> {{ $type2->libelle_ncrp }}</th>
                        @endif


                            @if($id==1)
                            <th>
                                Encrage au PCGAP II
                            </th>
                             @endif  
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $type = $cadre_logique->where('id_niv_crp', '=', $id);
                        @endphp
                        @foreach ($type as $region)
                            <tr>
                                <td>{{ $region->code_crp }}</td>
                               
                                @if(isset($region->parent))
                                    <td>{{ $region->parent->intitule_crp }}</td>
                                @endif

                                <td>{{ $region->intitule_crp }}</td>
                               
                                @if($id==1)
                             
                                <td>{{ $region->cadrelogique->intitule_cl}}</td>
                                    @endif 
                                <td class="text-center">
                                    <a href="" class="icon-pencil7 text-info modaledit" id="{{ $region->id_crp }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        {{-- <i class="far fa-edit"></i> --}}
                                    </a>
                                    
                                    <a href="{{ route('cadre_resultat_projet.destroy', $region) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $region->id_crp }}');">
                                    </a>
                                    <form id="delete-form-{{ $region->id_crp }}" action="{{ route('cadre_resultat_projet.destroy', $region) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
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
                               {{ $PremierNiveau->libelle_ncrp }} 
                            @endif
                                
                            @else
                                {{ $PremierNiveau->libelle_ncrp }}
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


                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">
                                    @if (isset($PremierNiveau))
                                       {{ $PremierNiveau->libelle_ncrp }}   
                                    @endif
                                    
                                    <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="intitule" id="intitule" aria-describedby="definition"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Type de résultat <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="type" name="type" data-placeholder="choisissez les types" >
                                    <option>--Choisissez--</option>
                                     <option data-icon="" value="Opérationnel">Opérationnel</option>
                                     <option data-icon="" value="Fonctionnel">Fonctionnel</option>
                                     </select>
                            </div>
                            @if($id==1)
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Liaison avec le  PCGAP II <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="liaison" name="liaison" data-placeholder="choisissez les types" >
                                 
                                    @foreach ($cadre as $typ)
                                    
                                    <option data-icon="" value="{{$typ->id_cl}}"
                                        {{ check_module_selected(old('type'), $typ->id_cl) ? 'selected' : '' }}>
                                        {{ $typ->code_cl.' '.$typ->intitule_cl }}
                                    </option>
                                   
                                @endforeach>
                                     </select>
                            </div>
                            @else
                           
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">{{ $Avant->libelle_ncrp }} <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " name="parent" id="parent" data-placeholder="choisissez les types"  >
                                    
                                    @foreach ($cadres as $typ)
                                    
                                    @if ($typ->id_niv_crp==$Avant->id_ncrp)
                                    <option data-icon="" value="{{$typ->id_crp}}"
                                        {{ check_module_selected(old('type'), $typ->id_crp) ? 'selected' : '' }}>
                                        {{ $typ->intitule_crp }}
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
                <form class="modal-content" method="POST" action="{{ route('cadre_resultat_projet.store') }}">
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
                               {{ $PremierNiveau->libelle_ncrp }} 
                            @endif
                                
                            @else
                                {{ $PremierNiveau->libelle_ncrp }}
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


                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">
                                    @if (isset($PremierNiveau))
                                       {{ $PremierNiveau->libelle_ncrp }}   
                                    @endif
                                    
                                    <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="intitule" id="intitule" aria-describedby="definition"></textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Type de résultat <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="type" name="type" data-placeholder="choisissez les types" >
                                    <option>--Choisissez--</option>
                                     <option data-icon="" value="Opérationnel">Opérationnel</option>
                                     <option data-icon="" value="Fonctionnel">Fonctionnel</option>
                                     </select>
                            </div>
                            @if($id==1)
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Liaison avec le PCGAP II <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " id="liaison" name="liaison" data-placeholder="choisissez les types" >
                                 
                                    @foreach ($cadre as $typ)
                                    
                                    <option data-icon="" value="{{$typ->id_cl}}"
                                        {{ check_module_selected(old('type'), $typ->id_cl) ? 'selected' : '' }}>
                                        {{ $typ->code_cl.' '.$typ->intitule_cl }}
                                    </option>
                                   
                                @endforeach>
                                     </select>
                            </div>
                            @else
                           
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">{{ $Avant->libelle_ncrp }} <span class="text-danger text-bold"></span></label>
                                <select class="form-control select " name="parent" id="parent" data-placeholder="choisissez les types"  >
                                    
                                    @foreach ($cadres as $typ)
                                    
                                    @if ($typ->id_niv_crp==$Avant->id_ncrp)
                                    <option data-icon="" value="{{$typ->id_crp}}"
                                        {{ check_module_selected(old('type'), $typ->id_crp) ? 'selected' : '' }}>
                                        {{ $typ->intitule_crp }}
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
                                <th>Taille du code</th>
                                <th>Libellé</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categorie as $categorie)

                                <tr>
                                    <td>{{ $categorie->niveau_ncrp }}</td>
                                    <td>{{ $categorie->libelle_ncrp}}</td>

                                    <td class="text-center">
                                        <a href="" class="icon-pencil7 text-info modaleditniveau" id="{{ $categorie->id_ncrp }}" statut="{{ $statut }}" ids="{{ $id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                        </a>
                                        <a href="{{ route('niveau_cadre_resultat.destroy', $categorie) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $categorie->id_ncrp }}');">
                                        </a>
                                        <form id="delete-form-{{ $categorie->id_ncrp }}" action="{{ route('niveau_cadre_resultat.destroy', $categorie) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <form class="" method="POST" action="{{ route('niveau_cadre_resultat.store') }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" id="id_ncrp" name="id_ncrp">
                        <div class="row mb-2">
                            <div class="col-md-3 mb-2">
                                <input type="text" class="form-control" id="niveau_ncrp" name="niveau_ncrp" placeholder="Taille du code" required>
                            </div>
                            <div class="col-md-6 mb-2">
                               <input type="text" class="form-control" id="nom" name="nom" placeholder="Catégorie" required>
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
@else
<div class="alert alert-danger" >
    Veuillez choisir un projet
   </div>
@endif
<!-- /inner container -->
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./cadre_resultat_projet_edit/"
           var lien1="../cadre_resultat_projet_edit/"
           var liena='./cadre_resultat_projet_update/'
           var liena1='../cadre_resultat_projet_update/'
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
                 $('#id').val(response.cadre.id_crp);
                $('#code').val(response.cadre.code_crp);
                $('#intitule').val(response.cadre.intitule_crp);
                $('#type').val(response.cadre.type_resultat_crp);
                $('#liaison').val(response.cadre.id_parent_crp);
                $('#parent').val(response.cadre.liaison_crp);
                 }
                            });
                            
    });

    $(document).on('click','.modaleditniveau',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./niveau_cadre_resultat_edit/"
           var lien1="../niveau_cadre_resultat_edit/"
           var liena='./niveau_cadre_resultat_update/'
           var liena1='../niveau_cadre_resultat_update/'
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
                $('#id_ncrp').val(response.niveau.id_ncrp);
                $('#niveau_ncrp').val(response.niveau.niveau_ncrp);
                $('#nom').val(response.niveau.libelle_ncrp);
                 }
                            });
                            
    });
    });
</script>
@endsection
