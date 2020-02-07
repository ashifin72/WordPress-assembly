<?php get_header(); ?>
<!-- ##### Hero Area Start ##### -->
<?php slider_post_top(7)?>

<!-- ##### Hero Area End ##### -->

<!-- ##### Blog Post Area Start ##### -->
<div class="blog-area section-padding-100">
  <div class="container">
    <div class="row">
      <!-- Blog Posts Area -->
      <div class="col-12 col-lg-8">
        <div class="row">

          <?php if(have_posts()):
              while (have_posts()): the_post();?>

                <!-- Single Blog Post -->
                <div class="col-12 col-lg-6">
                  <div class="single-blog-post style-3">
                    <!-- Post Thumb -->
                    <div class="post-thumb">
                      <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('post_thumbnail', array('class' => 'img-responsive content-thumbnail')) ?></a>
                    </div>
                    <!-- Post Data -->
                    <div class="post-data">
                      <a href="<?php the_permalink(); ?>" class="post-title">
                        <h6> <?php the_title(); ?></h6>
                      </a>
                      <div class="post-meta">

                        <p class="post-date"><?php the_time('d M Y'); ?> <a href="<?php echo $comments_permalink;?>"><?php comments_number( 'нет комментариев', 'один комментарий', '% комментариев' ); ?>.</a></p>
                        <p class="post-cat"><?php the_category(', '); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
          <?php else: ?>
 <H3> Записей нет!</H3>
          <?endif; ?>


        </div>

        <div class="row">
          <div class="col-12">
            <div class="viral-news-pagination">
              <nav aria-label="Page navigation example">
                    <?php the_posts_pagination([
                        'show_all'     => false, // показаны все страницы участвующие в пагинации
                        'end_size'     => 2,     // количество страниц на концах
                        'mid_size'     => 2,     // количество страниц вокруг текущей
                        'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                        'prev_text'    => __('«'),
                        'next_text'    => __('»'),
                        'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                        'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.

                        'class' => 'pagination',
                    ]) ?>

              </nav>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar Area -->
      <div class="col-12 col-lg-4">
        <div class="sidebar-area theiaStickySidebar">
            <?php get_sidebar() ?>

        </div>


      </div>
    </div>
  </div>
</div>
<!-- ##### Blog Post Area End ##### -->

<?php get_footer(); ?>

