<?php 
  require_once "widgets/header.php"; 
  require_once "widgets/sidebar.php";
?>
 <!--begin::App Main-->
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Menular</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Menular</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="card mb-4">
                  <div class="card-body">
                   <div class="alert alert-danger">Sahifa topilmadi!</div>
                   <a href="/admin" class="btn btn-primary">Asosiy sahifaga</a>
                  </div>
            </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
<?php
 require_once "widgets/footer.php";
?>
