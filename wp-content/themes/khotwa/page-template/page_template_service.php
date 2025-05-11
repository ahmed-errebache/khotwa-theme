<?php
/**
 * Template Name: Service Template
 * Description: A page template for service-specific pages, displaying ACF fields (banner, etc.)
 */

get_header(); // Récupère le header.php du thème
?>
<!-- Bannière (exemple pour un pays) -->
<?php get_template_part('template-parts/service/bloc_service_banner'); ?>
        </section>
<!-- MAIN CONTENT -->
<main>

        <?php
        // Affiche chaque section si elle est configurée dans ACF
            get_template_part('template-parts/service/bloc_valeurs_service');
            get_template_part('template-parts/service/bloc_differenciation_service');
        ?>
</div>

<?php
get_footer(); // Récupère le footer.php du thème
?>
<?php