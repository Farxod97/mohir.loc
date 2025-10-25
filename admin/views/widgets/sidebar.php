    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="/admin" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="./assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">AdminLTE 4</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active d-flex align-items-center">
                  <i class="fas fa-newspaper"></i>
                  <p>
                    Yangiliklar
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="?acontroller=news_index" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Barcha yangiliklar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="?acontroller=category_index" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Yangiliklar kategoriyasi</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="?acontroller=menu_index" class="nav-link d-flex align-items-center">
                  <i class="fas fa-bars"></i>
                  <p>Menular</p>
                </a>
              </li>
  
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->