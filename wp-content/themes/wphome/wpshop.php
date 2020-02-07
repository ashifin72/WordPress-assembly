<?php
/*
 * Template Name:  Без сайтбара
 * Template Post Type: post, page, product
 */
?>
<?php get_header(); ?>

<!-- ##### Blog Post Area Start ##### -->
<div class="blog-area section-padding-100">
  <div class="container">
    <div class="row">
      <!-- Blog Posts Area -->
      <div class="col-12">


          <?php the_post();
          echo get_post_format();
          get_template_part('single-templ/single-' . get_post_format());
          ?>


          <?php comments_template(); ?>
      </div>

      <!-- Sidebar Area -->

    </div>
  </div>
</div>
<!-- ##### Blog Post Area End ##### -->

<?php get_footer(); ?>


