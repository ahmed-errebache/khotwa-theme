<?php
// — Récupération des champs ACF —
$titre_section         = get_field('titre_de_la_section');
$image_passport        = get_field('image_du_passport');
$sous_titre_section    = get_field('sous_titre_de_la_section');
$button_text           = get_field('text_du_button_');

// On gère le retour array ou URL directe
$image_passport_url = '';
if ($image_passport) {
    $image_passport_url = is_array($image_passport) && isset($image_passport['url'])
        ? esc_url($image_passport['url'])
        : esc_url($image_passport);
}
?>
<?php if ( $image_passport && $titre_section && $sous_titre_section && $button_text ) : ?>
<section
  class="students-achievements position-relative text-center text-white py-5 overflow-visible"
  style="background: #344D33 url('<?php echo get_template_directory_uri(); ?>/assets/img/pass-bg.png') no-repeat center top / cover;z-index: 5;"
>
  <div class="container-fluid px-0">
    <!-- Titre avec icônes -->
    <h2
      class="students-achievements__title
             d-flex
             justify-content-center justify-content-md-between
             align-items-center
             px-4 px-md-0"
    >
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/pass-icon-right.png"
        class="students-achievements__title-icon d-none d-md-inline-block ms-md-2"
        alt="icône droite"
      >

      <span class="students-achievements__span">
        <?php echo esc_html( $titre_section ); ?>
      </span>

      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/pass-icon-left.png"
        class="students-achievements__title-icon d-none d-md-inline-block me-md-2"
        alt="icône gauche"
      >
    </h2>

    <!-- Galerie d’images -->
    <div
      class="students-achievements__gallery
             position-relative
             d-flex justify-content-center align-items-center
             my-4 px-0"
    >
    <?php if ( $image_passport ) : ?>
        <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/side-icon-right.png"
        class="students-achievements__side-icon students-achievements__side-icon--right d-none d-md-block"
        alt=""
      >
    <?php endif; ?>
     

      <div class="students-achievements__images d-flex">
        <?php if ( $image_passport_url ) : ?>
          <?php for ( $i = 0; $i < 3; $i++ ) : ?>
            <img
              src="<?php echo $image_passport_url; ?>"
              class="students-achievements__image"
              alt="<?php echo esc_attr( $titre_section ); ?>"
            >
          <?php endfor; ?>
        <?php endif; ?>
      </div>
      <?php if ( $image_passport ) : ?>
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/side-icon-left.png"
        class="students-achievements__side-icon students-achievements__side-icon--left d-none d-md-block"
        alt=""
      >
      <?php endif; ?>
    </div>

    <!-- Mobile-only : 3 icônes sous la galerie -->
    <div
      class="students-achievements__mobile-icons
             d-flex justify-content-between align-items-center
             d-md-none px-4 mb-4"
    >
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/pass-icon-left.png"
        alt="Passport"
        class="students-achievements__mobile-icon"
      >
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/crest-mobile.png"
        alt="Crest"
        class="students-achievements__mobile-icon"
      >
      <img
        src="<?php echo get_template_directory_uri(); ?>/assets/img/pass-icon-right.png"
        alt="Kingdom of Morocco"
        class="students-achievements__mobile-icon"
      >
    </div>

    <!-- Sous-titre -->
    <?php if ( $sous_titre_section ) : ?>
      <h3 class="students-achievements__subtitle h4 mt-3">
        <?php echo esc_html( $sous_titre_section ); ?>
      </h3>
    <?php endif; ?>
  </div>

  <!-- Bouton CTA sortant de la section -->
  <?php if ( $button_text ) : ?>
    <button class="btn-consultation students-achievements__cta position-absolute">
      <?php echo esc_html( $button_text ); ?>
    </button>
  <?php endif; ?>
</section>
<?php endif; ?>
