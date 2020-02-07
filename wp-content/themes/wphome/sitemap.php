<?php
/*
Template Name: Карта сайта
*/
get_header(); ?>
<!-- ##### Viral News Breadcumb Area Start ##### -->
<div class="viral-news-breadcumb-area section-padding-50">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
        <?php if (!the_post()): ?>
      <!-- Breadcumb Area -->
      <div class="col-12 col-md-4">
        <h1><?php the_title() ?></h1>
        <nav aria-label="breadcrumb">
            <?php dimox_breadcrumbs() ?>
        </nav>
      </div>

      <!-- Add Widget -->
      <div class="col-12 col-md-8">
        <div class="add-widget">
            <?php banner_top_wphome() ?>
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


        <!-- Single Featured Post -->
        <div class="single-blog-post-details">
          <div class="post-data">

            <div class="post-meta">

              <!-- Post Details Meta Data -->
              <div class="post-details-meta-data mb-50 d-flex align-items-center justify-content-between">
              </div>
                <?php the_content() ?>
                <?php
                $exclude_pages = '28, 9';
                $exclude_posts = array();
                ?>


                <?php

                $args = array();

                $categories = get_categories( $args );

                foreach ($categories as $category) {
                    echo "<ul class='sitemap-cat'>";
                    echo "<li><strong>Категория:</strong> <a href=\"".get_category_link($category->term_id)."\" target=\"_blank\" >".$category->name."</a>";
                    $posts = get_posts(array('category' => $category->term_id, 'posts_per_page' => '150'));
                    echo "<ul>";
                    foreach ($posts as $post) {
                        if(!in_array($post->ID, $exclude_posts)){
                            echo "<li><a href=\"".get_permalink($post->ID)."\" target=\"_blank\" >".$post->post_title."</a></li>";
                        }
                    }
                    echo "</ul>";
                    echo "</li>";
                    echo "</ul>";
                }
                ?>

                <?php $args = array('exclude_tree' => $exclude_pages, 'title_li' => ''); ?>

              <h3 class="sitemap-cat">Страницы</h3>

              <ul class="sitemap-cat">
                  <?php wp_list_pages( $args ); ?>
              </ul>

              <p class="sitemap-xml"><a target="_blank" href="<?php  bloginfo('url')?>/sitemap.xml">Просмотр карты сайта в XML</a></p>
            </div>
          </div>

        </div>


          <?php else: ?>
            <H3> Записей нет!</H3>
          <? endif; ?>

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

<?php get_footer(); ?>


