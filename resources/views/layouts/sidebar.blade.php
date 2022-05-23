<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">NOTULITE</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          @if (auth()->user()->role == 'Administrator')
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
              <span data-feather="command"></span>
              Dashboard
            </a>
          </li>
          <div class="dropdown">
            <button
              class="nav-link bg-light position-relative d-flex align-items-center border-0 dropdown-toggle {{ ($active === 'Pengguna') ? 'active' : ''}}"
              type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="users"></span>
              Pengguna
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/pengguna">Admin</a></li>
              <li><a class="dropdown-item" href="/asn">ASN</a></li>
              <li><a class="dropdown-item" href="/nonasn">Non ASN</a></li>
            </ul>
          </div>

          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === 'ASN') ? 'active' : ''}}" href="/asn">
              <span data-feather="users"></span>
              ASN
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Non ASN') ? 'active' : ''}}" href="/nonasn">
              <span data-feather="users"></span>
              Non ASN
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === 'Rapat') ? 'active' : ''}}" href="/rapat">
              <span data-feather="briefcase"></span>
              Rapat
            </a>
          </li> --}}
          <div class="dropdown">
            <button
              class="nav-link bg-light position-relative d-flex align-items-center border-0 dropdown-toggle {{ ($active === 'Rapat') ? 'active' : ''}}"
              type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <span data-feather="briefcase"></span>
              Rapat
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/publik">Publik</a></li>
              <li><a class="dropdown-item" href="/private">Private</a></li>
            </ul>
          </div>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Notulensi') ? 'active' : ''}}" href="/notulensi">
              <span data-feather="file-text"></span>
              Notulensi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Hasil') ? 'active' : ''}}" href="/hasil">
              <span data-feather="bar-chart-2"></span>
              Hasil
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Data Master</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Jabatan') ? 'active' : ''}}" href="/jabatan">
              <span data-feather="file-text"></span>
              Jabatan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Instansi') ? 'active' : ''}}" href="/instansi">
              <span data-feather="file-text"></span>
              Instansi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Bidang') ? 'active' : ''}}" href="/bidang">
              <span data-feather="file-text"></span>
              Bidang
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        </h6>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Bidang') ? 'active' : ''}}" href="/bidang">

              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-box-arrow-right"><span
                      data-feather="log-out"></span></i> Logout</button>
              </form>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
              <span data-feather="command"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === 'Notulensi') ? 'active' : ''}}" href="/notulensi">
              <span data-feather="file-text"></span>
              Notulensi
            </a>
          </li>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          </h6>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link {{ ($active === 'Bidang') ? 'active' : ''}}" href="/bidang">

                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-box-arrow-right"><span
                        data-feather="log-out"></span></i> Logout</button>
                </form>
              </a>
            </li>
            @endif
          </ul>
      </div>
    </nav>

    {{-- <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $title }}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
        </div>
      </div>

    </main> --}}
  </div>
</div>


</body>

</html>