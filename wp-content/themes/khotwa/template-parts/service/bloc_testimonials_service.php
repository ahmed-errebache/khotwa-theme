<?php
  $is_rtl                  = is_rtl();
  $current_language        = substr( get_locale(), 0, 2 );
  $direction_class         = ( $is_rtl && $current_language === 'ar' )
                              ? 'rtl_testimonial_service'
                              : 'ltr_testimonial_service';

  // Champs ACF
  $testimonial_title       = get_field( 'service_testimonial_title' );
  $testimonial_title_color = get_field( 'service_testimonial_title_color' );
  $testimonial_paragraph   = get_field( 'service_testimonial_paragraph' );
  $testimonial_slider      = get_field( 'testimonial_slider' );
?>
<section class="testimonial_service <?php echo esc_attr( $direction_class ); ?>">
  <div class="container">
    <div class="testimonail-head text-center mb-5">
      <h3 class="testimonial-title" style="color:<?php echo esc_attr($testimonial_title_color) ?>;">
        <?php echo esc_html( $testimonial_title ); ?>
      </h3>
      <?php if ( $testimonial_paragraph ): ?>
        <p class="testimonial-paragraph"><?php echo wp_kses_post( $testimonial_paragraph ); ?></p>
      <?php endif; ?>
    </div>

    <?php if ( ! empty( $testimonial_slider ) ): ?>
      <div class="swiper testimonial_service_slider">
        <div class="swiper-wrapper">
          <?php foreach ( $testimonial_slider as $item ):
            $img = $item['testimonial_image'];
            $url = $item['testimonial_video_url'];
            $thumb = is_array($img)? $img['url']: $img;
          ?>
            <div class="swiper-slide text-center position-relative">
              <img src="<?php echo esc_url($thumb) ?>"
                   alt=""
                   class="testimonial-img img-fluid rounded shadow-sm mb-3">
                   <?php if (!empty($url)) : ?>
                        <span
                            class="play-btn shadow play-icon"
                            data-bs-toggle="modal"
                            data-bs-target="#videoModal"
                            data-video-url="<?php echo esc_url($url); ?>"
                        >
                            <i class="bi bi-play-circle-fill"></i>
                    </span>
                    <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- navigation & pagination -->
        <div class="swiper-button-prev swiper_btn"></div>
        <div class="swiper-button-next swiper_btn"></div>
        <div class="swiper-pagination"></div>
      </div>
    <?php endif; ?>
  </div>
</section>
