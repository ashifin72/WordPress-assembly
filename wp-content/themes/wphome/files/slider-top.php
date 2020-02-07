<?php
/**
 * Слайдер записей в шапке сайта
 */
function slider_post_top()
{
    ?>
  <div class="hero-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="hero-slides owl-carousel">
              <?php $pc = new WP_Query("post_type=wpshop&orderby=date&posts_per_page=6"); ?>
              <?php while ($pc->have_posts()) : $pc->the_post(); ?>
                <!-- Single Blog Post -->
                <div class="single-blog-post d-flex align-items-center mb-50">
                  <div class="post-thumb">

                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post_thumbnail', array('class' => 'img-responsive')) ?></a>
                  </div>
                  <div class="post-data">
                    <a href="<?php the_permalink(); ?>" class="post-title">
                      <h6><?php trim_title_chars(35, '...'); ?></h6>
                    </a>
                    <div class="post-meta">
                      <p class="post-date"><?php echo wphome_excerpt(5) ?></p>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
          </div>
        </div>

      </div>
    </div>
  </div>
    <?php
}

?>
