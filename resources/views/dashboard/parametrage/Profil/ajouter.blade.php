@extends('dashboard.layouts.dashboard', ['title' => 'Profils'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <div class="mb-3">
            <h3 class="mb-1"></i> <span class="font-weight-semibold">Profils</span></h3>
            <span class="text-muted d-block">
                <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
                <span class="breadcrumb-item">Administration</span>
                <span class="breadcrumb-item">Profils</span>
                <span class="breadcrumb-item active">Ajouter un profil</span>
            </span>
        </div>
        
    </div>

    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('profil.create') }}" class="btn bg-teal">Ajouter un profil</a>
    </div> --}}
</div>
@endsection

@section('content')
    <div class="card p-4">
        <div class="row ">
            <div class="col-xl-12 col-lg-12 col-sm-12 ">
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
                <form class="row" id="add" action="{{ route('profil.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" aria-describedby="libelle" placeholder="Saississez le nom du profil" value="{{ old('libelle') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">commentaire</label>
                            <input type="text" class="form-control @error('commentaire') is-invalid @enderror" id="commentaire" name="commentaire" aria-describedby="commentaire" placeholder="Saississez le commentaire" value="{{ old('commentaire') }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Attribution de module <span class="text-danger text-bold">*</span></label>
                            <select class="form-control select @error('modules') is-invalid @enderror" name="modules[]" aria-describedby="modules" data-placeholder="choisissez les modules" data-fouc multiple>
                                @foreach ($modules as $module)
                                    <option data-icon="{{ $module->icone }}" value="{{ $module->id }}"
                                        {{ check_module_selected(old('modules'), $module->id) ? 'selected' : '' }}>
                                        {{ $module->libelle }}
                                    </option>
        
                                    @foreach ($module->sous_modules as $sous_module)
                                        <option data-icon="{{ $sous_module->icone }}" value="{{ $sous_module->id }}"
                                            {{ check_module_selected(old('modules'), $sous_module->id) ? 'selected' : '' }}>
                                            {{ $sous_module->libelle }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('profil.index') }}" class="btn btn-block btn-danger">Retour</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection