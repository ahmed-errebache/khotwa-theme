<?php
// — Récupération des champs ACF —
$colors = get_field('couleur_background_section');
if ( $colors && isset($colors[0]['premier_couleur'], $colors[0]['douxieme_couleur']) ) {
    $first_color  = $colors[0]['premier_couleur'];
    $second_color = $colors[0]['douxieme_couleur'];
} else {
    $first_color  = '#2D020C';
    $second_color = '#70021C';
}

$title       = get_field('titre_de_la_section_');
$items       = get_field('process_country_repetetor');
$button_text = get_field('text_button_process');

// URLs fixes
$icon_sections_url = esc_url( get_template_directory_uri() . '/assets/img/iconSections.png' );
$arrow_url         = esc_url( get_template_directory_uri() . '/assets/img/flecheProcess.png' );
?>

<!-- Desktop version (≥768px) -->
<?php if ( $title || ( $items && count($items) >= 6 ) ): ?>
<section
  class="process_country d-none d-md-block position-relative py-5 text-white"
  dir="rtl"
  style="background: linear-gradient(to bottom,
      <?php echo esc_attr($first_color); ?> -40%,
      <?php echo esc_attr($second_color); ?> 50%,
      <?php echo esc_attr($first_color); ?> 140%
  );"
  data-aos="fade-up"
  data-aos-duration="800"
