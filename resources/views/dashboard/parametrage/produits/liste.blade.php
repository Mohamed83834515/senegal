@extends('dashboard.layouts.dashboard', ['title' => 'Produits'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Paramétrage</span>
                <span class="breadcrumb-item active">Produits</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Basic initialization -->
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produits as $produit)
                <tr>
                    <td>
                        @if ($produit->photo_pro)
                            <a href="{{ asset("uploads/produits/").'/'.$produit->photo_pro }}" data-popup="lightbox">
                                <img src="{{ asset("uploads/produits/").'/'.$produit->photo_pro }}" alt="" class="img-preview rounded">
                            </a>
                        @else
                            <a href="{{ asset("dashboard/global_assets/images/placeholders/placeholder.jpg") }}" data-popup="lightbox">
                                <img src="{{ asset("dashboard/global_assets/images/placeholders/placeholder.jpg") }}" alt="" class="img-preview rounded">
                            </a>
                        @endif
                    </td>
                    <td>{{ $produit->libelle_pro }}</td>
                    <td>{{ $produit->description_pro }}</td>
                    <td>{{ $produit->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        <a href="{{ route('produit.edit', $produit) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                        <a href="{{ route('produit.destroy', $produit) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $produit->id_pro }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $produit->id_pro }}" action="{{ route('produit.destroy', $produit) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('produit.store') }}">
                    @csrf
                    @method('POST')
    
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau produit</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
    
                    <div class="modal-body">
                        
                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom du produit <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Reveil" aria-describedby="nom" placeholder="Saississez le nom" required>
                            </div>
            
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="description" aria-describedby="description"></textarea>
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
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /iconified modal -->
</div>
<!-- /basic initialization -->
@endsection