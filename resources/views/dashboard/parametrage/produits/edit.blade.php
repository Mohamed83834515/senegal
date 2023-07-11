@extends('dashboard.layouts.dashboard', ['title' => 'Modifier le produit'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Gestion de stock</span>
                <span class="breadcrumb-item">Fournisseurs</span>
                <span class="breadcrumb-item active">{{ $produit->libelle_pro }}</span>
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

            <form class="row" id="add" action="{{ route('produit.update', $produit) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Nom du produit <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" aria-describedby="nom" placeholder="Saississez le nom" value="{{ $produit->libelle_pro }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                        <textarea type="text" class="form-control" name="description" aria-describedby="description">{{ $produit->description_pro }}</textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                    <div class="form-group mb-3">
                        <label class="col-lg-12 col-form-label font-weight-semibold">Image:</label>
                        <div class="col-lg-12">
                            <input type="file" class="file-input" name="image" data-fouc>
                            <span class="form-text text-muted">Taille max (10 mb).</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <a href="{{ route('produit.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection