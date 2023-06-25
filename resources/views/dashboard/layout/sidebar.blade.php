<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('siswa') ? 'active' : '' }}" aria-current="page" href="siswa">
              <span data-feather="file"></span>
            Data Siswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('wali') ? 'active' : '' }}" href="wali">
            <span data-feather="file"></span>
            Data Wali Siswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('pelanggaran') ? 'active' : '' }}" href="pelanggaran">
              <span data-feather="file"></span>
            Data Pelanggaran
          </a>
        </li>
      </ul>
    </div>
  </nav>