@extends('dashboard.layouts.dashboard', ['title' => 'Détails convention'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Programmation</a>
                <a href="#" class="breadcrumb-item">Convention</a>
                <span class="breadcrumb-item active">Détails convention</span>
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
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    <a href="#" onclick="window.history.back()"><i class="icon-arrow-left52 mr-2"></i></a>
                     <span class="info">Résultats attendus</span> 
                </h5>

                <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        {{-- <li class="list-inline-item">
                            Total vente:
                            <span class="text-success font-weight-bold ml-auto">10000000 F CFA</span>
                        </li>
                        <li class="list-inline-item">
                            Montant restant:
                            <span class="text-danger font-weight-bold ml-auto">10000000 F CFA</span>
                        </li> --}}
                    </ul>
                </div>
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                    <li class="nav-item">
                        <a href="#projet-overview" class="nav-link active" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Résulats
                            <span class="badge bg-slate badge-pill ml-2">{{ count($ConventionResultat) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Activités
                            <span class="badge bg-slate badge-pill ml-2">{{ count($ConventionActivite) }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#vente-versement" class="nav-link" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Indicateurs
                            <span class="badge bg-slate badge-pill ml-2">0</span>
                        </a>
                    </li>
                    
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="projet-overview">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Libelle</th> 
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ConventionResultat as $resultat)
                                <tr>
                                <td> {{ $resultat->code_cvr }}</td>
                                <td>{{ $resultat->intitule_cvr }}</td> 
                                <td class="text-center">
                                    <a href="#" class="icon-pencil7 text-info modaleditresultat" id="{{ $resultat->id_cvr }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                    </a>
                                    <a href="{{ route('convention_resultat.destroy', $resultat) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $resultat->id_cvr }}');">
                                    </a>
                                    <form id="delete-form-{{ $resultat->id_cvr }}" action="{{ route('convention_resultat.destroy', $resultat) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                </tr>
                               
                               
                               @endforeach
                           
                            
                        
                                {{-- <tr>
                                    <td>{{ $projet->code_prj}}</td>
                                    <td>{{ $projet->sigle_prj}}</td> 
                                </tr> --}}
                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="vente-versement">

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Résultats</th>
                                    <th>Activité</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ConventionActivite as $resultat)
                                <tr>
                                <td>{{ $resultat->resultatconvention->intitule_cvr }}</td>
                                <td> 
                                    {{ $resultat->intitule_tac }}</td> 
                                <td class="text-center">
                                    <a href="#" class="icon-pencil7 text-info modaleditactivite" id="{{ $resultat->id_tac }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                                    </a>
                                   
                                    <a href="{{ route('convention_activite.destroy', $resultat) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $resultat->id_tac }}');">
                                    </a>
                                    <form id="delete-form-{{ $resultat->id_tac }}" action="{{ route('convention_activite.destroy', $resultat) }}" method="POST" style="display: none;">
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
        </div>
        <!-- /projet overview -->
        <div id="modal_edit_resultat" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editformresultat" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'un résultat</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code_r" name="code_r" placeholder="" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $convention->id}}" name="convention" aria-describedby="sigle">
                            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Intitulé  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control"id="intitule_r" name="intitule_r" aria-describedby="definition">
                            </div>
                             
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('convention_resultat.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'un résultat</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $convention->id}}" name="convention" aria-describedby="sigle">
                            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Intitulé  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="intitule" aria-describedby="definition">
                            </div>
                             
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_iconified1" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('convention_activite.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'activité</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Résultat <span class="text-danger text-bold"></span></label>
                                <select class="form-control" name="resultat" aria-describedby="produit" >

                                    @foreach ($ConventionResultat as $produit)
                                    <option value="{{ $produit->id_cvr }}">{{ $produit->intitule_cvr }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $convention->id}}" name="convention" aria-describedby="sigle">
                            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Activité  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="intitule" aria-describedby="definition" required>
                            </div>
                             
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div><div id="modal_edit_activite" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editformactivite" action="" method="POST">
                    
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'activité</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Résultat <span class="text-danger text-bold"></span></label>
                                <select class="form-control" id="resultat_a" name="resultat_a" aria-describedby="produit" >

                                    @foreach ($ConventionResultat as $produit)
                                    <option value="{{ $produit->id_cvr }}">{{ $produit->intitule_cvr }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code_a" name="code_a" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $convention->id}}" name="convention" aria-describedby="sigle">
                            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Activité  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" id="intitule_a"  name="intitule_a" aria-describedby="definition" required>
                            </div>
                             
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_iconified1" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('convention_activite.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i>Création d'activité</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Résultat <span class="text-danger text-bold"></span></label>
                                <select class="form-control" name="resultat" aria-describedby="produit" >

                                    @foreach ($ConventionResultat as $produit)
                                    <option value="{{ $produit->id_cvr }}">{{ $produit->intitule_cvr }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            
                                <input type="hidden" class="form-control" value="{{ $convention->id}}" name="convention" aria-describedby="sigle">
                            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Activité  <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="intitule" aria-describedby="definition" required>
                            </div>
                             
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- projet details -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Résultats</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                     
                    <a href="#" class="btn btn-warning btn-block mb-2" data-toggle="modal" data-target="#modal_iconified">
                        <i class="icon-user mr-2"></i> Ajouter résultats
                    </a>
                    


                         
                        <form id="livrer-form-1" action="" method="POST" style="display: none;">
                            @csrf
                            @method('POST')
                        </form>
                        <a href="#" class="btn bg-teal-400 btn-block mb-2" data-toggle="modal" data-target="#modal_iconified1">
                            Ajouter une activité
                        </a>
                        <a href="#" class="btn bg-success-400 btn-block mb-2 " >
                            <span>
                                <i class="icon-truck mr-1"></i>
                                Ajouter indicateur
                             </span>
                        </a>


                   
                </div>
                
                 
            </div>
            <!-- /projet details -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>
<!-- /inner container -->
<script>
    $(document).ready(function(){
        $(document).on('click','.modaleditactivite',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../convention_activite_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../convention_activite_update/'
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
            $('#editformactivite').attr('action',liena+ids)
           $('#modal_edit_activite').modal('show')
           //alert(page)
           $.ajax({
       
                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                $('#resultat_a').val(response.activite.resultat_tac);
                $('#code_a').val(response.activite.code_tac);
                $('#intitule_a').val(response.activite.intitule_tac);
                 }
                            });
                            
    });

    $(document).on('click','.modaleditresultat',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="../convention_resultat_edit/"
           //var lien1="../type_tache_edit/"
           var liena='../convention_resultat_update/'
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
            $('#editformresultat').attr('action',liena+ids)
           $('#modal_edit_resultat').modal('show')
           //alert(page)
           $.ajax({
       
                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                $('#code_r').val(response.resultat.code_cvr);
                $('#intitule_r').val(response.resultat.intitule_cvr);
                 }
                            });
                            
    });
    });
</script>
@endsection
