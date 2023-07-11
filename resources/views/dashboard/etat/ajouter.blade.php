@extends('dashboard.layouts.dashboard', ['title' => 'Ajouter un projet'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Projets</a>
                <span class="breadcrumb-item active">Ajouter un projet</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>
            </div>
        </div>
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

            <form class="row" id="add" action="{{ route('projet.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Catégorie <span class="text-danger text-bold">*</span></label>
                        <select class="select @error('categorie') is-invalid @enderror" name="categorie" aria-describedby="categorie" placeholder="Sélectionner la categorie" required>
                            @foreach ($typeParametre->where('code_typ', 'cat')->first()->parametres as $parametre)
                                <option value="{{ $parametre->id_par }}" {{ old('categorie') == $parametre->id_par ? 'selected' : '' }}>{{ $parametre->libelle_par }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Domaine <span class="text-danger text-bold">*</span></label>
                        <select class="select @error('domaine') is-invalid @enderror" name="domaine" aria-describedby="domaine" placeholder="Sélectionner le domaine" required>
                            @foreach ($typeParametre->where('code_typ', 'dom')->first()->parametres as $parametre)
                                <option value="{{ $parametre->id_par }}" {{ old('domaine') == $parametre->id_par ? 'selected' : '' }}>{{ $parametre->libelle_par }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Nom du projet <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" aria-describedby="nom" placeholder="Saississez le nom" value="{{ old('nom') }}" required>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Budget recherché <span class="text-danger text-bold"></span></label>
                        <input type="number" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" aria-describedby="budget" placeholder="Saississez le budget" value="{{ old('budget') }}">
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Investissement minimum <span class="text-danger text-bold"></span></label>
                        <input type="number" class="form-control @error('investissement_min') is-invalid @enderror" id="investissement_min" name="investissement_min" aria-describedby="investissement_min" placeholder="Saississez le budget minimum" value="{{ old('investissement_min') }}">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                        <textarea type="text" class="summernote" id="summernote" name="description" aria-describedby="description">{{ old('description') }}</textarea>
                    </div>
                </div>

                <div class="col-md-12 mb-4">
                    <div class="form-group mb-3">
                        <label class="col-lg-12 col-form-label font-weight-semibold">Image:</label>
                        <div class="col-lg-12">
                            <input type="file" class="file-input" name="images[]" multiple data-fouc>
                            <span class="form-text text-muted">Taille max (10 mb).</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <a href="{{ route('projet.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection