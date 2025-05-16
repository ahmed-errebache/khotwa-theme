<?php
// — Récupération des champs ACF —
$title       = get_field('title_section_establishment');
$rows        = get_field('establishement_repetetor');
$est_img     = get_field('establishement_image');

// URL de l’image
$est_img_url = '';
if ( $est_img ) {
  $est_img_url = is_array($est_img) && isset($est_img['url'])
    ? esc_url( $est_img['url'] )
    : esc_url( $est_img );
}
?>

<?php if ( $title || $rows ): ?>
<section
  id="establishments"
  class="establishments-section"
  dir="rtl"
  data-aos="fade-up"
  data-aos-duration="800"
>
  <!-- Desktop -->
  <div class="bottom-section bottom-desktop">
    <div class="container h-100">
      <div class="row h-100">

        <?php if ( $est_img_url ): ?>
        <div
          class="col-md-6 position-relative esta-left"
          data-aos="zoom-in"
          data-aos-delay="200"
        >
          <img
            src="<?php echo $est_img_url; ?>"
            alt="<?php echo esc_attr( $title ); ?>"
            class="pic-esta"
          >
        </div>
        <?php endif; ?>

        <div class="col-md-6 d-flex flex-column justify-content-center ps-md-4 esta-right">
          <?php if ( $title ): ?>
            <h2
              class="section-title mb-4"
              style="margin-bottom:50px; line-height:1.5; font-size:45px;"
              data-aos="fade-down"
              data-aos-delay="300"
            >
              <?php echo wp_kses_post( $title ); ?>
            </h2>
          <?php endif; ?>

          <?php if ( $rows ): ?>
            <ul class="list-unstyled">
            <?php
              $total = count( $rows );
              foreach ( $rows as $index => $row ):
                $icon     = $row['icon_list'];
                $text     = $row['test_list'];
                $icon_url = is_array($icon) && isset($icon['url'])
                  ? esc_url($icon['url'])
                  : esc_url($icon);
                $delay    = 400 + $index * 100;
            ?>
              <li
                class="d-flex align-items-start mb-3"
                data-aos="fade-right"
                data-aos-delay="<?php echo $delay; ?>"
              >
                <?php if ( $icon_url ): ?>
                  <img src="<?php echo $icon_url; ?>"
                       alt=""
                       class="icon-img me-2">
                <?php endif; ?>
                <span><?php echo esc_html( $text ); ?></span>
              </li>

              <?php if ( $index < $total - 1 ): ?>
                <img
                  src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hr.png' ); ?>"
                  alt=""
                  data-aos="fade-up"
                  data-aos-delay="<?php echo $delay; ?>"
                >
              <?php endif; ?>

            <?php endforeach; ?>
            </ul>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>

  <!-- Mobile -->
  <div class="bottom-mobile">
    <?php if ( $title ): ?>
      <h2
        class="section-title"
        data-aos="fade-down"
        data-aos-delay="200"
      >
        <?php echo wp_kses_post( $title ); ?>
      </h2>
    <?php endif; ?>

    <?php if ( $est_img_url ): ?>
      <img
        src="<?php echo $est_img_url; ?>"
        alt="<?php echo esc_attr( $title ); ?>"
        class="pic-esta mobile mb-4"
        data-aos="zoom-in"
        data-aos-delay="300"
      >
    <?php endif; ?>

    <?php if ( $rows ): ?>
      <ul class="list-unstyled">
      <?php
        foreach ( $rows as $index => $row ):
          $icon     = $row['icon_list'];
          $text     = $row['test_list'];
          $icon_url = is_array($icon) && isset($icon['url'])
            ? esc_url($icon['url'])
            : esc_url($icon);
          $delay    = 400 + $index * 100;
      ?>
        <li
          class="d-flex align-items-start mb-3"
          data-aos="fade-right"
          data-aos-delay="<?php echo $delay; ?>"
        >
          <?php if ( $icon_url ): ?>
            <img src="<?php echo $icon_url; ?>"
                 alt=""
                 class="icon-img me-2">
          <?php endif; ?>
          <span><?php echo esc_html( $text ); ?></span>
        </li>
        <?php if ( $index < $total - 1 ): ?>
          <img
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hr.png' ); ?>"
            alt=""
            data-aos="fade-up"
            data-aos-delay="<?php echo $delay; ?>"
          >
        <?php endif; ?>
      <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
