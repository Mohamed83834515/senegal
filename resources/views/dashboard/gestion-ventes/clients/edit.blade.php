@extends('dashboard.layouts.dashboard', ['title' => 'Modifier le client'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Gestion des ventes</span>
                <span class="breadcrumb-item">Clients</span>
                <span class="breadcrumb-item active">{{ $client->libelle_ptn }}</span>
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

            <form class="row" id="add" action="{{ route('client.update', $client) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Nom du client <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" aria-describedby="nom" placeholder="Saississez le nom" value="{{ $client->libelle_ptn }}" required>
                        
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Téléphone</label>
                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" placeholder="+225 00-00-00-00" data-mask="+225-99-99-99-99-99" class="form-control" value="{{ $client->telephone_ptn}}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <a href="{{ route('client.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection