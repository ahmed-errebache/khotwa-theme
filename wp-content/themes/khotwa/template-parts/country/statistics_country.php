<?php
// Récupération des champs ACF
$title       = get_field('title_statistics_country');
$rows        = get_field('repetetor_statistics_country');
$button_text = get_field('text_button_statistic_country');

// Ne rien afficher si pas de données
if ( ! $rows || ! $title ) {
    return;
}

// Classes de position pour les 4 items
$positions = [
    'stat-top-left',
    'stat-top-right',
    'stat-bottom-left',
    'stat-bottom-right',
];

// Détection du sens de lecture (facultatif)
$dir = is_rtl() ? 'rtl' : 'ltr';
?>

<section id="stats-section" dir="<?php echo esc_attr( $dir ); ?>">
  <!-- Icone rouge top-right -->
  <img
    src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconSections.png' ); ?>"
    class="stats-icon"
    alt=""
  >

  <!-- Titre centré -->
  <h2 class="stats-title"><?php echo esc_html( $title ); ?></h2>

  <!-- Statistiques -->
  <?php foreach ( $rows as $index => $row ) :
    // Limiter à 4 positions
    $pos_class = isset( $positions[ $index ] ) ? $positions[ $index ] : '';
    $number    = $row['stat_number'];
    $label     = $row['stat_label'];
  ?>
    <div class="stat <?php echo esc_attr( $pos_class ); ?>">
      <div class="stat-number text-<?php 
        // Optionnel : si vous voulez baser la couleur sur l'index
        echo [ 'success','warning','info','danger' ][ $index % 4 ];
      ?>">
        <?php echo esc_html( $number ); ?>
      </div>
      <div class="stat-label"><?php echo esc_html( $label ); ?></div>
    </div>
  <?php endforeach; ?>

  <!-- Bouton d'appel à l'action -->
  <?php if ( $button_text ) : ?>
    <a href="#"
       class="btn-consultation stats-cta">
      <?php echo esc_html( $button_text ); ?>
    </a>
  <?php endif; ?>
</section>
