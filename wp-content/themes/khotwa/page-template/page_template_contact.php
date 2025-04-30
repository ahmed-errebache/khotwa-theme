<?php
/**
 * Template Name: Contact Template
 * Description: A page template for contact-specific pages, displaying ACF fields (banner, etc.)
 */
$banner_contact_section = get_field('banner_contact_section');

get_header(); // Récupère le header.php du thème
?>
<?php get_template_part('template-parts/common/banner_contact'); ?>

</section>
<!-- MAIN CONTENT -->
<main class="<?php echo $banner_contact_section ? 'main_contact' : ''; ?>">

<!-- Affichage du contenu principal de la page -->
<?php
if ( have_posts() ) :
while ( have_posts() ) : the_post();
    the_content();
endwhile;
endif;
?>

</div>

<?php
get_footer(); // Récupère le footer.php du thème
?>
<?php