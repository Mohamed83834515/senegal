@extends('dashboard.layouts.dashboard', ['title' => 'Modifier le partenaire'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Gestion de stock</span>
                <span class="breadcrumb-item">Fournisseurs</span>
                <span class="breadcrumb-item active">{{$partenaire->definition_pat}}</span>
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
            <form class="row" id="add" action="{{ route('partenaire.update', $partenaire) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6 mb-2">
                    <label for="inputEmail4" class="text-black">Code du partenaire <span class="text-danger text-bold">*</span></label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $partenaire->code_pat }}" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="inputEmail4" class="text-black">Sigle du partenaire <span class="text-danger text-bold">*</span></label>
                    <input type="text" class="form-control" id="code" name="sigle" value="{{ $partenaire->sigle_pat }}" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                </div>

                <div class="col-md-12">
                    <label for="inputEmail4" class="text-black">Nom complet <span class="text-danger text-bold"></span></label>
                    <textarea type="text" class="form-control" name="definition"   aria-describedby="definition">{{ $partenaire->definition_pat }}</textarea>
                </div>
                   <div class="col-md-6">
                    <label for="inputEmail4" class="text-black">Type partenaire <span class="text-danger text-bold"></span></label>
                    <select class="form-control select @error('type') is-invalid @enderror" name="type[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>
                        @foreach ($types as $type)
                        @foreach ($partenaire->type_pat as $pat)
                            
                       
                            <option data-icon="" value="{{$type->id_tpt}}"
                                
                                {{ $type->id_tpt == $pat  ? ' selected' : '' }}>
                                {{ $type->nom_tpt }}
                            </option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
                   <div class="col-md-6">
                    <label for="inputEmail4" class="text-black">Contact <span class="text-danger text-bold"></span></label>
                    <input type="text" class="form-control" name="contact" value="{{ $partenaire->contact_pat }}" aria-describedby="contact"></textarea>
                </div>
                   <div class="col-md-12">
                    <label for="inputEmail4" class="text-black">Email <span class="text-danger text-bold"></span></label>
                    <input type="email" class="form-control" name="email" value="{{ $partenaire->email_pat }}" aria-describedby="email"></textarea>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-lg-12 col-form-label font-weight-semibold">Image:</label>
                        <div class="col-lg-12">
                            <input type="file" class="file-input" name="image" data-fouc>
                            <span class="form-text text-muted">Taille max (10 mb).</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('partenaire.index') }}" class="btn btn-block btn-danger">Retour</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-block btn-success">Enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
