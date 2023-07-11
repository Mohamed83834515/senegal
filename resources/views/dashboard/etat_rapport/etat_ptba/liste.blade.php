@extends('dashboard.layouts.dashboard', ['title' => 'Etat & Rapport'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Etat & Rapport</span>
                <span class="breadcrumb-item active">Etat PTBA</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter une récommandation
                </a>
            </div>
        </div> --}}
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

</style>

@section('content')
<div class="card" ng-controller="etatptba">
    <br>
    <!------ Include the above in your HEAD tag ---------->
    
 
    
    <div class="container" ng-if="affiche">
        <div class="row" >
       
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab  item">
                <a href="" ng-click="AfficheTableau()">
                   <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image"></i>
                            <p class="item-title">
                                    <h4> Chronogramme des activités du PTBA </h4>
                                </p><!-- /.item-title -->
                                <p>
                                    Programmation du PTBA 
                                </p>
                    </div>
                </div> 
                </a>
                
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image" ></i>
                            <p class="item-title">
                                <h4> Chronogramme des Tâches du PTBA</h4>
                            </p><!-- /.item-title -->
                            <p>
                                Programmation du PTBA 
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image"></i>
                            <p class="item-title">
                                <h4> Chronogramme des Indicateurs du PTBA</h4>
                            </p><!-- /.item-title -->
                            <p>
                                Programmation du PTBA 
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image"></i>
                            <p class="item-title">
                                <h4> Tâches par responsable du PTBA  </h4>
                            </p><!-- /.item-title -->
                            <p>
                                Programmation du PTBA 
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                <div class="folded-corner service_tab_1">
                <div class="text">
                    <i class="fa fa-folder fa-5x fa-icon-image"></i>
                        <p class="item-title">
                            <h4>Avancement global du PTBA par palier  </h4>
                        </p><!-- /.item-title -->
                        <p>
                            Suivi du PTBA 
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image"></i>
                            <p class="item-title">
                                <h4> Avancement des Tâches du PTBA</h4>
                            </p><!-- /.item-title -->
                            <p>
                                Suivi du PTBA 
                            </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                    <div class="folded-corner service_tab_1">
                        <div class="text">
                            <i class="fa fa-folder fa-5x fa-icon-image"></i>
                                <p class="item-title">
                                    <h4> Avancements des Indicateurs du PTBA</h4>
                                </p><!-- /.item-title -->
                                <p>
                                    Suivi du PTBA 
                                </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                <div class="folded-corner service_tab_1">
                    <div class="text">
                        <i class="fa fa-folder fa-5x fa-icon-image"></i>
                            <p class="item-title">
                                <h4> Recapitulatif de l'exécution du PTBA  </h4>
                            </p><!-- /.item-title -->
                            <p>
                                Suivi du PTBA 
                            </p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="" ng-if="!affiche" ng-init="AfficheTableau()">
        <table class="custom-table">
        <tbody>
            <tr>
                <td colspan="6" class="page-header"><i class="fa fa-folder"></i>    Rapport sur les chronogrammes du PTBA</td>
            </tr>
        </tbody>
    </table>
        <table class="custom-table">
           
                <thead>
                    <tr>
                        <th rowspan="2">Code</th>
                        <th rowspan="2">Activités</th>
                        <th rowspan="2">Direction/Structure</th>
                        <th colspan="4">Chronogramme</th>
                        <th colspan="4">Budget global annuel (F CFA)</th>
                        <th rowspan="2">Budget total</th> 
                    </tr>
                    <tr>
                        <th>T1</th>
                        <th>T2</th>
                        <th>T3</th>
                        <th>T4</th>

                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr  ng-repeat="Liste in ListePtba">
                            <td>@{{ Liste.code_activite_ptba }}</td>
                            <td>@{{ Liste.intitule_activite_ptba }}</td>
                            <td ><small ng-repeat="liste in Liste.structure_ptba">@{{getPartenaire(liste)}};</small></td>
                            {{-- <td ng-repeat="liste1 in getChronogramme(Liste.id_ptba)">@{{ liste1 }}</td> --}}
                            <td ng-if="t1">t</td>
                            <td ng-if="!t1">f</td>
                            
                            <td ng-if="t2">t</td>
                            <td ng-if="!t2">f</td>

                            <td ng-if="t3">t</td>
                            <td ng-if="!t3">f</td>

                            <td ng-if="t4">t</td>
                            <td ng-if="!t4">f</td>
                            <td>@{{ Liste.intitule_activite_ptba }}</td>
                            <td>@{{ getBudget(Liste.id_ptba) }}</td>
                            
                        </tr>
                    
                </tbody>
            </table>
    </div>
    
   
      

</div>

@endsection
