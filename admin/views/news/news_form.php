<?php 
if(isset($newsItem) && !empty($newsItem)) {
  $image = getImage('news', $newsItem['id'], $newsItem['img']);
}
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
              <div class="col-sm-6"><h3 class="mb-0">Yangliklar</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="/admin">Asosiy</a></li>
                  <li class="breadcrumb-item"><a href="?acontroller=news_index">Yangliklar</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?=isset($newsItem)? "Taxrirlash":"Qo'shish"?></li>
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
                  <div class="card-header"><h3 class="card-title">Yangliklar</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <!--begin::Body-->
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Sarlavha</label>
                                <input name="title" id="title" type="text" class="form-control"  value="<?=isset($newsItem) && !empty($newsItem['title']) ? $newsItem['title']:""?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategoriyasi</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                  <?php if(!isset($categoryItem)): ?>
                                    <option value="">Kategoriyani tanlang...</option>
                                  <?php endif?>
                                  <?php if(!empty($categories)): ?>
                                    <?php  foreach($categories as $category): ?>
                                      <option value="<?=$category['id']?>" <?=isset($categoryItem) && $categoryItem['id']==$category['id'] ? "selected":"" ?>><?=$category['name']?></option>
                                    <?php endforeach ?>
                                  <?php endif?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?=isset($newsItem) && !empty($newsItem['description'])? $newsItem['description']: "" ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Asosiy matn</label>
                                <textarea name="body" id="body" cols="30" rows="10" class="form-control" required><?=isset($newsItem) && !empty($newsItem['body'])? $newsItem['body']: "" ?></textarea>
                            </div>
                            <div class="mb-3">
                              <div class="row">
                                
                                <div class="col-lg-<?=!empty($newsItem)? '6':'12' ?>">
                                  <label for="image" class="form-label">Rasmi</label>
                                  <input name="image" id="image" type="file" class="form-control" accept="image/jpg, image/png image/jpeg">
                                </div>

                                <div class="col-lg-<?=!empty($newsItem)? '6':'12' ?>">
                                  <img style="width: 150px; heigt: 150px; object-fit:cover" src="<?=$image?>" alt="">
                                </div>

                              </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="status" class="form-label" require>Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option <?=isset($newsItem)&& $newsItem['status']==STATUS_ACTIVE ? "selected":""?> value="<?=STATUS_ACTIVE?>">Active</option>
                                    <option <?=isset($newsItem)&& $newsItem['status']==STATUS_NOT_ACTIVE ? "selected":""?> value="<?=STATUS_NOT_ACTIVE?>">Active emas</option>
                                </select>
                            </div>
                        </div>
                        <!--end::Body-->
                        <!--begin::Footer-->
                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><?=isset($newsItem)? "Taxrirlash":"Qo'shish"?></button>
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

<script>
  document.getElementById('image').addEventListener('change', function() {
    const file = this.files[0];
    if(file) {
      const maxSize=5*1024*1024;
      if(file.size>maxSize) {
        alert("Fayl hajmi 5mb dan katta bo'lmasligi kerak!")
        this.value ="";
      }
    }
  });
</script>
