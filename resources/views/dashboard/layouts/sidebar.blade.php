<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        {{-- <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">My Blog</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div> --}}
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard">
                <svg class="bi"><use xlink:href="#house-fill"/></svg>
                Dashboard
              </a>
              {{-- kelas request, jika ada request yang urlnya halaman dashboard maka tampilkan kelas active kalau tidak maka kosongkan --}}
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard/posts">
                <svg class="bi"><use xlink:href="#file-earmark-text"/></svg>
                My Posts
              </a>
              {{-- svg file-earmark-text adalah salah satu icons yang dipanggil menggunakan path yang berada di main.blade --}}
            </li>
          </ul>
        </div>
      </div>
    </div>