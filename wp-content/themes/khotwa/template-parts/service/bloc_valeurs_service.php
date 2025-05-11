<?php
$is_rtl = is_rtl();
$current_language = substr(get_locale(), 0, 2);
$direction_class = ($is_rtl && $current_language === 'ar') ? 'rtl_valeur' : 'ltr_valeur';

$valeurs_title = get_field('valeurs_title');
$valeurs_image = get_field('valeurs_image');
$valeurs_list = get_field('valeurs_list');
$valeurs_title_color = get_field('valeurs_title_color');

$img_valeurs = is_array($valeurs_image) && isset($valeurs_image['url']) ? esc_url($valeurs_image['url']) : esc_url($valeurs_image);

// Définir les ordres en fonction de la direction

?>

<style>
    .valeurs-section .valeurs-title {
        color: <?= esc_html($valeurs_title_color); ?>;
    }
    
</style>

<section class="valeurs-section py-5 <?= esc_attr($direction_class); ?>">
  <div class="container">
    <div class="row">
    <div class="col-lg-6 mobile">
        <?php if ($img_valeurs): ?>
          <img src="<?= $img_valeurs ?>" alt="Image des valeurs" class="img-fluid rounded mx-auto d-block img-valeur">
        <?php endif; ?>
      </div>
      <!-- Col texte -->
      <div class="col-lg-6 pt-4">
        <?php if ($valeurs_title): ?>
          <h2 class="valeurs-title mb-5 fw-bold"><?= esc_html($valeurs_title); ?></h2>
        <?php endif; ?>

        <?php if ($valeurs_list): ?>
          <div class="swiper-container valeurs-swiper">
            <div class="swiper-wrapper">
              <?php foreach (array_chunk($valeurs_list, 2) as $valeurs_chunk): ?>
            <div class="swiper-slide">
              <?php foreach ($valeurs_chunk as $valeur): ?>
                <div class="mb-4">
                  <h5 class="fw-bold mb-3"><?= esc_html($valeur['valeur_nom']); ?></h5>
                  <p class="mb-0"><?= wp_kses_post($valeur['valeur_description']); ?></p>
                </div>
              <?php endforeach; ?>
            </div>
              <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        <?php endif; ?>
      </div>

      <!-- Col image -->
      <div class="col-lg-6 desktop">
        <?php if ($img_valeurs): ?>
          <img src="<?= $img_valeurs ?>" alt="Image des valeurs" class="img-fluid rounded mx-auto d-block img-valeur">
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
