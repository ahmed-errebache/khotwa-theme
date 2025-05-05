<?php
/**
 * Template Name: Single Template
 * Description: A page template for Single-specific pages, displaying ACF fields (banner, etc.)
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Banner Hero -->
<section class="post-banner text-center text-white py-5">
    <div class="container">
        <h1 class="mb-3"><?php the_title(); ?></h1>
    </div>
</section>
</section>
<!-- Post Content -->
<main class="container py-5 single-post-content">
    <div class="row">
        <div class="col-9">
            <!-- Featured image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="post-thumbnail text-center mb-4">
                    <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
                </div>
            <?php endif; ?>

            <!-- Meta -->
            <div class="d-flex gap-3 mb-4 text-muted">
                <span class="date_format">
                    <i class="bi bi-calendar"></i> <?php echo get_the_date(); ?>
                </span>
            </div>

            <!-- Main Content -->
            <div class="content mb-5">
                <?php the_content(); ?>
            </div>

            <!-- Tags and Categories -->
            <div class="d-flex flex-wrap mb-5">
                <div class="category">
                    <strong><?php echo __('Categories:', 'khotwa-child'); ?></strong> <?php the_category(', '); ?>
                </div>
            </div>
            <div class="d-flex flex-wrap mb-5">
                <div class="tags">
                    <strong><?php echo __('Tags:', 'khotwa-child'); ?></strong> <?php the_tags('', ', '); ?>
                </div>
            </div>

            <!-- Post navigation -->
            <div class="post-navigation d-flex justify-content-between mb-5">
                <div class="previous"><?php previous_post_link('%link', __('← Previous', 'khotwa-child')); ?></div>
                <div class="next"><?php next_post_link('%link', __('Next →', 'khotwa-child')); ?></div>
            </div>

            <!-- Comments -->
            <div class="post-comments">
                <?php comments_template(); ?>
            </div>
        </div>
    </div>
</main>

<!-- Related Posts -->
<section class="related-posts py-5">
    <div class="container">
        <h4 class="text-center mb-4"><?php echo __('You May Also Like', 'khotwa-child'); ?></h4>
        <div class="row g-4">
            <?php
            $related = new WP_Query([
                'posts_per_page' => 3,
                'post__not_in' => [get_the_ID()],
                'orderby' => 'rand'
            ]);
            while ($related->have_posts()) : $related->the_post(); ?>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                        <div class="card-body">
                            <span class="text-muted small"><?php echo get_the_date(); ?></span>
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">
                                <?php echo __('Read More', 'khotwa-child'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
