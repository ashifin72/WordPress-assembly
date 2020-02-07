<?php get_header(); ?>
<!-- ##### Viral News Breadcumb Area Start ##### -->
<div class="viral-news-breadcumb-area section-padding-50">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <?php if (!the_post()): ?>
            <!-- Breadcumb Area -->
            <div class="col-12 col-md-4">
                <h1><?php the_title() ?></h1>
                <nav aria-label="breadcrumb">
                    <?php dimox_breadcrumbs()?>
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
                                 <?php the_content() ?>
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


