<?php if (function_exists('pll_the_languages')) :
    $languages = pll_the_languages(array(
        'raw' => 1,
        'hide_if_no_translation' => 1,
    ));

    if (!empty($languages)) :
        $current_lang = null;
        foreach ($languages as $lang) {
            if (!empty($lang['current_lang']) && $lang['current_lang']) {
                $current_lang = $lang;
                break;
            }
        }

        if ($current_lang): ?>
            <div class="language-dropdown-wrapper mr-5">
                <div class="language-toggle">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flags/<?php echo esc_attr($current_lang['slug']); ?>.svg" alt="<?php echo esc_attr($current_lang['name']); ?>" width="20" height="18">
                </div>
                <ul class="language-dropdown-list">
                    <?php foreach ($languages as $lang) :
                        if (empty($lang['current_lang'])) : ?>
                            <li>
                                <a href="<?php echo esc_url($lang['url']); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/flags/<?php echo esc_attr($lang['slug']); ?>.svg" alt="<?php echo esc_attr($lang['name']); ?>" width="35" height="18">
                                </a>
                            </li>
                        <?php endif;
                    endforeach; ?>
                </ul>
            </div>
<?php
        endif;
    endif;
endif;
?>
