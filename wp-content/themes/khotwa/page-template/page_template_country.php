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
        get_template_part('template-parts/country/establishments');
        get_template_part('template-parts/country/why_choose_country');
        get_template_part('template-parts/country/process_country');
        get_template_part('template-parts/country/statistics_country');
        get_template_part('template-parts/country/faq_country');
        ?>
</div>

<?php
get_footer(); // Récupère le footer.php du thème
?>
<?php