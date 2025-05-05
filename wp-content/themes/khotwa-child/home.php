<?php
/**
 * Template Name: Blog Template
 * Description: A page template for BLOG-specific pages, displaying ACF fields (banner, etc.)
 */
?>
<?php
$bg_top = get_field('bg_banner_color_top') ?: '#800000';
$bg_bottom = get_field('bg_banner_color_bottom') ?: '#330000';
$locale = get_locale(); 
$direction_class = (strpos($locale, 'ar') === 0) ? 'rtl-layout' : 'ltr-layout';
?>
<style>
    .banner_section {
        background: linear-gradient(to top, <?php echo esc_attr($bg_top); ?>, <?php echo esc_attr($bg_bottom); ?>);
    }
</style>

<?php get_header(); ?>

<div class="container my-5">
    <!-- Featured Post -->
    <div class="row align-items-start post_preview mb-2">
    <div class="swiper main-swiper mb-1 <?php echo $direction_class; ?>">
        <div class="swiper-wrapper">
            <?php
            $featured = new WP_Query(['posts_per_page' => 4]); // Plusieurs articles en vedette
            if ($featured->have_posts()) :
                while ($featured->have_posts()) : $featured->the_post(); ?>
                    <div class="swiper-slide">
                        <div class="row align-items-start post_preview">
                            <div class="col-md-6 mb-4">
                                <div class="img_preview">
                                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post_preview_content">
                                    <p class="small text-muted mb-2">
                                        <?php echo formatted_date_localized(get_the_date('c'), $locale); ?>
                                    </p>
                                    <h2 class="title mb-4"><?php the_title(); ?></h2>
                                    <p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        </div>
    </div>
        <!-- 4 Latest Posts -->
    <div class="row mb-5 g-4">
       <!-- Carousel des derniers articles -->
       <div class="swiper latest-swiper mb-5">
            <div class="swiper-wrapper">
                <?php
                $recent = new WP_Query([
                    'posts_per_page' => 8,
                    'offset' => 1
                ]);
                if ($recent->have_posts()) :
                    while ($recent->have_posts()) : $recent->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="card border-0 h-100">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_post_thumbnail('medium', ['class' => 'radius card-img_post']); ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php the_title(); ?></h5>
                                        <p class="card-text small"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    </div>
</div>
</section>
<div class="container">
    <!-- Grouped by Country (Category) -->
    <div class="grouped-by-country">
        <?php
        $terms = get_categories(['hide_empty' => true]);
        if (!empty($terms) && !is_wp_error($terms)) :
            foreach ($terms as $index => $term) :
                $flag = get_field('drapeau', 'category_' . $term->term_id);
                $flag_url = $flag ? esc_url($flag['url']) : '';
                $flag_alt = $flag ? esc_attr($flag['alt']) : '';

                $query = new WP_Query([
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'tax_query' => [[
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $term->term_id
                    ]]
                ]);

                if ($query->have_posts()) :
                    $slider_id = 'swiper-country-' . $index;
        ?>
        <section class="country-section mb-5 <?php echo $direction_class; ?>">
            <div class="my-3 pb-2">
                <div class="country-icon d-flex align-items-center">
                    <?php if ($flag_url) : ?>
                        <div class="flag-icon-container">
                            <img src="<?php echo $flag_url; ?>" alt="<?php echo $flag_alt; ?>" class="flag-image">
                        </div>
                    <?php endif; ?>
                    <span class="country-title m-0"><?php echo esc_html($term->name); ?></span>
                </div>
            </div>

            <div class="swiper <?php echo $slider_id; ?>">
                <div class="swiper-wrapper">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="swiper-slide">
                            <div class="card border-0">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="ratio ratio-4x3 overflow-hidden">
                                            <?php the_post_thumbnail('medium_large', ['class' => 'card-img_list object-fit-cover']); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <p class="small my-2"><?php echo formatted_date_localized(get_the_date('c'), $locale); ?></p>
                                        <h5 class="card-title fw-semibold my-2"><?php the_title(); ?></h5>
                                        <p class="card-text mt-3 small"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <?php
                wp_reset_postdata();
            endif;
        endforeach;
        endif;
        ?>
    </div>

</div>

<?php get_footer(); ?>
