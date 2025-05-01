<?php get_header(); ?>

<div class="blog-hero">
    <?php
    $featured = new WP_Query(['posts_per_page' => 1]);
    if ($featured->have_posts()) :
        while ($featured->have_posts()) : $featured->the_post(); ?>
            <div class="featured-article">
                <h1><?php the_title(); ?></h1>
                <p><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                <a href="<?php the_permalink(); ?>">Lire plus</a>
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    ?>

    <div class="latest-posts">
        <?php
        $recent = new WP_Query([
            'posts_per_page' => 4,
            'offset' => 1
        ]);
        if ($recent->have_posts()) :
            while ($recent->have_posts()) : $recent->the_post(); ?>
                <div class="mini-post">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); ?>
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</div>

<div class="grouped-by-country">
    <?php
    $terms = get_categories(['hide_empty' => true]);

    if (!empty($terms) && !is_wp_error($terms)) :
        foreach ($terms as $term) :
            $flag = get_field('drapeau', 'category_' . $term->term_id);
            $flag_url = $flag ? esc_url($flag['url']) : '';
            $flag_alt = $flag ? esc_attr($flag['alt']) : '';

            $query = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 3,
                'tax_query' => [[
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $term->term_id
                ]]
            ]);

            if ($query->have_posts()) :
    ?>
        <section class="country-section">
            <div class="country-header">
                <h2>
                    <?php if ($flag_url) : ?>
                        <img src="<?php echo $flag_url; ?>" alt="<?php echo $flag_alt; ?>" class="flag-icon">
                    <?php endif; ?>
                    <?php echo esc_html($term->name); ?>
                </h2>
            </div>

            <div class="country-posts">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="post-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="thumb"><?php the_post_thumbnail('medium'); ?></div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>
    <?php
            endif;
            wp_reset_postdata();
        endforeach;
    endif;
    ?>
</div>

<?php get_footer(); ?>
