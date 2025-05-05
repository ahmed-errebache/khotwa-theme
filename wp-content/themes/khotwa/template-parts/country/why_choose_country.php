<?php
// Récupération des champs ACF
$titre_section          = get_field('titre_section_');
$benefits               = get_field('repetetor_why_choose_us_'); // repeater
$maps                   = get_field('why_choose_us_maps');
$icon_country           = get_field('why_choose_us_icon-country');
$avion                  = get_field('why_choose_us_avion');
$button_text            = get_field('why_choose_us_text_button');
$color_section          = get_field('color_section') ?: '#FAA815';

// Construction des URLs d'images
$maps_url         = is_array($maps) && isset($maps['url'])         ? esc_url($maps['url'])         : esc_url($maps);
$icon_country_url = is_array($icon_country) && isset($icon_country['url']) ? esc_url($icon_country['url']) : esc_url($icon_country);
$avion_url        = is_array($avion) && isset($avion['url'])        ? esc_url($avion['url'])        : esc_url($avion);
?>

<?php if ( $titre_section ): ?>
<section class="why_choose_country py-5 text-white" style="background-color: <?php echo esc_attr($color_section); ?>; position: relative;">
  <div class="container">
    <div class="row align-items-center">

      <!-- Colonne gauche (2/5) -->
      <div class="col-md-5 left-column mb-10">

        <!-- Titre (desktop + mobile) -->
        <h2 class="fw-bold mb-6">
          <?php echo esc_html( $titre_section ); ?>
        </h2>

        <!-- *** IMAGE-STACK MOBILE only *** -->
        <div class="image-stack d-block d-md-none mb-4">
          <?php if ( $maps_url ): ?>
            <img src="<?php echo $maps_url; ?>" alt="Carte" class="maps">
          <?php endif; ?>
          <?php if ( $icon_country_url ): ?>
            <img src="<?php echo $icon_country_url; ?>" alt="Icône pays" class="icon-country">
          <?php endif; ?>
          <?php if ( $avion_url ): ?>
            <img src="<?php echo $avion_url; ?>" alt="Avion" class="plane">
          <?php endif; ?>
        </div>

        <!-- Liste dynamique -->
        <?php if ( $benefits ): ?>
        <ul class="list-unstyled">
          <?php foreach ( $benefits as $item ):
            $icon       = $item['icon_why_choose_us'];
            $icon_url   = is_array($icon) && isset($icon['url'])
                          ? esc_url($icon['url'])
                          : esc_url($icon);
            $text_benefit = $item['text_associe_a_licon'];
          ?>
          <li class="d-flex align-items-start mb-3">
            <?php if ( $icon_url ): ?>
              <img src="<?php echo $icon_url; ?>" alt="" class="icon">
            <?php endif; ?>
            <span class="ms-4"><?php echo esc_html( $text_benefit ); ?></span>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>

        <!-- Bouton dynamique -->
        <?php if ( $button_text ): ?>
        <button class="btn-consultation w-100 mt-4">
          <?php echo esc_html( $button_text ); ?>
        </button>
        <?php endif; ?>

      </div>

      <!-- Colonne droite (3/5) : IMAGE-STACK DESKTOP only -->
      <div class="col-md-7 right-column d-none d-md-block">
        <div class="image-stack">
          <?php if ( $maps_url ): ?>
            <img src="<?php echo $maps_url; ?>" alt="Carte" class="maps">
          <?php endif; ?>
          <?php if ( $icon_country_url ): ?>
            <img src="<?php echo $icon_country_url; ?>" alt="Icône pays" class="icon-country">
          <?php endif; ?>
          <?php if ( $avion_url ): ?>
            <img src="<?php echo $avion_url; ?>" alt="Avion" class="plane">
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>
<?php endif; ?>
