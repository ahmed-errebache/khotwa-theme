<?php
// Récupération des champs ACF
$colors = get_field('couleur_background_section');
if( $colors && isset($colors[0]['premier_couleur'], $colors[0]['douxieme_couleur']) ) {
    $first_color  = $colors[0]['premier_couleur'];
    $second_color = $colors[0]['douxieme_couleur'];
} else {
    // Valeurs par défaut
    $first_color  = '#2D020C';
    $second_color = '#70021C';
}

$title        = get_field('titre_de_la_section_');
$items        = get_field('process_country_repetetor');
$button_text  = get_field('text_button_process');

// URLs fixes
$icon_sections_url = esc_url( get_template_directory_uri() . '/assets/img/iconSections.png' );
$arrow_url         = esc_url( get_template_directory_uri() . '/assets/img/flecheProcess.png' );
?>

<!-- ===========================
     Desktop version (≥768px)
     =========================== -->
<section
  class="process_country d-none d-md-block position-relative py-5 text-white"
  dir="rtl"
  style="background: linear-gradient(to bottom,
      <?php echo esc_attr($first_color); ?> -40%,
      <?php echo esc_attr($second_color); ?> 50%,
      <?php echo esc_attr($first_color); ?> 140%
  );"
>
  <img src="<?php echo $icon_sections_url; ?>" class="iconSections" alt="Décor section">

  <div class="container">
    <?php if( $title ): ?>
      <h2 class="h1 text-center mb-5"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if( $items && count($items) >= 6 ): ?>
      <!-- Ligne 1 -->
      <div class="row row1 justify-content-center align-items-center mb-4">
        <?php for( $i = 0; $i < 3; $i++ ):
          $item = $items[ $i ];
          // Récupération de l’URL de l’icône
          $icon = $item['icon_process_country_repetetor'];
          $icon_url = is_array($icon) && isset($icon['url'])
            ? esc_url( $icon['url'] )
            : esc_url( $icon );
        ?>
          <div class="col-6 col-md-3 text-center">
            <?php if( $icon_url ): ?>
              <img src="<?php echo $icon_url; ?>" class="stage-img mb-3" alt="">
            <?php endif; ?>
            <h5 class="fw-bold mb-1">
              <?php echo esc_html( $item['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item['description_process_country_repetetor'] ); ?>
            </p>
          </div>
          <?php if( $i < 2 ): ?>
            <div class="col-auto d-flex justify-content-center px-0">
              <img
                src="<?php echo $arrow_url; ?>"
                class="flecheProcess fleche-hz reverse"
                alt=""
              >
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>

      <!-- Flèche verticale centrale -->
      <img src="<?php echo $arrow_url; ?>" class="flecheProcess fleche-vt" alt="">

      <!-- Ligne 2 -->
      <div class="row row2 justify-content-center align-items-center mb-4">
        <?php for( $i = 3; $i < 6; $i++ ):
          $item = $items[ $i ];
          $icon = $item['icon_process_country_repetetor'];
          $icon_url = is_array($icon) && isset($icon['url'])
            ? esc_url( $icon['url'] )
            : esc_url( $icon );
        ?>
          <div class="col-6 col-md-3 text-center">
            <?php if( $icon_url ): ?>
              <img src="<?php echo $icon_url; ?>" class="stage-img mb-3" alt="">
            <?php endif; ?>
            <h5 class="fw-bold mb-1">
              <?php echo esc_html( $item['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item['description_process_country_repetetor'] ); ?>
            </p>
          </div>
          <?php if( $i < 5 ): ?>
            <div class="col-auto d-flex justify-content-center px-0">
              <img
                src="<?php echo $arrow_url; ?>"
                class="flecheProcess fleche-hz"
                alt=""
              >
            </div>
          <?php endif; ?>
        <?php endfor; ?>
      </div>

      <!-- Bouton CTA desktop -->
      <?php if( $button_text ): ?>
        <div class="text-center mt-5">
          <button class="btn-consultation">
            <?php echo esc_html( $button_text ); ?>
          </button>
        </div>
      <?php endif; ?>

    <?php endif; ?>
  </div>
</section>
<!-- =================================
     Mobile version (<768px)
     ================================= -->
     <section
  class="process_country_mobile d-block d-md-none position-relative py-5 text-white"
  dir="rtl"
  style="background: linear-gradient(to bottom,
      <?php echo esc_attr($first_color); ?> -40%,
      <?php echo esc_attr($second_color); ?> 50%,
      <?php echo esc_attr($first_color); ?> 140%
  );z-index: 1"
>
  <div class="container">
    <?php if( $title ): ?>
      <h2 class="h1 text-center mb-4"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if( $items && count($items) >= 6 ): ?>
      <?php
      for( $row = 0; $row < 3; $row++ ):
        $idx1 = $row * 2;
        $idx2 = $idx1 + 1;
        $item1 = $items[ $idx1 ];
        $item2 = $items[ $idx2 ];
        $icon1 = $item1['icon_process_country_repetetor'];
        $icon1_url = is_array($icon1) && isset($icon1['url'])
          ? esc_url($icon1['url'])
          : esc_url($icon1);
        $icon2 = $item2['icon_process_country_repetetor'];
        $icon2_url = is_array($icon2) && isset($icon2['url'])
          ? esc_url($icon2['url'])
          : esc_url($icon2);
        // on génère la classe row1, row2, row3
        $rowClass = 'row'.( $row+1 );
      ?>
        <!-- Rangée mobile <?php echo $row+1; ?> -->
        <div class="<?php echo esc_attr($rowClass); ?> row align-items-center mb-3">
          <div class="col-5 text-center">
            <?php if( $icon1_url ): ?>
              <img src="<?php echo $icon1_url; ?>" class="stage-img mb-2" alt="">
            <?php endif; ?>
            <h5 class="fw-bold mb-1">
              <?php echo esc_html( $item1['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item1['description_process_country_repetetor'] ); ?>
            </p>
          </div>
          <div class="col-2 px-0 text-center">
            <img src="<?php echo $arrow_url; ?>" class="flecheProcess" alt="">
          </div>
          <div class="col-5 text-center">
            <?php if( $icon2_url ): ?>
              <img src="<?php echo $icon2_url; ?>" class="stage-img mb-2" alt="">
            <?php endif; ?>
            <h5 class="fw-bold mb-1">
              <?php echo esc_html( $item2['titre_process_country_repetetor'] ); ?>
            </h5>
            <p class="small mb-0">
              <?php echo esc_html( $item2['description_process_country_repetetor'] ); ?>
            </p>
          </div>
        </div>

        <?php if( $row < 2 ): ?>
          <!-- Flèche verticale entre rangée <?php echo $row+1; ?> & <?php echo $row+2; ?> -->
          <div class="<?php echo esc_attr($rowClass); ?> arrow-row-<?php echo $row+1;?> d-flex mb-3 <?php echo ($row%2===0?'justify-content-end':'justify-content-start'); ?>">
            <div class="col-6 text-center"
                 style="<?php echo ($row%2===0?'margin-left:-20%;':'margin-right:10%;'); ?>">
              <img src="<?php echo $arrow_url; ?>" class="flecheProcessLine" alt="">
            </div>
          </div>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if( $button_text ): ?>
        <div class="text-center">
          <button class="btn-consultation"><?php echo esc_html( $button_text ); ?></button>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</section>
