<footer class="footer-area">

  <!-- Main Footer Area -->
  <div class="main-footer-area">
    <div class="container">
      <div class="row">

        <!-- Footer Widget Area -->
        <div class="col-12 col-md-6 col-lg-4">
            <?php dynamic_sidebar('footer-1'); ?>
        </div>

        <div class="col-12 col-md-6 col-lg-4">
          <!-- Newsletter Widget -->
            <?php
            require(get_template_directory() . '/files/wp-redux.php');
            if ($wphome_banner_footer):
                echo $wphome_banner_footer;
            endif; ?>
        </div>

        <!-- Footer Widget Area -->
        <div class="col-12 col-md-6 col-lg-4">
            <?php dynamic_sidebar('footer-3'); ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Bottom Footer Area -->
  <div class="bottom-footer-area">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <!-- Copywrite -->
          <p><a href="<?php bloginfo('url') ?>">
              Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                  <?php if ($wphome_footer_desc):
                  echo $wphome_footer_desc;
                  else: ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>
              <?php endif;?>
              <i class="fa fa-heart-o" aria-hidden="true"></i>
            </a>
            by <a href="https://Info-m.pro" target="_blank">Info-M</a>
          </p>
        </div>
        <div class="col-12 footer-stat">
            <?php echo $wphome_footer_coint ?>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- ##### Footer Area Start ##### -->
<?php wp_footer() ?>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('.container .col-lg-4').theiaStickySidebar({
            // Settings
            additionalMarginTop: 30
        });
    });
</script>


</body>

</html>