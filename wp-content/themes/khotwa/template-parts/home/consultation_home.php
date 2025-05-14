<?php
// Récupération des champs ACF pour la section "consultation section"

// Version Desktop
$background_desktop = get_field('background_consultation_section_desktop');
$fenetre_desktop    = get_field('fenetre_consultation_section_desktop');

// Version Mobile
$background_mobile = get_field('background_consultation_section_mobile');
// $background_mobile_top = get_field('background_consultation_section_mobile_top');
$fenetre_mobile    = get_field('fenetre_consultation_section_mobile');

// Champs communs
$titre       = get_field('titre_consultation_section');
$consultation_titre_red = get_field('consultation_titre_red');
$features    = get_field('repetetor_consultation_feature');
$text_button = get_field('text_button_consultation_button');

// Récupération des URLs pour Desktop
$background_desktop_url = ( is_array($background_desktop) && isset($background_desktop['url']) ) ? esc_url($background_desktop['url']) : '';
$fenetre_desktop_url    = ( is_array($fenetre_desktop)    && isset($fenetre_desktop['url']) )    ? esc_url($fenetre_desktop['url'])    : '';

// Récupération des URLs pour Mobile
$background_mobile_url = ( is_array($background_mobile) && isset($background_mobile['url']) ) ? esc_url($background_mobile['url']) : '';
// $background_mobile_top_url = ( is_array($background_mobile_top) && isset($background_mobile_top['url']) ) ? esc_url($background_mobile_top['url']) : '';
$fenetre_mobile_url    = ( is_array($fenetre_mobile)    && isset($fenetre_mobile['url']) )    ? esc_url($fenetre_mobile['url'])    : '';
$consultation_bg_top = get_field('background_color_consultation_top')?: '#800000';
$consultation_bg_bottom = get_field('background_color_consultation_bottom')?: '#330000';
?>

<style>
      .consultation-section {
        background: linear-gradient(to top, <?php echo $consultation_bg_top; ?>, <?php echo $consultation_bg_bottom; ?>);
    }
</style>
<!-- SECTION DESKTOP -->
<section class="consultation-section desktop">
  <div class="bg-wrapper position-relative">
    <?php if ( $background_desktop_url ) : ?>
      <img
        src="<?php echo $background_desktop_url; ?>"
        alt="Image de fond"
        class="bg-image img-fluid"
      />
    <?php endif; ?>

    <div class="window-wrapper" data-aos="fade-left" data-aos-delay="200">
      <?php if ( $fenetre_desktop_url ) : ?>
        <img
          src="<?php echo $fenetre_desktop_url; ?>"
          alt="Cadre de la fenêtre"
          class="window-frame img-fluid"
        />
      <?php endif; ?>
    </div>

    <div class="consultation-content" data-aos="fade-right" data-aos-delay="200">
      <?php if ( $titre ) : ?>
        <h1 class="consultation-title">
            <?php echo esc_html($titre); ?>
            <?php if (!empty($consultation_titre_red)) : ?>
                <span class="text-red"><?php echo esc_html($consultation_titre_red); ?></span>
            <?php endif; ?>
        </h1>     
       <?php endif; ?>

      <?php if ( $features ) : ?>
        <div class="consultation-features d-flex flex-column align-items-start">
          <?php foreach ( $features as $feature ) :
            $icon = $feature['icon_feature'];
            $text_feature = $feature['text_feature'];
            $icon_url = ( is_array($icon) && isset($icon['url']) ) ? esc_url($icon['url']) : '';
          ?>
          <div class="consultation-feature d-flex flex-row align-items-center">
            <?php if ( $icon_url ) : ?>
              <img
                src="<?php echo $icon_url; ?>"
                alt="Icon"
                class="feature-icon img-fluid"
              />
            <?php endif; ?>
            <?php if ( $text_feature ) : ?>
              <p class="mb-0 ml-2"><?php echo $text_feature; ?></p>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ( $text_button ) : ?>
        <div class="btn-conslut-section">
          <a href="#" class="btn-consultation"><?php echo $text_button; ?></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- SECTION MOBILE -->
<section class="consultation-section mobile">
  <!-- Bloc supérieur avec fond dynamique -->
  <div class="color-bg">
    <?php if ( $titre ) : ?>
      <h1 class="consultation-title">
            <?php echo esc_html($titre); ?>
            <?php if (!empty($consultation_titre_red)) : ?>
                <span class="text-red"><?php echo esc_html($consultation_titre_red); ?></span>
            <?php endif; ?>
        </h1> 
    <?php endif; ?>

    <?php if ( $features ) : ?>
        <div class="consultation-features d-flex flex-column align-items-start">
          <?php foreach ( $features as $feature ) :
            $icon = $feature['icon_feature'];
            $text_feature = $feature['text_feature'];
            $icon_url = ( is_array($icon) && isset($icon['url']) ) ? esc_url($icon['url']) : '';
          ?>
          <div class="consultation-feature d-flex flex-row align-items-center my-2">
            <?php if ( $icon_url ) : ?>
              <img
                src="<?php echo $icon_url; ?>"
                alt="Icon"
                class="feature-icon img-fluid"
              />
            <?php endif; ?>
            <?php if ( $text_feature ) : ?>
              <p class="mb-0 ml-2"><?php echo $text_feature; ?></p>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <?php if ( $text_button ) : ?>
        <div class="btn-conslut-section">
          <a href="#" class="btn-consultation"><?php echo $text_button; ?></a>
        </div>
      <?php endif; ?>

  <!-- Bloc inférieur : affichage de l'image statique et du cadre mobile dynamique -->
  <div class="girl-container position-relative text-center">
    <img
      src="<?php echo get_template_directory_uri(); ?>/assets/img/mobileConsultationBackground.png"
      alt="Fille"
      class="girl-image img-fluid"
    />
    <?php if ( $fenetre_mobile_url ) : ?>
      <img
        src="<?php echo $fenetre_mobile_url; ?>"
        alt="Cadre"
        class="frame-image img-fluid"
      />
    <?php endif; ?>
  </div>
</section>
