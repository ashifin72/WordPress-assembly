<!-- Single Featured Post -->
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
        <?php the_content() ?>
    </div>
  </div>

</div>