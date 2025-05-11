<?php
$is_rtl                  = is_rtl();
$current_language        = substr( get_locale(), 0, 2 );
$direction_class         = ( $is_rtl && $current_language === 'ar' )
                            ? 'rtl_firststep_service'
                            : 'ltr_firststep_service';

  // Récupération des champs
  $bg_color_top       = get_field('first_step_bg_color_top');
  $bg_color_bottom       = get_field('first_step_bg_color_bottom');
  $title          = get_field('first_step_title');
  $title_color    = get_field('first_step_title_color');
  $text           = get_field('first_step_subtitle');
  $text_color     = get_field('first_step_subtitle_color');
  $btn_label      = get_field('first_step_button_label');
  $btn_url        = get_field('first_step_button_url');
  $btn_text_color = get_field('first_step_button_text_color');
  $btn_bg_color   = get_field('first_step_button_bg_color');
  $image          = get_field('first_step_image');
  $img_url        = is_array($image) ? $image['url'] : $image;
?>

<style>
    .bloc_first_step {
        background: linear-gradient(
        to top,
        <?php echo esc_attr($bg_color_bottom); ?> 0%,
        <?php echo esc_attr($bg_color_top);    ?> 70%,
        <?php echo esc_attr($bg_color_top);    ?> 100%
        );   
     }
</style>
<section class="bloc_first_step <?php echo esc_attr($direction_class); ?>">
  <div class="container">
    <div class="row align-items-center">
      <!-- Image mobile -->
      <?php if ( $img_url ) : ?>
        <div class="col-md-6 text-center mobile">
            <div class="first_step-image">
                <img src="<?php echo esc_url( $img_url ); ?>"
                            alt="<?php echo esc_attr( get_post_meta($image['ID'], '_wp_attachment_image_alt', true) ); ?>"
                            class="img-fluid">
            </div>
        </div>
      <?php endif; ?>
      <!-- Texte à gauche -->
      <div class="col-md-6 first_step-content" style="color: <?php echo esc_attr($text_color); ?>;">
        <?php if ( $title ) : ?>
          <h2 class="first_step-title mb-5" style="color: <?php echo esc_attr($title_color); ?>;">
            <?php echo $title ?>
          </h2>
        <?php endif; ?>

        <?php if ( $text ) : ?>
          <p class="first_step-text">
            <?php echo $text; ?>
          </p>
        <?php endif; ?>

        <?php if ( $btn_label && $btn_url ) : ?>
          <a href="<?php echo esc_url( $btn_url ); ?>"
             class="btn btn-consultation first_step-button mt-3"
             style="
               color: <?php echo esc_attr($btn_text_color); ?>;
               background-color: <?php echo esc_attr($btn_bg_color); ?>;
             ">
            <?php echo esc_html( $btn_label ); ?>
          </a>
        <?php endif; ?>
      </div>

      <!-- Image à droite -->
      <?php if ( $img_url ) : ?>
        <div class="col-md-6 text-center desktop">
            <div class="first_step-image">
                <img src="<?php echo esc_url( $img_url ); ?>"
                            alt="<?php echo esc_attr( get_post_meta($image['ID'], '_wp_attachment_image_alt', true) ); ?>"
                            class="img-fluid">
            </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
