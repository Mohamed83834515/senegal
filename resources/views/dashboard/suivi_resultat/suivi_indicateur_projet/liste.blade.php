@extends('dashboard.layouts.dashboard', ['title' => 'Suivi des résultats'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Suivi des résultats</a>
                <a href="#" class="breadcrumb-item active"> Suivi Indicateurs Projet</a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
       {{--  @if (session('id_projet'))
            <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter un indicateur du cadre résultat
                </a>
            </div>
        </div>
        @endif --}}
        
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Inner container -->
<div  class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    Indicateurs @foreach ($NiveauCadre as $item) {{ $item->libelle_ncrp }} @endforeach 
                </h5>
                @if (session('id_projet'))
                  <div class="breadcrumb justify-content-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">--Choisissez--
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @foreach ($niveau_cadres as $item)
                            <li><a href="{{ route('suivi_indicateur_projet.show', $item->id_ncrp ) }}">{{ $item->libelle_ncrp }}</a></li>
                            @endforeach
                        </ul>
                      </div>
                
       
            </div>  
                @endif
                
            </div>


            <div class="tab-content">

                <div class="tab-pane fade show active" id="region">
                 
                    @if (session('id_projet'))
                        <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                        <thead>
                       <th>@foreach ($NiveauCadre as $item)
                        {{ $item->libelle_ncrp }}
                     @endforeach</th>
                       
                       <th>Code</th>
                       <th>Indicateur</th>
                       <th>Cible</th>
                       <th>Réference</th>
                       
                       <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($indicateur as $indicateur)
                                <tr>
                                    <td>{{ $indicateur->code_indicateur_iprj}}</td>
                                    <td>{{ $indicateur->code_iprj }}</td>
                                    <td>{{ $indicateur->intitule_iprj}}</td>
                                    <td>{{ $indicateur->valeur_cible_rmp_iprj}}</td>
                                    <td>{{ $indicateur->intitule_reference_iprj}}</td>
                                    <td class="text-center">
                                        <a href="{{ route('suivi_indicateur_projet.PSuivi', $indicateur->id_iprj) }}" >Suivre</a>
                                       
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                       <div class="alert alert-danger" >
                       Veuillez choisir un projet
                      </div> 
                    @endif
                    


                    

                </div>

            </div>
        </div>
      
      
      

    </div>




<!-- /iconified modal -->

</div>
<!-- /inner container -->
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./suivi_indicateur_projet_edit/"
           var lien1="../suivi_indicateur_projet_edit/"
           var liena='./suivi_indicateur_projet_update/'
           var liena1='../suivi_indicateur_projet_update/'
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
                $('#id').val(response.indicateur.id_iprj);
                $('#cadre_resultat').val(response.indicateur.niveau_iprj);
                $('#indicateurpcga').val(response.indicateur.code_indicateur_iprj);
                $('#code').val(response.indicateur.code_iprj);
                $('#intitule').val(response.indicateur.intitule_iprj);
                $('#unite_mesure').val(response.indicateur.unite_iprj);
                $('#initiale_valeur_cible').val(response.indicateur.intitule_cible_iprj);
                $('#valeur_cible').val(response.indicateur.valeur_cible_iprj);
                $('#cible_revue').val(response.indicateur.valeur_cible_rmp_iprj);
                $('#initiale_valeur_ref').val(response.indicateur.intitule_reference_iprj);
                $('#annee_ref').val(response.indicateur.annee_reference_iprj);
                $('#valeur_ref').val(response.indicateur.valeur_reference_iprj);
                $('#periodicite').val(response.indicateur.periodicite_iprj);
                $('#source').val(response.indicateur.source_verification_iprj);
                $('#mode_calcul').val(response.indicateur.fonction_agregat_iprj);
                $('#responsable').val(response.indicateur.responsable_iprj);
                $('#fournisseur').val(response.indicateur.fournisseur_iprj);
                $('#echele').val(response.indicateur.echelle_iprj);
                $('#mode_suivi').val(response.indicateur.mode_suivi_iprj);
                $('#categorie').val(response.indicateur.categorie_indicateur_iprj);
                $('#page').val(response.indicateur.paccueil);
                 }
                            });
                            
    });

    });
</script>

@endsection

