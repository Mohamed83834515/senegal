<!-- Main sidebar -->
{{-- <div class="sidebar sidebar-dark sidebar-main sidebar-fixed sidebar-expand-md bg-custom">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{ asset("inter/img/avatar_usr.png") }}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ Auth::user()->nom }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-bubbles6 font-size-sm"></i> &nbsp;{{ Auth::user()->email }}
                        </div>
                    </div>

                    {{-- <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div> 
                </div>
            </div>
        </div>
        <!-- /user menu -->

 
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">
                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Menu</div> <i class="icon-menu" title="Main"></i></li>
                @foreach ($profil_modules_attribuer as $profil_module)
                    @if ($profil_module->idsmo == null)
                        @if (count(get_sous_module($profil_modules_attribuer, $profil_module->module_id)) <= 0)
                            <li class="nav-item" >
                                <a href="{{ route($profil_module->lien) }}" class="nav-link {{ Request::routeIs(''.$profil_module->lien.'') ? 'active' : '' }} ">
                                    <i class="{{ $profil_module->icone }}"></i>
                                    <span>{{ $profil_module->libelle }}</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item nav-item-submenu {{ request()->is($profil_module->class) ? 'nav-item-expanded nav-item-open' : ''  }}">
                                <a href="#" class="nav-link">
                                    <i class="{{ $profil_module->icone }}"></i> <span>{{ $profil_module->libelle }}</span>
                                </a>
            
                                <ul class="nav nav-group-sub" data-submenu-title="{{ $profil_module->libelle }}">

                                    @foreach (get_sous_module($profil_modules_attribuer, $profil_module->module_id) as $profil_sous_module)
                                        <li class="nav-item">
                                            <a href="{{ route($profil_sous_module->lien) }}"
                                                 class="nav-link {{ Request::routeIs(''.$profil_sous_module->lien.'') ? 'active' : '' }}">
                                                 <i class="{{ $profil_sous_module->icone }}"></i>
                                                 <span>{{ $profil_sous_module->libelle }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                    
                                </ul>
                            </li>
                        @endif
                    @endif
                @endforeach

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div> --}}
<!-- /main sidebar -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
      <ul class="menu-inner">
        <!-- Dashboards -->
        
        @foreach ($profil_modules_attribuer as $profil_module)
        @if ($profil_module->idsmo == null)
            @if (count(get_sous_module($profil_modules_attribuer, $profil_module->module_id)) <= 0)
                <li class="menu-item {{ Request::routeIs(''.$profil_module->lien.'') ? 'active' : '' }} " >
                    <a href="{{ route($profil_module->lien) }}" class="menu-link {{ Request::routeIs(''.$profil_module->lien.'') ? 'active' : '' }}   ">
                        <i class="{{ $profil_module->icone }}  menu-icon tf-icons"></i>
                        <div>{{ $profil_module->libelle }}</div>
                    </a>
                </li>
            @else
        <li class="menu-item  {{ request()->is($profil_module->class) ? ' active ' : ''  }}">
          <a href="javascript:void(0)" class="menu-link menu-toggle">
            <i class="{{ $profil_module->icone }}  menu-icon tf-icons"></i>
            <div>{{ $profil_module->libelle }}</div>
          </a>
          <ul class="menu-sub" data-submenu-title="{{ $profil_module->libelle }}">
            @foreach (get_sous_module($profil_modules_attribuer, $profil_module->module_id) as $profil_sous_module)
            <li class="menu-item">
              <a href="{{ route($profil_sous_module->lien) }}" class="{{ Request::routeIs(''.$profil_sous_module->lien.'') ? 'active' : '' }} menu-link">
                <i class="{{ $profil_sous_module->icone }} menu-icon tf-icons"></i>
                <div>{{ $profil_sous_module->libelle }}</div>
              </a>
            </li>
            @endforeach
          </ul>
        </li>
        @endif
    @endif
@endforeach
      </ul>
    </div>
  </aside>