<?php
$btn_text_color = get_field('country_button_text_color') ?: '#7B041F';
$btn_bg_color = get_field('country_button_bg_color') ?: '#FEAF22';
$btn_text_hover = get_field('country_button_text_hover') ?: '#FFFFFF';
$btn_bg_hover = get_field('country_button_bg_hover') ?: '#7B041F';
?>

<style>
  .btn-settings {
    color: <?php echo esc_attr($btn_text_color); ?>;
    background-color: <?php echo esc_attr($btn_bg_color); ?>;
  }

  .btn-settings:hover,
  .btn-settings:focus,
  .btn-settings:active {
    color: <?php echo esc_attr($btn_text_hover); ?>;
    background-color: <?php echo esc_attr($btn_bg_hover); ?>;
  }
</style>
