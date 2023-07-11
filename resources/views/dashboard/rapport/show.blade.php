@extends('dashboard.layouts.dashboard', ['title' => 'Détails du rapport'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <a href="#" class="breadcrumb-item">Dépenses</a>
                <span class="breadcrumb-item active">Détails du rapport</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    Support
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<!-- Inner container -->
<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left content -->
    <div class="w-100 overflow-auto order-2 order-md-1">

        <!-- projet overview -->
        <div class="card">
            <div class="card-header header-elements-md-inline">
                <h5 class="card-title">
                    <a href="{{ route('rapport.index') }}"><i class="icon-arrow-left52 mr-2"></i></a>
                    Rapport du : {{ $rapport->date_reunion_rap->format('d/m/Y') }}
                </h5>

                {{-- <div class="header-elements">
                    <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                        <li class="list-inline-item">
                            Montant :
                            <span class="text-danger font-weight-bold ml-auto">{{ number_format($rapport->montant_rap, 2, ',', ' ') }} F CFA</span>
                        </li>
                    </ul>
                </div> --}}
            </div>

            <div class="nav-tabs-responsive bg-light border-top">
                <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                    <li class="nav-item">
                        <a href="#projet-overview" class="nav-link active" data-toggle="tab">
                            <i class="icon-menu7 mr-2"></i> Détails
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content overflow-hidden">
                <div class="tab-pane fade show active" id="projet-overview">
                    <div class="row">
                        <div class="col-md-12 p-4">
                            <h3>{{ $rapport->objet_rap }}</h3>

                            {!! $rapport->description_rap !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /left content -->


    <!-- Right sidebar component -->
    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- projet details -->
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Détails</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-0">
                    <a href="{{ route('rapport.edit', $rapport) }}" class="btn btn-info btn-block mb-2">
                        <i class="icon-pencil7 mr-2"></i> Modifier
                    </a>

                    <a href="{{ route('rapport.destroy', $rapport) }}" data-toggle="tooltip" data-placement="top" title="Livrer" class="btn bg-danger-400 btn-block mb-2" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $rapport->id_rap }}');">
                        <span>
                            <i class="icon-trash mr-2"></i>
                            Supprimer
                        </span>
                    </a>
                    <form id="delete-form-{{ $rapport->id_rap }}" action="{{ route('rapport.destroy', $rapport) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                
                <table class="table table-borderless table-xs border-top-0 my-2">
                    <tbody>
                        <tr>
                            <td class="font-weight-semibold">Crée le:</td>
                            <td class="text-right">{{ $rapport->created_at->format('d/m/Y à H:i:s') }}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-semibold">Par:</td>
                            <td class="text-right">{{ $rapport->user->prenom.' '.$rapport->user->nom }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /projet details -->

        </div>
        <!-- /sidebar content -->

    </div>
    <!-- /right sidebar component -->

</div>
<!-- /inner container -->  

@endsection