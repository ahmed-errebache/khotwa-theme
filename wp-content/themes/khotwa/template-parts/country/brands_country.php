<?php
$logos = get_field('brands_repetetor');
?>

<?php if ($logos): ?>
<section class="brands-section">
   <div class="brands-main">
    <!-- Swiper des logos -->
    <div class="swiper universitySwiper">
        <div class="swiper-wrapper">
          <?php
            // Dupliquer les logos pour la boucle fluide
            $all_logos = array_merge($logos, $logos);
            foreach ($all_logos as $item) {
              $logo_img = $item['brands_section_image'];
              $logo_url = is_array($logo_img) && isset($logo_img['url']) ? esc_url($logo_img['url']) : esc_url($logo_img);
              if ($logo_url) {
                echo '<div class="swiper-slide">
                        <img src="' . $logo_url . '" alt="Logo" />
                      </div>';
              }
            }
          ?>
        </div>
      </div>
   </div>
</section>
<?php endif; ?>
