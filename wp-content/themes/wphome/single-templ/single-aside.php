

<!-- ##### Blog Post Area Start ##### -->
<div class="blog-area section-padding-100">
  <div class="container">
    <div class="row">
      <!-- Blog Posts Area -->
      <div class="col-12">


        <div class="single-blog-post-details">
          <div class="post-data">

            <h1 class="post-title"><?php the_title() ?></h1>
            <div class="post-meta">

              <!-- Post Details Meta Data -->

              <div class="content-single">
                  <?php the_content() ?>
              </div>

            </div>
          </div>

        </div>


          <?php comments_template(); ?>
      </div>


    </div>
  </div>
</div>
<!-- ##### Blog Post Area End ##### -->