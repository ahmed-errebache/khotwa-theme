<?php
$bg_top = get_field('bg_banner_color_top') ?: '#800000';
$bg_bottom = get_field('bg_banner_color_bottom') ?: '#330000';
$title = get_field('title');
$left_image = get_field('left_image');
$right_image = get_field('right_image');
$video_image = get_field('video_image');
$video_url = get_field('video_url');
$button_text = get_field('cta_button_text');
$button_url = get_field('cta_button_url');
$button_text_color = get_field('button_text_color') ?: 'var(--text-color-marron)'; // Couleur par défaut si non définie
$button_text_bgcolor = get_field('button_text_bgcolor') ?: 'var(--color-jaune)'; // Couleur par défaut si non définie
$image_right_bottom_position = get_field('image_right_bottom_position') ?: '0'; // valeur par défaut si vide
$image_left_bottom_position = get_field('image_left_bottom_position') ?: '0'; // valeur par défaut si vide
$image_right_bottom_position_mobile = get_field('image_right_bottom_position_mobile') ?: '0'; // valeur par défaut si vide
$image_left_bottom_position_mobile= get_field('image_left_bottom_position_mobile') ?: '0'; // valeur par défaut si vide

// Vérifications des URLs d'images (tableau ou URL directe)
$left_image_url = is_array($left_image) && isset($left_image['url']) ? esc_url($left_image['url']) : esc_url($left_image);
$right_image_url = is_array($right_image) && isset($right_image['url']) ? esc_url($right_image['url']) : esc_url($right_image);
$video_image_url = is_array($video_image) && isset($video_image['url']) ? esc_url($video_image['url']) : esc_url($video_image);
$key_benefits = get_field('key_benefits');
?>

<style>
    .banner_section {
        background: linear-gradient(to top, <?php echo esc_attr($bg_top); ?>, <?php echo esc_attr($bg_bottom); ?>);
    }
    .banner_country .left_image_banner {
        bottom: <?php echo esc_attr($image_left_bottom_position); ?>%;
    }
    .banner_country .right_image_banner {
        bottom: <?php echo esc_attr($image_right_bottom_position); ?>%;
    }
    @media (max-width: 768px) {
        .banner_country .left_image_banner {
            bottom: <?php echo esc_attr($image_left_bottom_position_mobile); ?>%;
        }
        .banner_country .right_image_banner {
            bottom: <?php echo esc_attr($image_right_bottom_position_mobile); ?>%;
        }
    }
</style>

<!-- Section Bannière -->
<?php if ($title || $subtitle): ?>
    <section class="banner banner_country py-2 text-center text-white">
        <div class="container">
            <div class="row align-items-center">

                <!-- Image gauche -->

                <!-- Contenu principal -->
                <div class="col-md-12 text-center">
                    <?php if ($title): ?>
                        <h1 class="title mb-3" data-aos="fade-up" data-aos-delay="300"><?php echo esc_html($title); ?></h1>
                    <?php endif; ?>

                    <!-- Liste des avantages principaux -->
                    <?php if ($key_benefits): ?>
                        <div class="benefit justify-content-center text-center mb-4" data-aos="fade-up" data-aos-delay="250">
                            <div class="row">
                            <?php foreach ($key_benefits as $benefit):
                                $benefit_icon = $benefit['benefit_icon'];
                                $benefit_text = $benefit['benefit_text'];
                                $benefit_icon_url = is_array($benefit_icon) && isset($benefit_icon['url']) ? esc_url($benefit_icon['url']) : esc_url($benefit_icon);
                                ?>
                                <div class="col-6 col-md-3 d-flex align-items-center justify-content-center mb-3">
                                    <div class="benefit_item">
                                        <?php if ($benefit_icon_url): ?>
                                            <img src="<?php echo $benefit_icon_url; ?>" alt="Benefit Icon" class="me-2">
                                        <?php endif; ?>
                                        <span class="txt_list"><?php echo esc_html($benefit_text); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                     <!-- Bouton d'appel à l'action -->  
                     <div class="is_country_page">
                            <!-- Image vidéo cliquable -->
                            <?php if ($video_image_url && $video_url): ?>
                                <div class="video-thumbnail" data-aos="fade-up" data-aos-delay="300">
                                  <a href="#"
                                    class="video-trigger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#videoModal"
                                    data-video-url="<?php echo esc_url(get_field('video_url')); ?>">
                                    <span class="play-icon"
                                    data-bs-toggle="modal"
                                    data-bs-target="#videoModal"
                                    data-video-url="<?php echo esc_url(get_field('video_url')); ?>"
                                    >
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/play_icon.png" alt="Play Icon">
                                    </span>
                                        <img src="<?php echo $video_image_url; ?>" alt="Video Thumbnail" class="img-fluid rounded shadow">
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ($button_text && $button_url): ?>
                        <a class="btn btn-consultation btn-settings" data-aos="fade-up" data-aos-delay="300"
                            href="<?php echo esc_url($button_url); ?>">
                            <?php echo esc_html($button_text); ?>
                        </a>
                    <?php endif; ?>
                    <?php if ($left_image_url): ?>
                        <div class="left_image_banner img_banner py-5" data-aos="fade-up" data-aos-delay="300">
                            <img src="<?php echo $left_image_url; ?>" alt="Left Image" class="img-fluid">
                        </div>
                    <?php endif; ?> 
                <!-- Image droite -->
                <?php if ($right_image_url): ?>
                    <div class="right_image_banner desktop img_banner" data-aos="fade-left" data-aos-delay="250">
                        <img src="<?php echo $right_image_url; ?>" alt="Right Image" class="img-fluid">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?php endif; ?>
