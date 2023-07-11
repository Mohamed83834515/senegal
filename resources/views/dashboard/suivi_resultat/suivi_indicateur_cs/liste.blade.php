@extends('dashboard.layouts.dashboard', ['title' => 'Suivi des résultats'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Suivi des résultats</a>
                <a href="#" class="breadcrumb-item active"> Suivi Indicateurs Programmes</a>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter un indicateur du cadre strategique
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
                    Indicateurs @foreach ($NiveauCadre as $item){{ $item->libelle_ncl }} @endforeach 
                </h5>
                <div class="breadcrumb justify-content-center">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">--Choisissez--
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            @foreach ($niveau_cadres as $item)
                            <li><a href="{{ route('suivi_indicateur_cs.show', $item->id_ncl ) }}">{{ $item->libelle_ncl }}</a></li>
                            @endforeach
                        </ul>
                      </div>

       
            </div>
            </div>


            <div class="tab-content">

                <div class="tab-pane fade show active" id="region">
                 

                    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                        <thead>
                            <th>@foreach ($NiveauCadre as $item)
                                {{ $item->libelle_ncl }}
                             @endforeach</th>
                       <th>Code</th>
                       <th>Indicateur</th>
                       <th>Cible</th>
                       <th>Réference</th>
                       <th>Actions</th>
                        </thead>
                        <tbody>
                            @if (isset($indicateur))
                               @foreach ($indicateur as $indicateur)
                                <tr>
                                    <td>{{ $indicateur->code_cl}}</td>
                                    <td>{{ $indicateur->code_iprg }}</td>
                                    <td>{{ $indicateur->intitule_iprg}}</td>
                                    <td>{{ $indicateur->valeur_cible_iprg}}</td>
                                    <td>{{ $indicateur->valeur_reference_iprg}}</td>
                
                                    <td class="text-center">
                                        <a href="{{ route('suivi_indicateur_cs.CsSuivi', $indicateur->id_iprg) }}" >Suivre</a>
                                       
                                    </td>
                                </tr>
                            @endforeach  
                            @endif
                           
                        </tbody>
                    </table>




                </div>

            </div>
        </div>
      
      
      

    </div>
    <!-- /left content -->
  
<!-- /iconified modal -->

</div>
<!-- /inner container -->
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./suivi_indicateur_cs_edit/"
           var lien1="../suivi_indicateur_cs_edit/"
           var liena='./suivi_indicateur_cs_update/'
           var liena1='../suivi_indicateur_cs_update/'
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
                 $('#id').val(response.cadre.id_iprg);
                $('#code').val(response.cadre.code_iprg);
                $('#intitule').val(response.cadre.intitule_iprg);
                $('#cadre').val(response.cadre.niveau_iprg);
                $('#initiale_cible').val(response.cadre.intitule_cible_iprg);
                $('#valeur_cible').val(response.cadre.valeur_cible_iprg);
                $('#annee_ref').val(response.cadre.annee_reference_iprg);
                $('#valeur_ref').val(response.cadre.valeur_reference_iprg);
                $('#unite_mesure').val(response.cadre.unite_iprg);
                $('#source').val(response.cadre.source_verification_iprg);
                $('#mode_calcul').val(response.cadre.mode_calcul_iprg);
                $('#page').val(response.cadre.page_iprg);
                 }
                            });
                            
    });

    });
</script>
@endsection
