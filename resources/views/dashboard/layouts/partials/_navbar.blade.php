<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="index.html" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
			<img src="{{ asset("assets/img/icons/ruche.png") }}" alt="" width="100">
          </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
          <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
      </div>

      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
       
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          
          
        
          <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
            <a href="#" class="nav-link dropdown-toggle hide-arrow">
              @if (session('id_programme'))
              @php
              //dd(session('id_programme'));
                 $programme = session('programmes')->where('id_prg', '=', session('id_programme'))->first();
                // dd($programme)
              @endphp
             
             
               {{-- <span style="font-size: 16px;color:#e79300;">{{ $programme->sigle_prg }}</span> --}}
               
              @else
              
                @php
                
                $programme = session('programmes')->where('id_prg', '=', session('idproj'))->first();
                // dd($programme)
                @endphp
                   <span style="font-size: 16px;color:#e79300;">
                    @if ($programme)
                    {{ $programme->sigle_prg }}	
                    @endif
                    
                  </span>
                @endif	
            
            </a>
            
          </li>
          </ul>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
          
          <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a
              class="nav-link dropdown-toggle hide-arrow"
              href="javascript:void(0);"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false"
            >
            <img src="{{ asset("inter/img/programme.png") }}" class="rounded-circle mr-2" height="34" alt="">
            <span class="text-white">
          @if(session('id_programme'))
            @php
              $prog1= session('programmes')->where('id_prg','=',session('id_programme'))->first();
              //dd($prog1);
            @endphp
            {{ $prog1->sigle_prg }}
          @else
          @php
            //dd(session('programmedefaut'))
            $prog= session('programmedefaut')
            
          @endphp
            {{ $prog->sigle_prg }}
          @endif
          
        </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body text-primary mb-0 me-auto">Shoissisez le programme</h5>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                @foreach (session('programmes') as $projet)
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-food-menu fs-4"></i>
                    </span>
                    <a  href="{{ route('dashboard.show',$projet->id_prg) }}" class="dropdown-item ">
                     <span style="color:#e79300;">
                      {{$projet->sigle_prg}}
                     </span> 
                    </a>
                    {{-- <small class="text-muted mb-0">{{$projet->nom_prg}}</small> --}}
                  </div>
                  @endforeach	
                </div>
              </div>
            </div>
          </li>
            {{-- <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a
              class="nav-link dropdown-toggle hide-arrow menu-toggle"
              href="javascript:void(0);"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false"
            >
            <img src="{{ asset("inter/img/programme.png") }}" class="rounded-circle mr-2" height="34" alt="">
                <span class="text-white">
              @if(session('id_programme'))
                @php
                  $prog1= session('programmes')->where('id_prg','=',session('id_programme'))->first();
                  //dd($prog1);
                @endphp
                {{ $prog1->sigle_prg }}
              @else
              @php
                //dd(session('programmedefaut'))
                $prog= session('programmedefaut')
                
              @endphp
                {{ $prog->sigle_prg }}
              @endif
              
            </span>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                @foreach (session('programmes') as $projet)
                <div class="dropdown-header d-flex align-items-center py-1">
              {{-- @php
                $programme = session('programmes')->where('id_prg', '=', $projet->idprg_prj)->first();
                
              @endphp -}}
              <a  href="{{ route('dashboard.show',$projet->id_prg) }}" class="dropdown-item "><i class="icon-switch2"></i>
                {{$projet->sigle_prg}}
                 <br>
                {{$projet->nom_prg}}
              </a>
                </div>
                
              @endforeach	
              </li>
             
            </ul>
          </li> --}}
          <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
            <a
              class="nav-link dropdown-toggle hide-arrow"
              href="javascript:void(0);"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false"
            >
            <img src="{{ asset("inter/img/projet.png") }}" class="rounded-circle mr-2" height="34" alt="">
             <span class="text-white">Projets</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body text-primary mb-0 me-auto">Shoissisez le projet</h5>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                 <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="bx bx-food-menu fs-4"></i>
                    </span>
                    @if (session('id_programme'))
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
                              $prog= session('programmedefaut');
                              $proj= session('project')->where('idprg_prj','=',$prog->id_prg);
                              @endphp
                               @foreach ($proj as $projet)
                               <a  href="{{ route('dashboard.showProjet',$projet->id_prj) }}" class="dropdown-item"><i class="icon-switch2"></i>
                                {{$projet->sigle_prj}} <br>
                                {{$projet->intitule_prj}}
                               </a>
                               @endforeach
                            @endif
                    
                    {{-- <small class="text-muted mb-0">{{$projet->nom_prg}}</small> --}}
                  </div>
                  </div>
              </div>
            </div>
          </li>
          {{-- <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a
              class="nav-link dropdown-toggle hide-arrow  dropdown-toggle" data-toggle="dropdown"
              href="javascript:void(0);"
              data-bs-toggle="dropdown"
              data-bs-auto-close="outside"
              aria-expanded="false"
            >
            <img src="{{ asset("inter/img/projet.png") }}" class="rounded-circle mr-2" height="34" alt="">
             <span class="text-white">Projets</span>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-1">
              {{-- @php
                $programme = session('programmes')->where('id_prg', '=', $projet->idprg_prj)->first();
                
              @endphp -}}
                    @if (session('id_programme'))
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
                              $prog= session('programmedefaut');
                              $proj= session('project')->where('idprg_prj','=',$prog->id_prg);
                              @endphp
                               @foreach ($proj as $projet)
                               <a  href="{{ route('dashboard.showProjet',$projet->id_prj) }}" class="dropdown-item"><i class="icon-switch2"></i>
                                {{$projet->sigle_prj}} <br>
                                {{$projet->intitule_prj}}
                               </a>
                               @endforeach
                            @endif
                </div>
              </li>
            </ul>
          </li> --}}
     


         
          <!-- Style Switcher -->
                <li class="nav-item me-2 me-xl-0">
                  <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                    <i class="bx bx-sm"></i>
                  </a>
                </li>
              
              <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <img src="{{ asset("inter/img/avatar_usr.png") }}" class="rounded-circle mr-2" height="34" alt="">
                  
              <span class="text-white">{{ Auth::user()->nom }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <div class="dropdown-header d-flex align-items-center py-1">
                      <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="icon-switch2"></i> Déconnexion</a>
                      <form id="logout-form" action="{{ route('logout') }}"method="POST" style="display: none;">
                        @csrf
                      </form>
                    </div>
                  </li>
                 
                </ul>
              </li>
        </ul>
      </div>

      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper container-xxl d-none">
        <input
          type="text"
          class="form-control search-input border-0"
          placeholder="Search..."
          aria-label="Search..."
        />
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
      </div>
    </div>
  </nav>
