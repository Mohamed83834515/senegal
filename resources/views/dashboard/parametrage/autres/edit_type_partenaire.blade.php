@extends('dashboard.layouts.dashboard', ['title' => 'Modifier type de partenaire'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Autres paramétrages</span>
                <span class="breadcrumb-item">Type de partenaire</span>
                <span class="breadcrumb-item active">{{ $type->nom_tpt }}</span>
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

            <form class="row" id="add" action="{{ route('type.update', $type) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="" value="{{ $type->nom_tpt }}"  aria-describedby="code" placeholder="" required>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="description" aria-describedby=""  >{{ $type->description_tpt }}</textarea>
                            </div>
               

                <br>
                <div class="col-md-6 ">
                    <a href="{{ route('autres.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection