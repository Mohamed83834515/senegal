@extends('dashboard.layouts.error', ['title' => 'Page Introuvable' ])

@section('content')		

<!-- Container -->
<div class="flex-fill">

    <!-- Error title -->
    <div class="text-center mb-3">
        <h1 class="error-title">404</h1>
        {{-- @foreach ($dictionnaires->where("id_dic", "=", 83)->all() as $dictionnaire)
        <h5>{{ get_international_content($dictionnaire->francais_dic, $dictionnaire->anglais_dic) }}</h5>
        @endforeach --}}
        <h5>La page que vous recherchez a peut-être été déplacée, renommée ou n'a peut-être jamais existé</h5>
    </div>
    <!-- /error title -->


    <!-- Error content -->
    <div class="row">
        <div class="col-xl-4 offset-xl-4 col-md-8 offset-md-2">

            <!-- Buttons -->
            <div class="row">
                <div class="col-sm-6">
                    {{-- @foreach ($dictionnaires->where("id_dic", "=", 85)->all() as $dictionnaire)
                    <a href="{{ url()->previous() }}" class="btn bg-danger-800 btn-block mt-3 mt-sm-0"><i class="icon-arrow-left13 mr-2"></i> {{ get_international_content($dictionnaire->francais_dic, $dictionnaire->anglais_dic) }}</a>
                    @endforeach --}}
                    <a href="{{ url()->previous() }}" class="btn bg-danger-800 btn-block mt-3 mt-sm-0">
                        <i class="icon-arrow-left13 mr-2"></i> Retour vers la page précédente
                    </a>
                </div>

                <div class="col-sm-6">
                    {{-- @foreach ($dictionnaires->where("id_dic", "=", 84)->all() as $dictionnaire)
                    <a href="{{ route('home') }}" class="btn bg-green btn-block"><i class="icon-home4 mr-2"></i>{{ get_international_content($dictionnaire->francais_dic, $dictionnaire->anglais_dic) }}</a>
                    @endforeach --}}
                    <a href="{{ route('home') }}" class="btn bg-green btn-block">
                        <i class="icon-home4 mr-2"></i>Retour vers la page d'accueil
                    </a>
                </div>
            </div>
            <!-- /buttons -->

        </div>
    </div>
    <!-- /error wrapper -->

</div>
<!-- /container -->


@endsection
