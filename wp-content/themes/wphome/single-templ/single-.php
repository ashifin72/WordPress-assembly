<!-- ##### Viral News Breadcumb Area Start ##### -->
<?php
require(get_template_directory() . '/files/wp-redux.php');
?>
<div class="viral-news-breadcumb-area section-padding-50">
  <div class="container h-100">
    <div class="row h-100 align-items-center">

      <!-- Breadcumb Area -->
      <div class="col-12 col-md-4">
        <h3><?php echo $wphome_banner_all ?></h3>
        <nav aria-label="breadcrumb">
            <?php dimox_breadcrumbs() ?>
        </nav>
      </div>

      <!-- Add Widget -->
      <div class="col-12 col-md-8">
        <div class="add-widget">

            <?php echo $wphome_banner_top ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Viral News Breadcumb Area End ##### -->

<!-- ##### Blog Post Area Start ##### -->
<div class="blog-area section-padding-100">
  <div class="container">
    <div class="row">
      <!-- Blog Posts Area -->
      <div class="col-12 col-lg-8">


        <div class="single-blog-post-details">
          <div class="post-data">

            <h1 class="post-title"><?php the_title() ?></h1>
            <div class="post-meta">

              <!-- Post Details Meta Data -->
              <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
                <!-- Post Author & Date -->
                <div class="post-authors-date">

                  <p class="post-date"><?php the_time('d M Y'); ?></p>
                </div>
                <!-- View Comments -->
                <div class="view-comments">

                  <a href="<?php echo $comments_permalink; ?>"><?php comments_number('нет комментариев', 'один комментарий', '% комментариев'); ?>
                    .</a>
                </div>

              </div>
              <div class="content-single">
                  <?php the_content() ?>

              </div>
                <?php if ($wphome_banner2):
                    echo $wphome_banner2;
                endif; ?>
              <div class="sample-posts">
                <h5>Читайте также:</h5>
                  <?php
                  $categories = get_the_category($post->ID);
                  if ($categories) {
                      $category_ids = array();
                      foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                      $args=array(
                          'category__in' => $category_ids,
                          'post__not_in' => array($post->ID),
                          'showposts' => '4',
                          'orderby' => 'rand',
                          'ignore_sticky_posts' => '1',
                          'no_found_rows' => true,
                          'cache_results' => false
                      );
                      $my_query = new wp_query($args);
                      if( $my_query->have_posts() ) {
                          echo '<div class="row">';
                          while ($my_query->have_posts()) {
                              $my_query->the_post();
                              ?>
                            <div class=" col-md-3 col-6 top-posts">
                              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array(100,100)); ?>
                                  <?php the_title(); ?></a>
                            </div>
                              <?php
                          }
                          echo '</div>';
                      }
                      wp_reset_query();
                  }
                  ?>
              </div>

            </div>
          </div>

        </div>


          <?php comments_template(); ?>
      </div>

      <!-- Sidebar Area -->
      <div class="col-12 col-lg-4">
        <div class="sidebar-area">
            <?php get_sidebar() ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Blog Post Area End ##### -->