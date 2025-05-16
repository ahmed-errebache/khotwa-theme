<?php
// Récupération des champs ACF
$title       = get_field('title_statistics_country');
$rows        = get_field('repetetor_statistics_country');
$button_text = get_field('text_button_statistic_country');
$statistic_image_background        = get_field('statistic_image_background');
$statistic_image_background_mobile = get_field('statistic_image_background_mobile');
$img_stats_url = is_array($statistic_image_background) && isset($statistic_image_background['url'])
    ? esc_url($statistic_image_background['url'])
    : esc_url($statistic_image_background);
$img_stats_url_mobile = is_array($statistic_image_background_mobile) && isset($statistic_image_background_mobile['url'])
    ? esc_url($statistic_image_background_mobile['url'])
    : esc_url($statistic_image_background_mobile);

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

<style>
  .stats-section {
    background-image: url('<?php echo esc_url($img_stats_url); ?>');
  }
  @media (max-width: 768px) {
    .stats-section {
      background-image: url('<?php echo esc_url($img_stats_url_mobile); ?>');
    }
  }
</style>

<section
  class="stats-section"
  dir="<?php echo esc_attr( $dir ); ?>"
  data-aos="fade-up"
  data-aos-duration="800"
>
  <!-- Icone rouge top-right -->
  <img
    src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/iconSections.png' ); ?>"
    class="stats-icon"
    alt=""
    data-aos="zoom-in"
    data-aos-delay="200"
  >

  <!-- Titre centré -->
  <h2
    class="stats-title"
    data-aos="fade-down"
    data-aos-delay="300"
  >
    <?php echo esc_html( $title ); ?>
  </h2>

  <!-- Statistiques -->
  <?php foreach ( $rows as $index => $row ) :
    // Limiter à 4 positions
    if ( $index > 3 ) break;
    $pos_class = isset( $positions[ $index ] ) ? $positions[ $index ] : '';
    $number    = $row['stat_number'];
    $label     = $row['stat_label'];
    $delay     = 400 + ( $index * 300 ); // 400ms, 700ms, 1000ms, 1300ms
    $color     = [ 'success','warning','info','danger' ][ $index % 4 ];
  ?>
    <div
      class="stat <?php echo esc_attr( $pos_class ); ?>"
      data-aos="fade-up"
      data-aos-delay="<?php echo $delay; ?>"
      data-aos-duration="600"
    >
      <div class="stat-number text-<?php echo $color; ?>">
        <?php echo esc_html( $number ); ?>
      </div>
      <div class="stat-label">
        <?php echo esc_html( $label ); ?>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Bouton d'appel à l'action -->
  <?php if ( $button_text ) : ?>
    <a
      href="#"
      class="btn-consultation stats-cta"
      data-aos="zoom-in"
      data-aos-delay="<?php echo 400 + ( min(4, count($rows)) - 1 ) * 300 + 300; ?>"
      data-aos-duration="600"
    >
      <?php echo esc_html( $button_text ); ?>
    </a>
  <?php endif; ?>
</section>
