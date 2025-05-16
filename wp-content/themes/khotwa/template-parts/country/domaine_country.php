<?php
// Récupération des champs ACF
$titre       = get_field('titre_specialisation_section');
$sous_titre  = get_field('sous_titre_specialisation_section');
$image_field = get_field('image_specialisation_section');
$btn_text    = get_field('button_specialisation_section');

// URL de l’image
$image_url = '';
if ( $image_field ) {
  $image_url = is_array( $image_field ) && isset( $image_field['url'] )
    ? esc_url( $image_field['url'] )
    : esc_url( $image_field );
}
?>

<section class="specialization-section" data-aos="fade-up">
  <img
    class="specialization-background"
    src="<?php echo get_template_directory_uri(); ?>/assets/img/domaine-bg.png"
    alt="Background"
    data-aos="fade-in"
    data-aos-duration="1200"
  />

  <div class="specialization-content">

    <?php if ( $titre || $sous_titre ): ?>
      <div class="specialization-text">
        <?php if ( $titre ): ?>
          <h1
            class="specialization-title"
            data-aos="fade-down"
            data-aos-delay="200"
          >
            <?php echo esc_html( $titre ); ?>
          </h1>
        <?php endif; ?>

        <?php if ( $sous_titre ): ?>
          <p
            class="specialization-subtitle"
            data-aos="fade-down"
            data-aos-delay="300"
          >
            <?php echo esc_html( $sous_titre ); ?>
          </p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <div
      class="specialization-image"
      data-aos="zoom-in"
      data-aos-delay="400"
      data-aos-duration="800"
    >
      <?php if ( $image_url ): ?>
        <img
          src="<?php echo $image_url; ?>"
          alt="<?php echo esc_attr( $titre ?: 'Image' ); ?>"
          class="img-fluid shadow"
        />
      <?php endif; ?>

      <?php if ( $btn_text ): ?>
        <div
          class="specialization-btn"
          data-aos="fade-up"
          data-aos-delay="500"
          data-aos-duration="600"
        >
          <button class="btn-consultation btn-settings">
            <?php echo esc_html( $btn_text ); ?>
          </button>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>
