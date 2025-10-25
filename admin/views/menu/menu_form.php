<?php 
  require_once __DIR__."/../widgets/header.php"; 
  require_once __DIR__."/../widgets/sidebar.php";
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
                  <li class="breadcrumb-item"><a href="?acontroller=menu_index">Menular</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?=isset($menuItem)? "Taxrirlash":"Qo'shish"?></li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
            
            <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])):?>
                <div class="col-sm-12 error_alert">
                  <div class="alert alert-danger">
                    <?=$_SESSION['error']?>    
                  </div>
                </div>
            <?php endif ?>


          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Bordered Table</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form method="post" action="">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nomi</label>
                                <input name="name" id="name" type="text" class="form-control"  value="<?=isset($menuItem) && !empty($menuItem['name']) ? $menuItem['name']:"$name" ?>">
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Pozitsiya</label>
                                <input name="position" id="position" type="number" class="form-control" value="<?=isset($menuItem) && !empty($menuItem['position']) ? $menuItem['position']:"$position" ?>">
                            </div>
                            <div class="mb-3">
                                <label for="url" class="form-label">Url</label>
                                <input name="url" id="url" type="text" class="form-control"  value="<?=isset($menuItem) && !empty($menuItem['url']) ? $menuItem['url']:"$url" ?>">
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label" require>Nomi</label>
                                <select name="status" id="status" class="form-select">
                                    <option <?=isset($menuItem)&& $menuItem['status']==STATUS_ACTIVE ? "selected":""?> value="<?=STATUS_ACTIVE?>">Active</option>
                                    <option <?=isset($menuItem)&& $menuItem['status']==STATUS_NOT_ACTIVE ? "selected":""?> value="<?=STATUS_NOT_ACTIVE?>">Active emas</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><?=isset($menuItem)? "Taxrirlash":"Qo'shish"?></button>
                        </div>
                        <!--end::Footer-->
                    </form>
                  </div>
                </div>
             </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
<?php
 require_once __DIR__."/../widgets/footer.php";
?>
