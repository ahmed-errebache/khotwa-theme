<?php
/**
 * Template Name: Country Template
 * Description: A page template for country-specific pages, displaying ACF fields (banner, etc.)
 */

get_header(); // Récupère le header.php du thème
?>
<!-- Bannière (exemple pour un pays) -->
<?php get_template_part('template-parts/common/banner_country'); ?>
        </section>
<!-- MAIN CONTENT -->
<main>

        <?php
        // Affiche chaque section si elle est configurée dans ACF
        get_template_part('template-parts/country/brands_country');
        get_template_part('template-parts/country/domaine_country');
        get_template_part('template-parts/country/passport_country');
        get_template_part('template-parts/country/why-choose');
        get_template_part('template-parts/country/process-section');
        get_template_part('template-parts/country/consultation-section');
        get_template_part('template-parts/country/testimonial-section');
        get_template_part('template-parts/country/study-countries-section');
        get_template_part('template-parts/country/reviews-section');
        get_template_part('template-parts/country/faq-section');
        ?>
</div>

<?php
get_footer(); // Récupère le footer.php du thème
?>
<?php