<?php
$is_rtl = is_rtl();
$current_language = substr(get_locale(), 0, 2);
$direction_class = ($is_rtl && $current_language === 'ar') ? 'rtl_bloc_differenciation' : 'ltr_bloc_differenciation';

$bloc_differenciation_title = get_field('bloc_differenciation_title');
$bloc_differenciation_image = get_field('bloc_differenciation_image');
$bloc_differenciation_list = get_field('bloc_differenciation_list');
$bloc_differenciation_title_color = get_field('bloc_differenciation_title_color');
$differenciation_bg_color = get_field('differenciation_bg_color');


$img_bloc_differenciation = is_array($bloc_differenciation_image) && isset($bloc_differenciation_image['url']) ? esc_url($bloc_differenciation_image['url']) : esc_url($bloc_differenciation_image);
?>

<style>
  .bloc_differenciation .bloc-differenciation-title {
    color: <?= esc_html($bloc_differenciation_title_color); ?>;
  }
  .bloc_differenciation {
     background-color: <?= esc_html($differenciation_bg_color) ?>
  }
 </style>

<section class="bloc_differenciation py-5 <?= esc_attr($direction_class); ?>">
  <div class="bloc_differenciation_top">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Top Right" class="testimonial-shape">
  </div>
  <div class="container">
  <div class="row">
    <div class="col-lg-6 mobile">
    <?php if ($img_bloc_differenciation): ?>
      <img src="<?= $img_bloc_differenciation ?>" alt="Image de notre différenciation" class="img-fluid rounded mx-auto d-block img-bloc-differenciation">
    <?php endif; ?>
    </div>
    <!-- Col texte -->
    <div class="col-lg-6 pt-4">
    <?php if ($bloc_differenciation_title): ?>
      <h2 class="bloc-differenciation-title mb-5 fw-bold"><?= esc_html($bloc_differenciation_title); ?></h2>
    <?php endif; ?>

    <?php if ($bloc_differenciation_list): ?>
      <div class="swiper-container bloc-differenciation-swiper">
      <div class="swiper-wrapper">
        <?php foreach (array_chunk($bloc_differenciation_list, 3) as $bloc_differenciation_chunk): ?>
        <div class="swiper-slide">
          <?php foreach ($bloc_differenciation_chunk as $mission): ?>
          <div class="mb-4">
            <h5 class="fw-bold mb-3"><?= esc_html($mission['differenciation_nom']); ?></h5>
            <p class="mb-0"><?= wp_kses_post($mission['differenciation_description']); ?></p>
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
    <?php if ($img_bloc_differenciation): ?>
      <img src="<?= $img_bloc_differenciation ?>" alt="Image de notre différenciation" class="img-fluid rounded mx-auto d-block img-bloc-differenciation">
    <?php endif; ?>
    </div>
  </div>
  </div>
</section>
