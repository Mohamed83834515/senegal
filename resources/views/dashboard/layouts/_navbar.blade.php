<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark fixed-top">
	<div class="navbar-brand">
		<a href="#" class="d-inline-block">
			<img src="{{ asset("inter/img/ruche.png") }}" alt="">
		</a>
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			 
            <li class="nav-item dropdown dropdown-user">
                            <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset("inter/img/programme.png") }}" class="rounded-circle mr-2" height="34" alt="">
                                <span>Programmes</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
							 
									@foreach ($programmes as $projet)
									{{-- @php
										$programme = session('programmes')->where('id_prg', '=', $projet->idprg_prj)->first();
										
									@endphp --}}
									<a  href="{{ route('dashboard.show',$projet->id_prg) }}" class="dropdown-item active"><i class="icon-switch2"></i>
										{{$projet->sigle_prg}} <br>
										{{$projet->nom_prg}}
									</a>

									@endforeach	
							 
                               

                            </div>
                        </li>
						<li class="nav-item dropdown dropdown-user">
                            <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset("inter/img/projet.png") }}" class="rounded-circle mr-2" height="34" alt="">
                                <span>Projets</span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
								
								@if (session('projetuser'))
								@php
									 $projets = session('projetuser')->where('idprg_prj', '=', session('id_programme'));
								@endphp
							 
								 @foreach ($projets as $projet)
                                <a  href="{{ route('dashboard.showProjet',$projet->id_prj) }}" class="dropdown-item"><i class="icon-switch2"></i>
                                    {{$projet->sigle_prj}} <br>
                                    {{$projet->intitule_prj}}
                                </a>

                                @endforeach
								@else
								@php
										$projets = session('AllProjets')->first();
										dd($projets);
								@endphp
							

								@endif

                               
                            </div>
                        </li>
			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<img src="{{ asset("inter/img/avatar_usr.png") }}" class="rounded-circle mr-2" height="34" alt="">
					<span>{{ Auth::user()->nom }}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="#" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Déconnexion</a>
					<form id="logout-form" action="{{ route('logout') }}"method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>

		</ul>
	</div>
</div>
<!-- /main navbar -->
