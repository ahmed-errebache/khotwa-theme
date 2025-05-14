<?php
// ACF fields
$title    = get_field('title_section_establishment');
$rows     = get_field('establishement_repetetor');
$est_img  = get_field('establishement_image');

// Prepare image URL
$est_img_url = '';
if ($est_img) {
    $est_img_url = is_array($est_img) && isset($est_img['url'])
        ? esc_url($est_img['url'])
        : esc_url($est_img);
}
?>

<?php if ($title || $rows): ?>
<section id="establishments" class="establishments-section" dir="rtl">

  <!-- Top 1/3 (desktop & mobile identical) -->
  <div class="top-section">
    <img
      src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/testimonial_bg.png' ); ?>"
      alt=""
      class="top-bg-img"
    >
  </div>

  <!-- Bottom DESKTOP (unchanged) -->
  <div class="bottom-section bottom-desktop">
    <div class="container h-100">
      <div class="row h-100">

        <!-- Left: dynamic establishment image -->
        <?php if ($est_img_url): ?>
        <div class="col-md-6 position-relative esta-left">
          <img
            src="<?php echo $est_img_url; ?>"
            alt="<?php echo esc_attr($title); ?>"
            class="pic-esta"
          >
        </div>
        <?php endif; ?>

        <!-- Right: dynamic title + repeater list -->
        <div class="col-md-6 d-flex flex-column justify-content-center ps-md-4 esta-right">
          <?php if ($title): ?>
            <h2 class="section-title mb-4" style="margin-bottom: 50px !important;line-height: 1.5;font-size: 45px;">
              <?php echo esc_html($title); ?>
            </h2>
          <?php endif; ?>

          <?php if ($rows): ?>
<ul class="list-unstyled">
  <?php 
    $total = count($rows);
    foreach ($rows as $index => $row): 
      $icon    = $row['icon_list'];
      $text    = $row['test_list'];
      $icon_url = is_array($icon) && isset($icon['url'])
                  ? esc_url($icon['url'])
                  : esc_url($icon);
  ?>
    <li class="d-flex align-items-start mb-3">
      <?php if ($icon_url): ?>
        <img src="<?php echo $icon_url; ?>" alt="" class="icon-img me-2">
      <?php endif; ?>
      <span><?php echo esc_html($text); ?></span>
    </li>

    <?php
      // Affiche le <hr> (ou image) uniquement si on n'est pas sur le dernier élément
      if ($index < $total - 1): 
    ?>
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hr.png' ); ?>"
        alt=""
      >
    <?php endif; ?>

  <?php endforeach; ?>
</ul>
<?php endif; ?>

        </div>

      </div>
    </div>
  </div>

  <!-- Bottom MOBILE (Title → Image → List) -->
  <div class="bottom-mobile">
    <?php if ($title): ?>
      <h2 class="section-title"><?php echo esc_html($title); ?></h2>
    <?php endif; ?>

    <?php if ($est_img_url): ?>
      <img
        src="<?php echo $est_img_url; ?>"
        alt="<?php echo esc_attr($title); ?>"
        class="pic-esta"
      >
    <?php endif; ?>

    <?php if ($rows): ?>
<ul class="list-unstyled">
  <?php 
    $total = count($rows);
    foreach ($rows as $index => $row): 
      $icon    = $row['icon_list'];
      $text    = $row['test_list'];
      $icon_url = is_array($icon) && isset($icon['url'])
                  ? esc_url($icon['url'])
                  : esc_url($icon);
  ?>
    <li class="d-flex align-items-start mb-3">
      <?php if ($icon_url): ?>
        <img src="<?php echo $icon_url; ?>" alt="" class="icon-img me-2">
      <?php endif; ?>
      <span><?php echo esc_html($text); ?></span>
    </li>

    <?php
      // Affiche le <hr> (ou image) uniquement si on n'est pas sur le dernier élément
      if ($index < $total - 1): 
    ?>
      <img
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/hr.png' ); ?>"
        alt=""
      >
    <?php endif; ?>

  <?php endforeach; ?>
</ul>
<?php endif; ?>

  </div>

</section>
<?php endif; ?>
