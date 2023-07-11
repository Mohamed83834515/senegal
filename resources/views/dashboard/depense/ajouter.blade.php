@extends('dashboard.layouts.dashboard', ['title' => 'Dépenses'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item active">Dépenses</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="{{ route('depense.create') }}" class="breadcrumb-elements-item">
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
            <form class="row" id="add" action="{{ route('depense.store') }}" method="POST">
                @csrf
                @method('POST')

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Motif <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('motif') is-invalid @enderror" id="motif" name="motif" aria-describedby="motif" placeholder="Saississez le motif de la dépense" value="{{ old('motif') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Date de la dépense <span class="text-danger text-bold">*</span></label>
                        <input type="date" class="form-control @error('date_depense') is-invalid @enderror" id="date_depense" name="date_depense" aria-describedby="date_depense" value="{{ old('date_depense') }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Montant <span class="text-danger text-bold">*</span></label>
                        <input type="number" class="form-control @error('montant') is-invalid @enderror" id="montant" name="montant" aria-describedby="montant" placeholder="250000" value="{{ old('montant') }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Description </label>
                        <textarea class="summernote" id="summernote" name="description" aria-describedby="description"></textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <a href="{{ route('depense.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection