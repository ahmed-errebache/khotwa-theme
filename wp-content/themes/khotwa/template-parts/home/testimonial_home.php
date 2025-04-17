<?php
/**
 * Template Name: Page Testimonial (Swiper)
 */

$get_top_image = get_field('image_top_section_testimonial');
$section_title = get_field('titre_testimonial');
$button_color = get_field('couleur_next_previous_buttons');
$testimonials = get_field('testimonial_repetetor');
$is_rtl = is_rtl();
$top_bg_url = is_array($get_top_image) && isset($get_top_image['url']) ? esc_url($get_top_image['url']) : esc_url($get_top_image);
?>
<style>
  .btn-circle {
      border-color: <?php echo esc_attr($button_color); ?>;
      color: <?php echo esc_attr($button_color); ?> ;
  }
  .btn-circle:hover {
      background-color: <?php echo esc_attr($button_color); ?>;
      color: #ffffff;
  }
  .testimonial-section {
    background-image: url(<?php echo esc_url($top_bg_url); ?>);
  }
</style>
<section class="testimonial-section pt-5 pb-2 pb-5" <?php echo $is_rtl ? 'dir="rtl"' : 'dir="ltr"'; ?>>
    <div class="testimonial-top-right">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Top Right" class="testimonial-shape">
    </div>
    <div class="testimonial-bottom-left">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Bottom Left" class="testimonial-shape">
    </div>
    <div class="container">
        <?php if (!empty($section_title)) : ?>
            <div class="row mb-3">
                <div class="col-md-4 "></div>
                <div class="col-md-8 col-xs-12">
                    <h2 class="testimonial-main-title"><?php echo $section_title; ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($testimonials)) : ?>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial) :
                        $video_thumb = $testimonial['background_video_testimonial'];
                        $video_link = $testimonial['url_video_testimonial'];
                        $student_name = $testimonial['nom_de_letudiant'];
                        $student_status = $testimonial['status_etudiant'];
                        $testimonial_text = $testimonial['testimonial_paragraphe'];
                        $thumb_url = is_array($video_thumb) && isset($video_thumb['url']) ? esc_url($video_thumb['url']) : esc_url($video_thumb);
                        $row_class = $is_rtl ? '' : 'flex-row-reverse';
                        $text_class = $is_rtl ? 'text-start' : 'text-end';
                    ?>
                        <div class="swiper-slide">
                            <div class="row align-items-center">
                                <div class="col-xs-12 mobile">
                                <?php if (!empty($student_name)) : ?>
                                      <h2 class="testimonial-name mt-5 mb-2"><?php echo esc_html($student_name); ?></h2>
                                  <?php endif; ?>
                                  <?php if (!empty($student_status)) : ?>
                                      <h5 class="testimonial-role mb-4"><?php echo esc_html($student_status); ?></h5>
                                  <?php endif; ?>
                                </div>
                                <div class="col-md-4 text-center position-relative">
                                    <div class="testimonial_bloc_img mb-5">
                                        <img src="<?php echo $thumb_url; ?>" alt="Photo" class="testimonial-img img-fluid shadow">
                                        <?php if (!empty($video_link)) : ?>
                                            <span
                                                class="play-btn shadow play-icon"
                                                data-bs-toggle="modal"
                                                data-bs-target="#videoModal"
                                                data-video-url="<?php echo esc_url($video_link); ?>"
                                               >
                                                <i class="bi bi-play-circle-fill"></i>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-8 align-self-start">
                                    <div class="testimonial-information">
                                        <?php if (!empty($student_name)) : ?>
                                            <h2 class="testimonial-name mt-5 mb-2 desktop"><?php echo esc_html($student_name); ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($student_status)) : ?>
                                            <h5 class="testimonial-role mb-4 desktop"><?php echo esc_html($student_status); ?></h5>
                                        <?php endif; ?>
                                        <?php if (!empty($testimonial_text)) : ?>
                                            <p class="testimonial-text"><?php echo wp_kses_post($testimonial_text); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next btn-next swiper_btn"></div>
                <div class="swiper-button-prev btn-prev swiper_btn"></div>
            </div>
        <?php endif; ?>
    </div>
</section>