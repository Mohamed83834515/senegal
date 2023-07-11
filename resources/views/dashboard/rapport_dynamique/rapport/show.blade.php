@extends('dashboard.layouts.dashboard', ['title' => 'Rapport_dynamique'])
@section('page_header')
<div class="page-header-content header-elements-md-inline">

    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil </a>
            <span class="breadcrumb-item">Rapport_Dynamique </span>
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active"> Rapport({{$nom}})</span>
         </div>
    </div>
    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection
@section('content')

<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic">
     <thead>
    <tr>

     @foreach ($colonne as $col)
     <td style="color: black">

     {{$col}}
     </td>
     @endforeach
     </tr>

    </thead>
        <tbody>
            @foreach ($rapport as $key => $values)


            <tr>
                @foreach ($values as $value)
                <td>
                    {{$value}}
                </td>

            @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

 <br>
@endsection
