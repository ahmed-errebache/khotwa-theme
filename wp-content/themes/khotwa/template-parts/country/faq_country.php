<?php
   $is_rtl = is_rtl();
   $current_language = substr(get_locale(), 0, 2);
   $direction_class = ($is_rtl && $current_language === 'ar') ? 'rtl_faq' : 'ltr_faq';
    // === Champs visuels ===
    $faq_section_title        = get_field('faq_section_title');
    $faq_section_title_color  = get_field('faq_section_title_color');
    $faq_title_number_color   = get_field('faq_title_number_color');
    $faq_toggle_background    = get_field('faq_toggle_background');
    $faq_toggle_border_color  = get_field('faq_toggle_border_color');
    $faq_toggle_plus_color    = get_field('faq_toggle_plus_color');
    $faq                       = get_field('faq_items');
?>

<style>
    .section-title {
        color: <?php echo $faq_section_title_color; ?>;
    }
    .faq-section .faq-title span,
    .faq_country-number {
        color: <?php echo $faq_title_number_color; ?>;
    }
    .faq_country-toggle {
        background: <?php echo $faq_toggle_background; ?>;
        color: <?php echo $faq_toggle_background; ?>;
    }
    .faq_country-toggle.plus {
        background: transparent;
        border: 1px solid <?php echo $faq_toggle_border_color; ?>;
        color: <?php echo $faq_toggle_plus_color; ?>;
    }
</style>

<section
  class="faq-section <?php echo $direction_class; ?>"
  data-aos="fade-up"
  data-aos-duration="800"
>
    <div class="faq-main"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="faq_title_col">
                    <h2
                      class="section-title"
                      data-aos="fade-down"
                      data-aos-delay="200"
                    >
                        <?php echo esc_html( $faq_section_title ); ?>
                    </h2>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="faq-content">
                    <div class="faq_country-accordion">
                        <?php if ( $faq ): ?>
                            <div class="row text-start mb-4">
                                <?php foreach ( $faq as $index => $item ):
                                    $delay = 300 + ( $index * 150 );
                                ?>
                                <div
                                  class="faq_country-item"
                                  data-aos="fade-up"
                                  data-aos-delay="<?php echo $delay; ?>"
                                  data-aos-duration="600"
                                >
                                    <div
                                      class="faq_country-question"
                                      data-aos="fade-right"
                                      data-aos-delay="<?php echo $delay + 100; ?>"
                                      data-aos-duration="600"
                                    >
                                        <span class="faq_country-number"><?php echo esc_html( $item['faq_number'] ); ?></span>
                                        <span class="faq_country-title"><?php echo esc_html( $item['faq_question'] ); ?></span>
                                        <span class="faq_country-toggle plus">+</span>
                                    </div>
                                    <div
                                      class="faq_country-answer"
                                      data-aos="fade-down"
                                      data-aos-delay="<?php echo $delay + 200; ?>"
                                      data-aos-duration="600"
                                    >
                                        <p><?php echo wp_kses_post( $item['faq_answer'] ); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
