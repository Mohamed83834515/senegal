@extends('dashboard.layouts.dashboard', ['title' => 'Modifier le programme'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Gestion de stock</span>
                <span class="breadcrumb-item">Fournisseurs</span>
                <span class="breadcrumb-item active">{{$programme->nom_prg}}</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="card p-4">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-sm-12">
            @if ($errors->any())
                <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <ul class="pl-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="row" id="add" action="{{ route('programme.update', $programme) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="inputEmail4" class="text-black">Code du programme <span class="text-danger text-bold">*</span></label>
                    <input type="text" class="form-control" id="code" value="{{$programme->code_prg}}" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4" class="text-black">Sigle <span class="text-danger text-bold"></span></label>
                    <input type="text" class="form-control" name="sigle" value="{{$programme->sigle_prg}}" aria-describedby="sigle"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="text-black">Nom  <span class="text-danger text-bold"></span></label>
                    <textarea type="text" class="form-control" name="nom"   aria-describedby="definition">{{$programme->nom_prg}}</textarea>
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="text-black">Objectif  <span class="text-danger text-bold"></span></label>
                    <textarea type="text" class="form-control" name="objectif" aria-describedby="definition">{{$programme->objectif_prg}}</textarea>
                </div>
                <div class="col-md-12">
                    <label for="inputEmail4" class="text-black">Vision  <span class="text-danger text-bold"></span></label>
                    <textarea type="text" class="form-control" name="vision" aria-describedby="definition">{{$programme->vision_prg}}</textarea>
                </div>

                   <div class="col-md-6">
                    <label for="inputEmail4" class="text-black">Date de debut <span class="text-danger text-bold"></span></label>
                    <input type="date" name="date_debut" value="{{$programme->annee_debut_prg}}" class="form-control" required>
                </div>
                   <div class="col-md-6">
                    <label for="inputEmail4" class="text-black">Date de fin <span class="text-danger text-bold"></span></label>
                    <input type="date" name="date_fin" value="{{$programme->annee_fin_prg}}" class="form-control" required>
                </div>

                   <div class="col-md-6">
                    <label for="inputEmail4" class="text-black">Budget estimatif <span class="text-danger text-bold"></span></label>
                    <input type="text" class="form-control" value="{{$programme->budget_estimatif_prg}}" name="budget" aria-describedby="contact"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="text-black">Type programme <span class="text-danger text-bold"></span></label>
                    <select class="form-control" value="{{$programme->type_programme_prg}}" name="type" aria-describedby="produit" ng-init="initialiseSelect()">

                            <option value="1">Programme cadre</option>
                            <option value="2">Plan d'amenagement et de gestion</option>

                        {{-- <option value="@{{x.id_pro}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                    </select>
                </div>
                <div class="col-md-6 pt8">
                    <a href="{{ route('programme.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
