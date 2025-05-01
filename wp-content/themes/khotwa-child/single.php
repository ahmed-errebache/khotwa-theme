<?php get_header(); ?>

<div class="single-post-container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="single-article">
            <h1><?php the_title(); ?></h1>
            <div class="meta">
                <span>Publié le <?php the_time('d M Y'); ?></span>
                <span>| Dans: 
                    <?php
                        $terms = get_the_terms(get_the_ID(), 'pays');
                        if ($terms && !is_wp_error($terms)) {
                            foreach ($terms as $term) {
                                echo esc_html($term->name);
                            }
                        }
                    ?>
                </span>
            </div>
            <div class="featured-image"><?php the_post_thumbnail('large'); ?></div>
            <div class="post-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
