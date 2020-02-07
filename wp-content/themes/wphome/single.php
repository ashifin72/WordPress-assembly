<?php get_header(); ?>
<?php the_post();


get_template_part('single-templ/single-' . get_post_format());
?>


<?php get_footer(); ?>


