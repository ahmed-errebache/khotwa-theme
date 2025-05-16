<?php
   $is_rtl = is_rtl();
   $current_language = substr(get_locale(), 0, 2);
   $direction_class = ($is_rtl && $current_language === 'ar') ? 'rtl_service' : 'ltr_service';

   // === Champs ACF ===
   $service_banner_title    = get_field('service_banner_title');
   $service_banner_subtitle = get_field('service_banner_subtitle');
   $banner_service_image    = get_field('banner_service_image');
   $service_points          = get_field('service_points');

   // === Couleurs dynamiques ===
   $title_service_color = get_field('title_service_color');
   $subtitle_color      = get_field('service_subtitle_color');
   $icone_color         = get_field('service_icon_text_color');
   $bg_service_top      = get_field('bg_color_service_top');
   $bg_service_bottom   = get_field('bg_color_service_bottom');

   $img_service = is_array($banner_service_image) && isset($banner_service_image['url'])
       ? esc_url($banner_service_image['url'])
       : esc_url($banner_service_image);
?>
<style>
    .banner_service_section {
        background: linear-gradient(to top, <?php echo esc_attr($bg_service_top); ?>, <?php echo esc_attr($bg_service_bottom); ?>);
    }
    .intro-section .intro-title {
        color: <?= esc_html($title_service_color); ?>;
    }
    .intro-section .intro-subtitle {
        color: <?= esc_html($subtitle_color); ?>;
    }
    .intro-section .service-item {
        color: <?php echo $icone_color ?>;
    }

    .rtl_service {
        direction: rtl;
        text-align: right;
    }

    .ltr_service {
        direction: ltr;
        text-align: left;
    }
</style>

<section
  class="intro-section py-5 <?= esc_attr($direction_class); ?>"
  data-aos="fade-up"
  data-aos-duration="800"
>
  <div class="container">
    <div class="row align-items-center">

      <!-- Col image -->
      <div
        class="col-lg-6 mb-4 mb-lg-0 <?= $is_rtl ? 'order-lg-2' : 'order-lg-1' ?>"
        data-aos="zoom-in"
        data-aos-delay="200"
      >
        <?php if ($img_service): ?>
          <img
            src="<?php echo $img_service; ?>"
            alt="img service"
            class="img-fluid rounded mx-auto"
          >
        <?php endif; ?>
      </div>

      <!-- Col texte -->
      <div class="col-lg-6">

        <?php if ($service_banner_title): ?>
          <h2
            class="intro-title mb-3"
            data-aos="fade-down"
            data-aos-delay="300"
          >
            <?= esc_html($service_banner_title); ?>
          </h2>
        <?php endif; ?>

        <?php if ($service_banner_subtitle): ?>
          <h4
            class="intro-subtitle mb-4"
            data-aos="fade-down"
            data-aos-delay="400"
          >
            <?= esc_html($service_banner_subtitle); ?>
          </h4>
        <?php endif; ?>

        <?php if ($service_points): ?>
          <ul class="list-unstyled mt-5">
            <?php foreach ($service_points as $i => $service):
                $service_list     = $service['service_list'];
                $service_icon     = $service['service_icon'];
                $service_icon_url = is_array($service_icon) && isset($service_icon['url'])
                                    ? esc_url($service_icon['url'])
                                    : esc_url($service_icon);
                $delay = 500 + ($i * 50);
            ?>
              <li
                class="d-flex align-items-start service-item mb-3"
                data-aos="fade-up"
                data-aos-delay="<?php echo $delay; ?>"
              >
                <?php if (!empty($service_icon_url)): ?>
                  <img
                    src="<?php echo $service_icon_url ?>"
                    alt="service icon"
                    class="icon_service me-3"
                  >
                <?php endif; ?>
                <span><?php echo esc_html($service_list) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>

      </div>
    </div>
  </div>
</section>
