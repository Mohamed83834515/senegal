@extends('dashboard.layouts.dashboard', ['title' => 'Utilisateurs'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <div class="mb-3">
            <h3 class="mb-1"></i> <span class="font-weight-semibold">Utilisateurs</span></h3>
            <span class="text-muted d-block">
                <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
                <span class="breadcrumb-item">Administration</span>
                <span class="breadcrumb-item">Utilisateurs</span>
                <span class="breadcrumb-item active">Ajouter un utilisateur</span>
            </span>
        </div>
        
    </div>

    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('profil.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
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
            <form class="row" id="add" action="{{ route('user.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Profil <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('profil_id') is-invalid @enderror" name="profil_id" aria-describedby="profil_id" placeholder="Sélectionner le profil" required>
                            @foreach ($profils as $profil)
                                <option value="{{ $profil->id }}" {{ old('profil_id') == $profil->id ? 'selected' : ''  }}>{{ $profil->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" aria-describedby="nom" placeholder="Saississez le nom de l'utilisateur" value="{{ old('nom') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Prénom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" aria-describedby="prenom" placeholder="Saississez le prénom de l'utilisateur" value="{{ old('prenom') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Email <span class="text-danger text-bold">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" placeholder="Saississez l'email de l'utilisateur" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Profil <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('profil_id') is-invalid @enderror" name="fonction" aria-describedby="profil_id" placeholder="Sélectionner le profil" required>
                            @foreach ($fonctions as $profil)
                                <option value="{{ $profil->id_fnct }}" {{ old('fonction') == $profil->id_fnct ? 'selected' : ''  }}>{{ $profil->nom_fnct }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('user.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection