@extends('dashboard.layouts.dashboard', ['title' => 'Bienvenue'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="#" class="breadcrumb-item"><i class="icon-home2"></i> Accueil</a>
            </div>
 
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="{{ route('projet.create') }}" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    ajouter
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
    <div class="row">
        @foreach ($produits as $produit)
            <div class="col-sm-6 col-xl-3">
                <div class="card card-body 
                @if ($produit->quantite_pro < 500)
                    bg-danger-400
                @else
                    bg-success-400
                @endif 
                has-bg-image">
                    <div class="media">
                        <div class="mr-3 align-self-center">
                            @if ($produit->photo_pro)
                                <a href="{{ asset("uploads/produits/").'/'.$produit->photo_pro }}" data-popup="lightbox">
                                    <img src="{{ asset("uploads/produits/").'/'.$produit->photo_pro }}" alt="" class="img-preview rounded">
                                </a>
                            @else
                                <i class="icon-bag icon-3x opacity-75"></i>
                            @endif
                            
                        </div>

                        <div class="media-body text-right">
                            <h3 class="mb-0">{{ number_format($produit->quantite_pro, 0, " ", ",") }}</h3>
                            <span class="text-uppercase font-size-xs">{{ $produit->libelle_pro }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset("inter/img/reveil-logo.png") }}" width="300" class="img-fluid" alt="">
                    {{-- <i class="icon-html5 icon-5x text-warning mt-1 mb-3"></i> --}}
                    {{-- <h6 class="font-weight-semibold">SOUTHERN IT CONSULTING</h6> --}}
                    <h1 class="font-weight-bolder mb-3">Bienvenue sur l'espace d'administration.</h1>
	                @include('flashy::message')
                    
                    {{-- <a href="#" class="btn btn-info">Read more &rarr;</a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection