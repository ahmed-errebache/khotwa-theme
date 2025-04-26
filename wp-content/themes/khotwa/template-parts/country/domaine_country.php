<?php
// Récupération des champs ACF
$titre       = get_field('titre_specialisation_section');
$sous_titre  = get_field('sous_titre_specialisation_section');
$image_field = get_field('image_specialisation_section');
$btn_text    = get_field('button_specialisation_section');

// Construction de l’URL de l’image des personnes
$image_url = '';
if ($image_field) {
  $image_url = is_array($image_field) && isset($image_field['url'])
    ? esc_url($image_field['url'])
    : esc_url($image_field);
}
?>

<section class="specialization-section">
  <!-- Image de fond statique -->
  <img
    class="specialization-background"
    src="<?php echo get_template_directory_uri(); ?>/assets/img/domaine-bg.png"
    alt="Background" />

  <div class="specialization-content">
    <!-- Texte centré dynamique -->
    <?php if ($titre || $sous_titre): ?>
      <div class="specialization-text">
        <?php if ($titre): ?>
          <h1 class="specialization-title"><?php echo esc_html($titre); ?></h1>
        <?php endif; ?>
        <?php if ($sous_titre): ?>
          <p class="specialization-subtitle"><?php echo esc_html($sous_titre); ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <!-- Image des personnes dynamique -->
    <div class="specialization-image">
      <?php if ($image_url): ?>
        <img
          src="<?php echo $image_url; ?>"
          alt="<?php echo esc_attr($titre ?: 'Étudiants'); ?>" />
      <?php endif; ?>

      <!-- Bouton dynamique -->
      <?php if ($btn_text): ?>
        <div class="specialization-btn">
          <a class="btn btn-consultation aos-init aos-animate">
            <?php echo esc_html($btn_text); ?>
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>