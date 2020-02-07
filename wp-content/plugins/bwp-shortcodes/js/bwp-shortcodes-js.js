/**
 * bwp- Shortcodes plugin | js script
 */
jQuery.noConflict()(function($) {
  $(document).ready(function() {
    "use strict";

    // toggle
    $('.bwp-sc-toggle-trigger').click(function() {
      $(this).toggleClass('bwp-sc-active').next().slideToggle('fast');
      return false;
    });

  });
});
