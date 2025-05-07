<?php
   $is_rtl = is_rtl();
   $current_language = substr(get_locale(), 0, 2);
   $direction_class = ($is_rtl && $current_language === 'ar') ? 'rtl_faq' : 'ltr_faq';
    // === Champs visuels ===
    $faq_section_title = get_field('faq_section_title');
    $faq_section_title_color = get_field('faq_section_title_color');
    $faq_title_number_color = get_field('faq_title_number_color');
    $faq_toggle_background_color = get_field('faq_toggle_background');
    $faq = get_field('faq_items');
?>

<style>
    .section-title {
        color: <?php echo $faq_section_title_color; ?>; /* Couleur dynamique */
    }
    .faq-section .faq-title span {
        color: <?php echo $faq_title_number_color; ?>; /* Couleur dynamique */
    }
    .faq_country-number {
        color: <?php echo $faq_title_number_color; ?>; /* Couleur dynamique */
    }
    .faq_country-toggle {
        font-size: 15px;
        color: <?php echo $faq_toggle_background_color; ?>; /* Couleur dynamique */
        background: <?php echo $faq_toggle_background_color; ?>; /* Couleur dynamique */
    }

    .faq_country-toggle.plus {
        background: transparent;
        border: 1px solid <?php echo $faq_toggle_border_color; ?>; /* Couleur dynamique */
        color: <?php echo $faq_toggle_plus_color; ?>; /* Couleur dynamique */
    }
</style>

<section class="faq-section <?php echo $direction_class; ?>">
    <div class="faq-main">
    </div>
    <div class="container">
                     <div class="row">
                          <div class="col-lg-4">
                             <div class="faq_title_col">
                                <h2 class="section-title">
                                    <?php echo $faq_section_title; // Titre de la section ?>
                                </h2>
                             </div>
                          </div>
                          <div class="col-lg-8">
                                <div class="faq-content">
                                <div class="faq_country-accordion">
                                    <?php if ($faq): ?>
                                        <div class="row text-start mb-4">
                                            <?php foreach ($faq as $item): ?>
                                                <div class="faq_country-item">
                                                    <div class="faq_country-question">
                                                        <span class="faq_country-number"><?php echo $item['faq_number']; // Numéro de la FAQ ?></span>
                                                        <span class="faq_country-title"><?php echo $item['faq_question']; // Question de la FAQ ?></span>
                                                        <span class="faq_country-toggle plus">+</span>
                                                    </div>
                                                    <div class="faq_country-answer">
                                                        <p><?php echo $item['faq_answer']; // Réponse de la FAQ ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                 </div>
                          </div>
                     </div>
          </div>
</section>
