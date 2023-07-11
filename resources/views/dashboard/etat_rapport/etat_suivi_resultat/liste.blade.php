@extends('dashboard.layouts.dashboard', ['title' => 'Etat & Rapport'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Etat & Rapport</a>
                <a href="#" class="breadcrumb-item active"> Etat Suvi des résultats</a>
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
      border: 1px solid rgba(57 219 38);
    }
    .folded-corner:hover{
        background-color: rgba(219 162 38);
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
        color: rgba(57 219 38);
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
    
    
    </style>
@section('content')
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <br>
            <!------ Include the above in your HEAD tag ---------->
            
         
            
            <div class="container">
                <div class="row">
               
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab  item">
                        <div class="folded-corner service_tab_1">
                            <div class="text">
                                <i class="fa fa-folder fa-5x fa-icon-image"></i>
                                    <p class="item-title">
                                            <h4> Cadre Logique </h4>
                                        </p><!-- /.item-title -->
                                        <p>
                                            Suivi des resultats
                                        </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                        <div class="folded-corner service_tab_1">
                            <div class="text">
                                <i class="fa fa-folder fa-5x fa-icon-image" ></i>
                                    <p class="item-title">
                                        <h4> CMR</h4>
                                    </p><!-- /.item-title -->
                                    <p>
                                        Suivi des resultats
                                    </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                        <div class="folded-corner service_tab_1">
                            <div class="text">
                                <i class="fa fa-folder fa-5x fa-icon-image"></i>
                                    <p class="item-title">
                                        <h4> Situation du CMR </h4>
                                    </p><!-- /.item-title -->
                                    <p>
                                        Suivi des resultats 
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 Services-tab item">
                        <div class="folded-corner service_tab_1">
                        <div class="text">
                            <i class="fa fa-folder fa-5x fa-icon-image"></i>
                                <p class="item-title">
                                    <h4>Niveau d'exécution  </h4>
                                </p><!-- /.item-title -->
                                <p>
                                    Suivi des resultats
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
              
        
        </div>
      

    </div>
    <!-- /left content -->
  
<!-- /iconified modal -->

</div>

@endsection
