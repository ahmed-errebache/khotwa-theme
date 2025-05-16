<?php
  $is_rtl           = is_rtl();
  $current_language = substr( get_locale(), 0, 2 );
  $direction_class  = ( $is_rtl && $current_language === 'ar' ) ? 'rtl_choose' : 'ltr_choose';

  // Champs ACF
  $titre_section = get_field('titre_section');
  $benefits      = get_field('repetetor_why_choose_us_'); 
  $maps          = get_field('why_choose_image');
  $button_text   = get_field('why_choose_us_text_button');
  $color_section = get_field('color_section') ?: '#FAA815';

  $maps_url = is_array($maps) && isset($maps['url'])
    ? esc_url($maps['url'])
    : esc_url($maps);
?>
<section
  class="why_choose_us py-5 <?php echo $direction_class; ?>"
  style="background-color: <?php echo esc_attr($color_section); ?>;"
  data-aos="fade-up"
>
  <div class="container">
    <div class="row align-items-center">

      <!-- Colonne gauche -->
      <div class="col-lg-5">
        <?php if ( $titre_section ): ?>
          <h2
            class="section-title fw-bold mb-5"
            data-aos="fade-down"
            data-aos-delay="200"
          >
            <?php echo wp_kses_post( $titre_section ); ?>
          </h2>
        <?php endif; ?>

        <?php if ( $maps_url ): ?>
          <img
            src="<?php echo $maps_url; ?>"
            alt="Carte"
            class="img-fluid rounded mobile mb-4"
            data-aos="fade-right"
            data-aos-delay="300"
          >
        <?php endif; ?>

        <?php if ( $benefits ): ?>
          <ul class="list-unstyled">
            <?php foreach ( $benefits as $i => $item ):
              $icon     = $item['icon_choose'] ?? '';
              $text     = $item['text_choose'] ?? '';
              $icon_url = is_array($icon) && isset($icon['url'])
                ? esc_url($icon['url'])
                : esc_url($icon);
              $delay    = 400 + $i * 100;
            ?>
              <li
                class="d-flex align-items-center mb-3"
                data-aos="fade-right"
                data-aos-delay="<?php echo $delay; ?>"
              >
                <?php if ( $icon_url ): ?>
                  <img src="<?php echo $icon_url; ?>"
                       alt=""
                       class="me-3"
                       style="width:32px; height:auto;">
                <?php endif; ?>
                <span><?php echo esc_html( $text ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

        <?php if ( $button_text ): ?>
          <div
            class="mt-4 button_blc"
            data-aos="zoom-in"
            data-aos-delay="800"
          >
            <a href="#"
               class="btn btn-danger btn-lg">
              <?php echo esc_html( $button_text ); ?>
            </a>
          </div>
        <?php endif; ?>
      </div>

      <!-- Colonne droite -->
      <div class="col-lg-7 text-center mt-4 mt-lg-0 desktop">
        <?php if ( $maps_url ): ?>
          <img
            src="<?php echo $maps_url; ?>"
            alt="Carte"
            class="img-fluid rounded"
            data-aos="fade-left"
            data-aos-delay="300"
          >
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
