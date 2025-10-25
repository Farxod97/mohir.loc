<?php 
  require_once __DIR__."/../widgets/header.php"; 
  require_once __DIR__."/../widgets/sidebar.php";
  //dd($news, true);
?>

 <!--begin::App Main-->
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Yangiliklar kategoriyasi</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Yangliklar kategoriyasi</li>
                </ol>
              </div>
              <div class="col-sm-12 d-flex justify-content-end">
                <a href="?acontroller=category_create" class="btn btn-success">+Qo'shish</a>
              </div>

              <?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])) :?>
                <div class="col-sm-12 mt-2 success_alert">
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                </div>
              <?php endif; ?>


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
                  <div class="card-header"><h3 class="card-title">Yangliklar kategoriyasi</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID</th>
                          <th>Categorya nomi</th>
                          <th>Status</th>
                          <th>Amallar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; if(!empty($categories)):?>
                            <?php foreach($categories as $categoryItem): ?>
                              
                                <tr>
                                  <td><?=$i++?></td>
                                  <td><?=$categoryItem['id']?></td>
                                  <td><?=$categoryItem['name']?></td>

                                  <td>
                                    <?php if($categoryItem['status']==STATUS_ACTIVE):?>
                                        <span class="badge badge-success text-light bg bg-success">Aktiv</span>
                                    <?php else:?>
                                        <span class="badge badge-danger text-light bg bg-danger">Aktiv emas</span>
                                    <?php endif?>
                                  </td>
                                  <td>
                                    <a href="?acontroller=category_update&id=<?=$categoryItem['id']?>" class="btn btn-success">
                                      <i class="fas fa-pencil"></i>
                                    </a>
                                    <a data-action="category_delete" href="?acontroller=category_delete&id=<?=$categoryItem['id']?>" class="btn btn-danger delete_btn" data-id="<?=$categoryItem['id']?>">
                                      <i class="fas fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                            <?php endforeach?>
                        <?php endif ?>
                      </tbody>
                    </table>
            </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
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
