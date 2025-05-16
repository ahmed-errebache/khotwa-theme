<?php
$is_rtl                       = is_rtl();
$current_language             = substr( get_locale(), 0, 2 );
$direction_class              = ( $is_rtl && $current_language === 'ar' )
                                ? 'rtl_bloc_differenciation'
                                : 'ltr_bloc_differenciation';

$bloc_title                   = get_field('bloc_differenciation_title');
$bloc_image                   = get_field('bloc_differenciation_image');
$bloc_list                    = get_field('bloc_differenciation_list');
$bloc_title_color             = get_field('bloc_differenciation_title_color');
$bloc_bg_color                = get_field('differenciation_bg_color');

$img_bloc                     = is_array($bloc_image) && isset($bloc_image['url'])
                                ? esc_url($bloc_image['url'])
                                : esc_url($bloc_image);
?>

<style>
  .bloc_differenciation .bloc-differenciation-title {
    color: <?= esc_html($bloc_title_color); ?>;
  }
  .bloc_differenciation {
    background-color: <?= esc_html($bloc_bg_color); ?>;
  }
</style>

<section
  class="bloc_differenciation py-5 <?= esc_attr($direction_class); ?>"
  data-aos="fade-up"
  data-aos-duration="800"
>
  <div class="bloc_differenciation_top"
       data-aos="zoom-in"
       data-aos-delay="200">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png"
         alt="Icon Top Right"
         class="testimonial-shape">
  </div>

  <div class="container">
    <div class="row">

      <!-- Image mobile -->
      <div class="col-lg-6 mobile"
           data-aos="fade-right"
           data-aos-delay="300">
        <?php if ( $img_bloc ): ?>
          <img src="<?= $img_bloc ?>"
               alt="Image différenciation"
               class="img-fluid rounded mx-auto d-block img-bloc-differenciation">
        <?php endif; ?>
      </div>

      <!-- Texte -->
      <div class="col-lg-6 pt-4">
        <?php if ( $bloc_title ): ?>
          <h2 class="bloc-differenciation-title mb-5 fw-bold"
              data-aos="fade-down"
              data-aos-delay="400">
            <?= esc_html( $bloc_title ); ?>
          </h2>
        <?php endif; ?>

        <?php if ( $bloc_list ): ?>
          <div class="swiper-container bloc-differenciation-swiper"
               data-aos="fade-up"
               data-aos-delay="500">
            <div class="swiper-wrapper">
              <?php
              $slide_index = 0;
              foreach ( array_chunk($bloc_list, 3) as $chunk ):
                $delay = 600 + ( $slide_index * 200 );
              ?>
                <div class="swiper-slide"
                     data-aos="fade-up"
                     data-aos-delay="<?php echo $delay; ?>">
                  <?php foreach ( $chunk as $mission ): ?>
                    <div class="mb-4">
                      <h5 class="fw-bold mb-3">
                        <?= esc_html( $mission['differenciation_nom'] ); ?>
                      </h5>
                      <p class="mb-0">
                        <?= wp_kses_post( $mission['differenciation_description'] ); ?>
                      </p>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php
                $slide_index++;
              endforeach;
              ?>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        <?php endif; ?>
      </div>

      <!-- Image desktop -->
      <div class="col-lg-6 desktop"
           data-aos="fade-left"
           data-aos-delay="300">
        <?php if ( $img_bloc ): ?>
          <img src="<?= $img_bloc ?>"
               alt="Image différenciation"
               class="img-fluid rounded mx-auto d-block img-bloc-differenciation">
        <?php endif; ?>
      </div>

    </div>
  </div>
</section>
