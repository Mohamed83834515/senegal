@extends('dashboard.layouts.dashboard', ['title' => 'PTBP'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Programmation</span>
                <span class="breadcrumb-item active">Ptba</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2 mr-2 mx-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Nouvelle Activité
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

                <th>Axes</th>
                <th>Activités</th>
                <th>Direction/Structure</th>
                <th>Partenaires MO</th>
                <th>T1</th>
                <th>T2</th>
                <th>T3</th>
                <th>T4</th>
                <th>Tâches</th>
                <th>Indicateurs</th>
                <th>Coût(EUR)</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($ptba)
              @foreach ($ptba as $ptba)
                <tr>
                    <td>{{ $ptba->code_activite_ptba }}</td>
                    <td>{{ $ptba->intitule_activite_ptba }}</td>
                    <td> @if($ptba->structure_ptba)
                        @foreach ($ptba->structure_ptba as $pat)
                       @php
                           $type = $partenaires->where('id_pat', '=', $pat)->first();
                       @endphp
                       {{ $type->sigle_pat }}
                       @if (!$loop->last)
                           ,
                       @endif
                   @endforeach                            
                   @endif</td>
                    <td>
                        @if($ptba->structure_ptba)
                        @foreach ($ptba->structure_ptba as $pat)
                       @php
                           $type = $partenaires->where('id_pat', '=', $pat)->first();
                       @endphp
                       {{ $type->sigle_pat }}
                       @if (!$loop->last)
                           ,
                       @endif
                   @endforeach                            
                   @endif
                    </td>
                    <td>
                         
                        @if($ptba->debut_ptba)
                            
                        @foreach ($ptba->debut_ptba as $trimestre)
                        @if($trimestre=="trimestre1")
                                
                        <a style=" display:block;background-color:#D56900 "><span style="color:#D56900">1</span></a>
                            
                        @endif
                        @endforeach
                        
                         
                        @endif
                         
                    </td>
                    <td >
                       
                         @if($ptba->debut_ptba)
                            
                        @foreach ($ptba->debut_ptba as $trimestre)
                            @if($trimestre=='trimestre2')
                                
                            <a style=" display:block;background-color:#D56900 "><span style="color:#D56900">1</span></a>
                                
                            @endif
                        @endforeach
                        
                        @endif
                    </td>
                    <td> @if($ptba->debut_ptba)
                            
                        @foreach ($ptba->debut_ptba as $trimestre)
                            @if($trimestre=='trimestre3')
                                
                            @if($trimestre=='trimestre3')
                                
                            <a style=" display:block;background-color:#D56900 "><span style="color:#D56900">1</span></a>
                                
                            @endif
                                
                            @endif
                        @endforeach
                        
                        @endif
                        
                    </td>
                    <td> @if($ptba->debut_ptba)
                            
                        @foreach ($ptba->debut_ptba as $trimestre)
                            @if($trimestre=='trimestre4')
                                
                            @if($trimestre=='trimestre4')
                                
                            <a style=" display:block;background-color:#D56900 "><span style="color:#D56900">1</span></a>
                                
                            @endif
                                
                            @endif
                        @endforeach
                        
                        @endif</td>
                    <td><a href="#" >Tâches</a></td>
                    <td><a href="#" >Indicateurs</a></td>
                    <td><a href="#" >Coût</a></td>
                    <td class="text-center">
                        <a href="{{ route('ptba.show', $ptba->id_ptba) }}" class="icon-eye8 text-brown-800 mr-2" data-toggle="tooltip" data-placement="bottom" title="Visualiser">
                        </a>
                        <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $ptba->id_ptba }}" statut="{{ $statut }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                       
                        <a href="{{ route('ptba.destroy', $ptba) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $ptba->id_ptba }}');">
                        </a>
                        <form id="delete-form-{{ $ptba->id_ptba }}" action="{{ route('ptba.destroy', $ptba) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach  
            @endif
            
        </tbody>
    </table>


    <div id="modal_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" id="editform" action="" method="POST">
                    
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvelle Activité</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Sous/Activité  <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="intitule" name="intitule" placeholder="activité" aria-describedby="code" placeholder="Saississez le code" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Activité clée <span class="text-danger text-bold"></span></label>
                           <select class="form-control" id="code_activite" name="code_activite" aria-describedby="produit" ng-init="initialiseSelect()">
                                @foreach ($partenaires as $produit)
                                <option 
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach
                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Type d'activités <span class="text-danger text-bold"></span></label>
                            <select class="form-control" id="type_activite" name="type_activite" aria-describedby="produit" ng-init="initialiseSelect()">

                                @foreach ($type_activite as $type_ac)
                                <option 
                                    value="{{ $type_ac->id_tpa }}"
                                >{{ $type_ac->code_tpa }} {{ $type_ac->libelle_tpa }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Direction / Structure <span class="text-danger text-bold"></span></label>
                            <select class="form-control select @error('type') is-invalid @enderror" name="structure[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                                @foreach ($partenaires as $produit)
                                <option 
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                       
                         
                        <div class="col-md-6">
                            <label for="inputEmail4" class="text-black">Partenaire(s) <span class="text-danger text-bold"></span></label>
                            <select class="form-control select @error('type') is-invalid @enderror" name="partenaire[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                                @foreach ($partenaires as $produit)
                                <option 
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <label for="inputEmail4" class="text-black">Calendrier  <span class="text-danger text-bold"></span></label>
                            <label for="vehicle1"> T1</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre1">
                            <label for="vehicle2"> T2</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre2">
                            <label for="vehicle3"> T3</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre3">
                            <label for="vehicle3"> T4</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre4">
                            
                         </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Zone d'action <span class="text-danger text-bold"></span></label>
                            <input type="text" id="zone" name="zone" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Localités/sites <span class="text-danger text-bold"></span></label>
                            <select class="form-control" id="localite" name="localite" aria-describedby="produit" ng-init="initialiseSelect()">

                                @foreach ($partenaires as $produit)
                                <option 
                                    value="{{ $produit->id_pat }}"
                                >{{ $produit->sigle_pat }}</option>
                            @endforeach

                                {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                            </select>
                        </div>
                           <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">Observations <span class="text-danger text-bold"></span></label>
                            <textarea type="text" class="form-control" id="observation" name="observation" aria-describedby="definition"></textarea>
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
                <form class="modal-content" method="POST" action="{{ route('ptba.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvelle Activité</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-12">
                                <label for="inputEmail4" class="text-black">Sous/Activité  <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="intitule" name="intitule" placeholder="activité" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Activité clée <span class="text-danger text-bold"></span></label>
                               <select class="form-control" id="code_activite" name="code_activite" aria-describedby="produit" ng-init="initialiseSelect()">
                                    @foreach ($partenaires as $produit)
                                    <option 
                                        value="{{ $produit->id_pat }}"
                                    >{{ $produit->sigle_pat }}</option>
                                @endforeach
                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Type d'activités <span class="text-danger text-bold"></span></label>
                                <select class="form-control" id="type_activite" name="type_activite" aria-describedby="produit" ng-init="initialiseSelect()">

                                    @foreach ($type_activite as $type_ac)
                                <option  value="{{ $type_ac->id_tpa }}">{{ $type_ac->code_tpa }} {{ $type_ac->libelle_tpa }}</option>
                            @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Direction / Structure <span class="text-danger text-bold"></span></label>
                                <select class="form-control select @error('type') is-invalid @enderror" name="structure[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                                    @foreach ($partenaires as $produit)
                                    <option 
                                        value="{{ $produit->id_pat }}"
                                    >{{ $produit->sigle_pat }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                           
                             
                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Partenaire(s) <span class="text-danger text-bold"></span></label>
                                <select class="form-control select @error('type') is-invalid @enderror" name="partenaire[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>

                                    @foreach ($partenaires as $produit)
                                    <option 
                                        value="{{ $produit->id_pat }}"
                                    >{{ $produit->sigle_pat }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <label for="inputEmail4" class="text-black">Calendrier  <span class="text-danger text-bold"></span></label>
                            <label for="vehicle1"> T1</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre1">
                            <label for="vehicle2"> T2</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre2">
                            <label for="vehicle3"> T3</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre3">
                            <label for="vehicle3"> T4</label>
                            <input type="checkbox" class="" id="debut" name="debut[]" value="trimestre4">
                                
                             </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Zone d'action <span class="text-danger text-bold"></span></label>
                                <input type="text" id="zone" name="zone" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Localités/sites <span class="text-danger text-bold"></span></label>
                                <select class="form-control" id="localite" name="localite" aria-describedby="produit" ng-init="initialiseSelect()">

                                    @foreach ($partenaires as $produit)
                                    <option 
                                        value="{{ $produit->id_pat }}"
                                    >{{ $produit->sigle_pat }}</option>
                                @endforeach

                                    {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>
                               <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Observations <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" id="observation" name="observation" aria-describedby="definition"></textarea>
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

           var lien="./ptba_edit/"
           var lien1="../ptba_edit/"
           var liena='./ptba_update/'
           var liena1='../ptba_update/'
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
                 $('#intitule').val(response.indicateur.intitule_activite_ptba);
                $('#code_activite').val(response.indicateur.code_activite_ptba);
                $('#type_activite').val(response.indicateur.type_activite_ptba);
                $('#structure').val(response.indicateur.structure_ptba);
                $('#partenaire').val(response.indicateur.partenaire_ptba);
                $('#debut').val(response.indicateur.debut_ptba);

                $('#zone').val(response.indicateur.zone_ptba);
                $('#localite').val(response.indicateur.localite_ptba);
                $('#observation').val(response.indicateur.observation_ptba);
                 }
                            });
                            
    });

    });
</script>
@endsection
