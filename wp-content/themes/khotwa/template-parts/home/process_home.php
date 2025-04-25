<?php
// Récupération des champs ACF pour la section Process
$bg_process_top = get_field('bg_banner_color_top') ?: '#800000';
$bg_process_bottom = get_field('bg_banner_color_bottom') ?: '#330000';
$titre_de_process = get_field('titre_de_process', false, false);
$background_de_process = get_field('background_de_process');
$process_repetetor     = get_field('process_repetetor');
$text_button_process   = get_field('text_button_process');

// Valeurs par défaut si les champs ne sont pas renseignés
if (!$titre_de_process) {
    $titre_de_process = 'كيف تبدأ رحلتك معنا في ثلاث خطوات ؟';
}

// Image de fond
$default_bg = get_template_directory_uri() . '/assets/img/footer-red.png';
if (is_array($background_de_process) && isset($background_de_process['url'])) {
    $background_url = esc_url($background_de_process['url']);
} elseif (!empty($background_de_process) && is_string($background_de_process)) {
    $background_url = esc_url($background_de_process);
} else {
    $background_url = $default_bg;
}
?>

<style>
    .process-section {
        background: linear-gradient(to top, <?php echo esc_attr($bg_process_top); ?>, <?php echo esc_attr($bg_process_bottom); ?>);
    }
</style>

<!-- Section Process -->
<section class="process-section text-white position-relative">
    <!-- Icônes décoratives -->
    <div class="icon-top-left">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Top Left" class="icon-shape">
    </div>
    <div class="icon-top-right">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/iconSections.png" alt="Icon Top Right" class="icon-shape">
    </div>

    <div class="container py-5">
        <!-- Titre de la section -->
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12 text-center">
                <h2 class="steps-title"><?php echo esc_html($titre_de_process); ?></h2>
            </div>
        </div>

        <!-- Étapes ACF -->
        <?php if (have_rows('process_repetetor')): ?>
            <div class="row gy-4">
                <?php
                $i = 1;
                while (have_rows('process_repetetor')): the_row();
                    $titre_de_step      = get_sub_field('titre_de_step');
                    $image_de_step      = get_sub_field('image_de_step');
                    $sous_titre_de_step = get_sub_field('sous_titre_de_step');
                    $paragraphe_de_step = get_sub_field('paragraphe_de_step');

                    // Traitement de l'image
                    $step_image_url = '';
                    if (is_array($image_de_step) && isset($image_de_step['url'])) {
                        $step_image_url = esc_url($image_de_step['url']);
                    } elseif (!empty($image_de_step) && is_string($image_de_step)) {
                        $step_image_url = esc_url($image_de_step);
                    }

                    // Skip si tous les champs sont vides
                    if (!$titre_de_step && !$sous_titre_de_step && !$paragraphe_de_step && !$step_image_url) {
                        continue;
                    }
                ?>
                <div class="col-md-4 text-center step-<?php echo $i; ?>" data-aos="fade-in" data-aos-delay="500">
                    <div class="step-box p-3">
                        <div class="step-number">.<?php echo $i; ?></div>

                        <?php if ($titre_de_step): ?>
                            <h3 class="step-heading"><?php echo esc_html($titre_de_step); ?></h3>
                        <?php endif; ?>

                        <?php if ($step_image_url): ?>
                            <div class="step-image-container mb-3">
                                <img src="<?php echo $step_image_url; ?>" alt="<?php echo esc_attr($titre_de_step); ?>" class="step-image">
                            </div>
                        <?php endif; ?>

                        <?php if ($sous_titre_de_step): ?>
                            <h4 class="step-subtitle"><?php echo esc_html($sous_titre_de_step); ?></h4>
                        <?php endif; ?>

                        <?php if ($paragraphe_de_step): ?>
                            <p class="step-description"><?php echo wp_kses_post($paragraphe_de_step); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                    $i++;
                endwhile;
                ?>
            </div>
        <?php endif; ?>

        <!-- Bouton d'appel à l'action -->
        <?php if ($text_button_process): ?>
            <div class="row mt-5" data-aos="fade-up" data-aos-delay="500">
                <div class="col-12 text-center">
                    <a href="#" class="btn-consultation"><?php echo esc_html($text_button_process); ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
