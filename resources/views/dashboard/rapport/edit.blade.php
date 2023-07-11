@extends('dashboard.layouts.dashboard', ['title' => 'Rapports'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Rapports</span>
                <span class="breadcrumb-item active">Modification</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="{{ route('rapport.create') }}" class="breadcrumb-elements-item">
                    <i class="icon-add mr-2"></i>
                    Ajouter une dépense
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
            <form class="row" id="add" action="{{ route('rapport.update', $rapport) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Objet <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('objet') is-invalid @enderror" id="motif" name="objet" aria-describedby="objet" placeholder="Saississez l'objet de la réunion" value="{{ $rapport->objet_rap }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Date de la réunion <span class="text-danger text-bold">*</span></label>
                        <input type="date" class="form-control @error('date_reunion') is-invalid @enderror" id="date_reunion" name="date_reunion" aria-describedby="date_reunion" value="{{ $rapport->date_reunion_rap->format('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold">*</span></label>
                        <textarea class="summernote" id="summernote" name="description" aria-describedby="description">{{ $rapport->description_rap }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <a href="{{ route('rapport.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection