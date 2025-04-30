<?php
$form_fr = get_field('form_fr');
$form_ar = get_field('form_ar');
$form_en = get_field('form_en');

$form_class = ''; // Par défaut

// Détecter la langue et choisir le bon formulaire
if (function_exists('pll_current_language')) {
    $lang = pll_current_language();
    if ($lang === 'fr') {
        $form_shortcode = $form_fr;
    } elseif ($lang === 'ar') {
        $form_shortcode = $form_ar;
        $form_class = 'rtl-form'; // ajouter la classe pour le RTL
    } elseif ($lang === 'en') {
        $form_shortcode = $form_en;
    }
}

if (!empty($form_shortcode)) :
?>
    <div class="<?php echo esc_attr($form_class); ?>">
        <?php echo do_shortcode($form_shortcode); ?>
    </div>
<?php endif; ?>