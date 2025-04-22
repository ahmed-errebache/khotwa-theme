<?php
$study_country_title = get_field('study_country_title');
$study_cards = get_field('study_cards_country');
?>
<?php if ($study_country_title || !empty($study_cards)) : ?>
    <section class="study-countries py-2">
        <div class="main-study">
        <div class="container">
            <!-- Titre principal -->
            <?php if ($study_country_title): ?>
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-3 text-center">
                            <?php echo esc_html($study_country_title); ?>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Cartes de pays -->
            <?php if (!empty($study_cards)) : ?>
                <div class="study-swiper py-4">
                    <div class="swiper-wrapper">
                        <?php foreach ($study_cards as $card) :

                            // Images sécurisées (comme section banner)
                            $image_raw = $card['study_card_image'];
                            $flag_raw = $card['study_country_flag'];
                            $link_card = $card['study_country_url'];

                            $image_url = '';
                            if (is_array($image_raw)) {
                                $image_url = isset($image_raw['url']) ? esc_url($image_raw['url']) : '';
                            } elseif (is_string($image_raw)) {
                                $image_url = esc_url($image_raw);
                            }

                            $flag_url = '';
                            if (is_array($flag_raw)) {
                                $flag_url = isset($flag_raw['url']) ? esc_url($flag_raw['url']) : '';
                            } elseif (is_string($flag_raw)) {
                                $flag_url = esc_url($flag_raw);
                            }

                            $title = !empty($card['study_card_title']) ? esc_html($card['study_card_title']) : '';
                            $description = !empty($card['study_country_description']) ? esc_html($card['study_country_description']) : '';
                            $url = is_array($link_card) && isset($link_card['url']) ? esc_url($link_card['url']) : esc_url($link_card);
                        ?>
                            <div class="swiper-slide">
                                <div class="country-card mb-4 rounded h-100">
                                    <?php if ($url): ?>
                                        <a href="<?php echo $url; ?>" class="text-decoration-none text-dark d-block h-100">
                                    <?php endif; ?>

                                        <!-- Image principale -->
                                        <?php if ($image_url): ?>
                                            <div class="country-card-image position-relative">
                                                <img src="<?php echo $image_url; ?>" alt="<?php echo $title; ?>" class="img-fluid image-card w-100">
                                                <?php if ($flag_url): ?>
                                                    <div class="flag-icon position-absolute">
                                                        <img src="<?php echo $flag_url; ?>" alt="Flag" class="rounded-circle">
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <!-- Contenu -->
                                        <div class="country-card-content text-center">
                                            <?php if ($title): ?>
                                                <h3 class="mb-2"><?php echo $title; ?></h3>
                                            <?php endif; ?>
                                            <?php if ($description): ?>
                                                <p class="card-desciption"><?php echo $description; ?></p>
                                            <?php endif; ?>
                                        </div>

                                    <?php if ($url): ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="swiper-pagination"></div>
                    <!-- Uncomment if you want to add navigation buttons
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div> -->
                </div>
            <?php endif; ?>
        </div>
        </div>
    </section>
<?php endif; ?>