>
  <img
    src="<?php echo $icon_sections_url; ?>"
    class="iconSections"
    alt="Décor section"
    data-aos="zoom-in"
    data-aos-delay="200"
  />

  <div class="container">
    <?php if ( $title ): ?>
      <h2
        class="h1 text-center mb-5"
        data-aos="fade-down"
        data-aos-delay="300"
      >
        <?php echo esc_html( $title ); ?>
      </h2>
    <?php endif; ?>

    <?php if ( $items && count($items) >= 6 ): ?>
      <!-- Ligne 1 -->
      <div class="row row1 justify-content-center align-items-center mb-4">
        <?php for ( $i = 0; $i < 3; $i++ ):
          $item     = $items[ $i ];
          $icon     = $item['icon_process_country_repetetor'];
          $icon_url = is_array($icon) && isset($icon['url'])
                      ? esc_url($icon['url'])
                      : esc_url($icon);
          $delay    = 200 + $i * 300; // 200, 500, 800 ms
        ?>
          <div
            class="col-6 col-md-3 text-center"
            data-aos="fade-up"
            data-aos-delay="<?php echo $delay; ?>"
            data-aos-duration="600"
          >
            <?php if ( $icon_url ): ?>
              <img src="<?php echo $icon_url; ?>"
                   class="stage-img mb-3"
                   alt=""
              >
            <?php endif; ?>
            <h5 class="fw-bold mb-3">
              <?php echo esc_html( $item['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item['description_process_country_repetetor'] ); ?>
            </p>
          </div>

          <?php if ( $i < 2 ): ?>
            <div class="col-auto d-flex justify-content-center px-0">
              <img
                src="<?php echo $arrow_url; ?>"
                class="flecheProcess fleche-hz reverse"
                alt=""
                data-aos="fade-up"
                data-aos-delay="<?php echo $delay + 150; ?>"
                data-aos-duration="600"
              >
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>

      <!-- Flèche verticale centrale -->
      <img
        src="<?php echo $arrow_url; ?>"
        class="flecheProcess fleche-vt"
        alt=""
        data-aos="zoom-in"
        data-aos-delay="600"
      />

      <!-- Ligne 2 -->
      <div class="row row2 justify-content-center align-items-center mb-4">
        <?php for ( $i = 3; $i < 6; $i++ ):
          $item     = $items[ $i ];
          $icon     = $item['icon_process_country_repetetor'];
          $icon_url = is_array($icon) && isset($icon['url'])
                      ? esc_url($icon['url'])
                      : esc_url($icon);
          $step     = $i - 3;
          $delay    = 1300 + $step * 300; // 1300, 1600, 1900 ms
        ?>
          <div
            class="col-6 col-md-3 text-center"
            data-aos="fade-up"
            data-aos-delay="<?php echo $delay; ?>"
            data-aos-duration="600"
          >
            <?php if ( $icon_url ): ?>
              <img src="<?php echo $icon_url; ?>"
                   class="stage-img mb-3"
                   alt=""
              >
            <?php endif; ?>
            <h5 class="fw-bold mb-3">
              <?php echo esc_html( $item['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item['description_process_country_repetetor'] ); ?>
            </p>
          </div>

          <?php if ( $i < 5 ): ?>
            <div class="col-auto d-flex justify-content-center px-0">
              <img
                src="<?php echo $arrow_url; ?>"
                class="flecheProcess fleche-hz"
                alt=""
                data-aos="fade-up"
                data-aos-delay="<?php echo $delay + 150; ?>"
                data-aos-duration="600"
              >
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>

      <!-- Bouton CTA desktop -->
      <?php if ( $button_text ): ?>
        <div
          class="text-center mt-5"
          data-aos="zoom-in"
          data-aos-delay="2000"
          data-aos-duration="600"
        >
          <button class="btn-consultation">
            <?php echo esc_html( $button_text ); ?>
          </button>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>


<!-- Mobile version (<768px) -->
<?php if ( $title || ( $items && count($items) >= 6 ) ): ?>
<section
  class="process_country_mobile d-block d-md-none position-relative py-5 text-white"
  dir="rtl"
  style="background: linear-gradient(to bottom,
      <?php echo esc_attr($first_color); ?> -40%,
      <?php echo esc_attr($second_color); ?> 50%,
      <?php echo esc_attr($first_color); ?> 140%
  );z-index: 1"
  data-aos="fade-up"
  data-aos-duration="800"
>
  <div class="container">
    <?php if ( $title ): ?>
      <h2
        class="h1 text-center mb-4"
        data-aos="fade-down"
        data-aos-delay="200"
      >
        <?php echo esc_html( $title ); ?>
      </h2>
    <?php endif; ?>

    <?php if ( $items ): ?>
      <?php
      $delay_base = 200;
      for ( $row = 0; $row < 3; $row++ ):
        $idx1   = $row * 2;
        $idx2   = $idx1 + 1;
        $delay1 = $delay_base + ( $row * 400 );
        $delay2 = $delay1 + 200;
        $item1  = $items[ $idx1 ];
        $icon1  = $item1['icon_process_country_repetetor'];
        $url1   = is_array($icon1)&&isset($icon1['url'])?esc_url($icon1['url']):esc_url($icon1);
        $item2  = $items[ $idx2 ];
        $icon2  = $item2['icon_process_country_repetetor'];
        $url2   = is_array($icon2)&&isset($icon2['url'])?esc_url($icon2['url']):esc_url($icon2);
      ?>
        <div class="row align-items-center mb-3">
          <div
            class="col-5 text-center"
            data-aos="fade-up"
            data-aos-delay="<?php echo $delay1; ?>"
            data-aos-duration="600"
          >
            <?php if ( $url1 ): ?>
              <img src="<?php echo $url1; ?>"
                   class="stage-img mb-2"
                   alt=""
              >
            <?php endif; ?>
            <h5 class="fw-bold mb-3">
              <?php echo esc_html( $item1['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item1['description_process_country_repetetor'] ); ?>
            </p>
          </div>

          <div class="col-2 px-0 text-center">
            <img
              src="<?php echo $arrow_url; ?>"
              class="flecheProcess"
              alt=""
              data-aos="zoom-in"
              data-aos-delay="<?php echo $delay1 + 100; ?>"
              data-aos-duration="600"
            >
          </div>

          <div
            class="col-5 text-center"
            data-aos="fade-up"
            data-aos-delay="<?php echo $delay2; ?>"
            data-aos-duration="600"
          >
            <?php if ( $url2 ): ?>
              <img src="<?php echo $url2; ?>"
                   class="stage-img mb-2"
                   alt=""
              >
            <?php endif; ?>
            <h5 class="fw-bold mb-3">
              <?php echo esc_html( $item2['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item2['description_process_country_repetetor'] ); ?>
            </p>
          </div>
        </div>

        <?php if ( $row < 2 ): ?>
          <div class="d-flex mb-3 <?php echo ( $row % 2 === 0 ? 'justify-content-end' : 'justify-content-start' ); ?>">
            <div class="col-6 text-center" style="<?php echo ( $row % 2 === 0 ? 'margin-left:-20%;' : 'margin-right:10%;' ); ?>">
              <img
                src="<?php echo $arrow_url; ?>"
                class="flecheProcessLine"
                alt=""
                data-aos="fade-up"
                data-aos-delay="<?php echo $delay2 + 100; ?>"
                data-aos-duration="600"
              >
            </div>
          </div>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ( $button_text ): ?>
        <div
          class="text-center"
          data-aos="zoom-in"
          data-aos-delay="<?php echo $delay2 + 300; ?>"
          data-aos-duration="600"
        >
          <button class="btn-consultation">
            <?php echo esc_html( $button_text ); ?>
          </button>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
