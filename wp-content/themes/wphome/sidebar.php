<?php
if (!is_active_sidebar('sidebar-right')) {
    return;
}
?>


<?php dynamic_sidebar('sidebar-right');
global $wphome_options;
$wphome_banner3 = $wphome_options['wphome-banner-3'];
if ($wphome_banner3):
    echo $wphome_banner3;
endif;

