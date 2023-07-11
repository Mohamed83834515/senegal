@extends('dashboard.layouts.dashboard', ['title' => 'Etat & Rapport'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Etat & Rapport</span>
                <span class="breadcrumb-item active">Rapport Indicateur</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        {{-- <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Nouvelle Activité
                </a>
            </div>
        </div> --}}
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                <th>Axes</th>
                <th>Activités</th>
                <th>Direction/Structure</th>
                <th>Partenaires MO</th>
                <th>T1</th>
                <th>T2</th>
                <th>T3</th>
                <th>T4</th>
                <th>Tâches</th>
                <th>Indicateurs</th>
                <th>Observations</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>


</div>
@endsection
