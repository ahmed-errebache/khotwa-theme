<?php
  $contact_banner_bg_top = get_field('contact_banner_bg_top') ?: '#800000';
  $contact_banner_bg_bottom = get_field('contact_banner_bg_bottom') ?: '#330000';
  $contact_banner_right_image = get_field('contact_banner_right_image');
  $contact_bg_image = get_field('contact_bg_image');
  $contact_title = get_field('contact_title');

  $contact_img_right = is_array($contact_banner_right_image) && isset($contact_banner_right_image['url']) ? esc_url($contact_banner_right_image['url']) : esc_url($contact_banner_right_image);
  $contact_bg = is_array($contact_bg_image) && isset($contact_bg_image['url']) ? esc_url($contact_bg_image['url']) : esc_url($contact_bg_image);
?>

<style>
    .banner_contact_section {
        background: linear-gradient(to top, <?php echo esc_attr($contact_banner_bg_top); ?>, <?php echo esc_attr($contact_banner_bg_bottom); ?>);
    }
    .bg_contact {
        background-image: url('<?php echo esc_url($contact_bg); ?>');
    }
    @media (max-width: 768px) {

    }
</style>
<section class="banner banner_contact">
    <div class="bg_contact"></div>
    <div class="container">
            <div class="row align-items-end row_banner">
                <div class="col-md-6">
                    <div class="contact_title text-center py-5 mobile">
                        <h6>
                            <?php if ($contact_title): ?>
                                <span class="title mb-3" data-aos="fade-up" data-aos-delay="300"><?php echo esc_html($contact_title); ?></span>
                            <?php endif; ?>
                        </h6>
                    </div>
                    <div class="contact_right_img">
                        <?php if ($contact_img_right): ?>
                            <img src="<?php echo esc_url($contact_img_right); ?>" alt="Contact Image" class="img-fluid">
                        <?php endif; ?>
                    </div>
                </div>
                 <div class="col-md-6">
                     <div class="contact_right_form"> 
                        <div class="contact_title text-center py-5 desktop">
                            <h6>
                                <?php if ($contact_title): ?>
                                    <span class="title mb-3" data-aos="fade-up" data-aos-delay="300"><?php echo esc_html($contact_title); ?></span>
                                <?php endif; ?>
                            </h6>
                        </div>
                        <div class="contact_form">
                            <?php get_template_part('template-parts/contact/form_contact'); ?>
                        </div>
                     </div>
                 </div>
            </div>
        </div>
</section>