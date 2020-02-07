<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title><?php bloginfo('name') ?></title>

  <!-- Favicon -->
  <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Core Stylesheet -->
    <?php wp_head(); ?>
    <?php
    require(get_template_directory() . '/files/wp-redux.php' );
    ?>
</head>


<body <?php body_class() ?>>
<!-- ##### Header Area Start ##### -->
<header class="header-area">

  <!-- Top Header Area -->
  <div class="top-header-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="top-header-content d-flex align-items-center justify-content-between">
            <!-- Breaking News Area -->
            <div class="top-breaking-news-area">

                <?php wp_nav_menu([
                    'theme_location' => 'ticker',
                    'container' => 'div',
                    'container_class' => 'ticker',
                    'container_id' => 'breakingNewsTicker'
                ]); ?>
            </div>
            <div class="top-social-info-area">
                <?php if ($wphome_fb_url): ?>
                  <a href="<?php echo esc_url($wphome_fb_url) ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if ($wphome_twitter_url): ?>
                  <a href="<?php echo esc_url($wphome_twitter_url) ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if ($wphome_youtube_url): ?>
                  <a href="<?php echo esc_url($wphome_youtube_url) ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if ($wphome_instagram_url): ?>
                  <a href="<?php echo esc_url($wphome_instagram_url) ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <?php endif; ?>
                <?php if ($wphome_vk_url): ?>
                  <a href="<?php echo esc_url($wphome_vk_url) ?>"><i class="fa fa-vk" aria-hidden="true"></i></a>
                <?php endif; ?>
            </div>
            <!-- Social Info Area-->
            <!--              --><?php //wp_nav_menu([
              //                  'theme_location' => 'social',
              //                  'container' => 'div',
              //                  'container_class' => 'top-social-info-area',
              //              ]); ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar Area -->
  <div class="viral-news-main-menu" id="stickyMenu">
    <div class="classy-nav-container breakpoint-off">
      <div class="container">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="viralnewsNav">

          <!-- Logo -->
          <div class="nav-brand">
            <a href="<? echo home_url('/') ?>">
                <?php if ($custom_logo): ?>
              <img src="<?php echo esc_url($custom_logo) ?> " alt="<?php bloginfo('name') ?>"></a>
              <?php else: ?> <h2><?php bloginfo('name') ?></h2>
              <?php endif; ?>
          </div>

          <!-- Navbar Toggler -->
          <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
          </div>

          <!-- Menu -->
          <div class="classy-menu">

            <!-- close btn -->
            <div class="classycloseIcon">
              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>

            <!-- Nav Start -->
              <?php wp_nav_menu([
                  'theme_location' => 'top',
                  'container' => 'div',
                  'container_class' => 'classynav',
                  'menu' => 'primary',
                  'depth' => 2,
                  'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                  'walker' => new wp_bootstrap_navwalker()

              ]); ?>

            <!-- Nav End -->
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- ##### Header Area End ##### -->