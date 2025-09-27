<section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">
              <div class="row">
                <div class="col-lg-8">
                  <span>Stand Blog HTML5 Template</span>
                  <h4>Creative HTML Template For Bloggers!</h4>
                </div>
                <div class="col-lg-4">
                  <div class="main-button">
                    <a rel="nofollow" href="https://templatemo.com/tm-551-stand-blog" target="_parent">Download Now!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>


<section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <?php if(!empty($news)):?>
                  <?php foreach($news as $newsItems):?>
                    <?php $image = getImage('news', $newsItems['id'], $newsItems['img'])?>
                    <div class="col-lg-12">
                      <div class="blog-post">
                        <div class="blog-thumb">
                          <img style="" src="<?=$image?>" alt="">
                        </div>
                        <div class="down-content">
                          <span><?=$newsItems['category_name']?></span>
                          <a href="?controller=news_view&id=<?=$newsItems['id']?>"><h4><?=$newsItems['title']?></h4></a>
                          <ul class="post-info">
                           <!-- <li><a href="#">Admin</a></li> -->
                            <li><a><?=date('d.m.Y | H:i', strtotime($newsItems['create_at']))?></a></li>
                            <li><a><i class="fas fa-eye"></i> <?=$newsItems['seen_count']?></a></li>
                          </ul>
                          <p><?=$newsItems['description']?></p>
                          <div class="post-options">
                            <div class="row">
                              <div class="col-6">
                                <ul class="post-tags">
                                  <li><i class="fa fa-tags"></i></li>
                                  <li><a href="#">Beauty</a>,</li>
                                  <li><a href="#">Nature</a></li>
                                </ul>
                              </div>
                              <div class="col-6">
                                <ul class="post-share">
                                  <li><i class="fa fa-share-alt"></i></li>
                                  <li><a href="#">Facebook</a>,</li>
                                  <li><a href="#"> Twitter</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach;?>
                <?php endif;?>
                <div class="col-lg-12">
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php require_once "views/widgets/sidebar.php"?>
        </div>
      </div>
</section>
