<!-- Main navbar -->
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">
    <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-5">
      <a href="index.html" class="app-brand-link gap-2">
        <span class="app-brand-logo demo">
          {{-- C:\laragon\www\SISSE-SENEGAL\public\assets\img\icons --}}
          
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
       <li class="nav-item me-2 me-xl-0">
          <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
            <i class="bx bx-sm"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- /main navbar -->
