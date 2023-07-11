@extends('dashboard.layouts.dashboard', ['title' => 'Profils'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
     <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
            <span class="breadcrumb-item">Administration</span>
            <span class="breadcrumb-item">Profils</span>
            <span  style="font-size: 16px;color:#e79300;" class="breadcrumb-item active">Modifier un profil</span>
         </div>
     </div>
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <span class="h5 text-black ">Modifier le profil : {{ $profil->libelle }}</span>
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
            <form class="row" id="add" action="{{ route('profil.update', $profil) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" aria-describedby="libelle" placeholder="Saississez le nom du profil" value="{{ $profil->libelle }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">commentaire</label>
                        <input type="text" class="form-control @error('commentaire') is-invalid @enderror" id="commentaire" name="commentaire" aria-describedby="commentaire" placeholder="Saississez le commentaire" value="{{ $profil->commentaire }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Attribution de module <span class="text-danger text-bold">*</span></label>
                        <select id="select2Dark"  class="form-control select2 @error('modules') is-invalid @enderror" name="modules[]" aria-describedby="modules" multiple>
                            @foreach ($modules as $module)
                                <option value="{{ $module->id }}"
                                    {{ check_module_selected($profil_modules, $module->id) ? 'selected' : '' }}>
                                    {{ $module->libelle }}
                                </option>
    
                                @foreach ($module->sous_modules as $sous_module)
                                    <option value="{{ $sous_module->id }}"
                                        {{ check_module_selected($profil_modules, $sous_module->id) ? 'selected' : '' }}>
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
@section('script')
<script src="{{asset("/assets/js/forms-selects.js")}}"></script>
<script src="{{asset("/assets/vendor/libs/select2/select2.js")}}"></script>
@endsection