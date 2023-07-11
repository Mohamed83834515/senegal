@extends('dashboard.layouts.dashboard', ['title' => 'Modules'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <div class="mb-3">
            <h3 class="mb-1"></i> <span class="font-weight-semibold">Modules</span></h3>
            <span class="text-muted d-block">
                <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
                <span class="breadcrumb-item">Administration</span>
                <span class="breadcrumb-item">Module</span>
                <span class="breadcrumb-item active">Modifier un module</span>
            </span>
        </div>
        
    </div>

    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <span class="h4 fw-bolder text-black">Modifier le module : {{ $module->libelle }}</span>
    </div>
</div>
@endsection

@section('content')
<div class="card p-4">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing"> 
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
            <form class="row" id="add" action="{{ route('module.update', $module) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Module parent</label>
                        <select class="form-control select @error('idsmo') is-invalid @enderror" name="idsmo" aria-describedby="idsmo" data-fouc>
                            <option value="0">Sélectionner le module parent</option>
                            @foreach ($modules as $current_module)
                                <option value="{{ $current_module->id }}" {{ $module->idsmo == $current_module->id ? 'selected' : ''  }}>{{ $current_module->libelle }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" aria-describedby="libelle" placeholder="Saississez le nom du module" value="{{ $module->libelle }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Icône <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('icone') is-invalid @enderror" id="icone" name="icone" aria-describedby="icone" placeholder="Saississez l'icône à utiliser" value="{{ $module->icone }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Lien <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" aria-describedby="lien" placeholder="Saississez le lien à utiliser" value="{{ $module->lien }}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mb-3">
                        <label for="inputEmail4" class="text-black">Classe css</label>
                        <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" name="class" aria-describedby="class" placeholder="Saississez les classes css à utiliser" value="{{ $module->class }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('module.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('CUSTUM SCRIPTS')
    <script src="{{ asset('dashboard/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('dashboard/plugins/select2/custom-select2.js') }}"></script>
@endsection