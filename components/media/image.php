<?php
  // Parameters:
  $src = $src ?? false;
  $srcset = $srcset ?? false;
  $alt = $alt ?? false;
?>

<?php // Responsive/directed picture: ?>
<?php if (!empty($srcset) && is_array($srcset)): ?>
  <picture class="d-block w-100">
    <?php // Media-matching sources: ?>
    <?php
      $sources = $srcset;
      unset($sources['0']);
      foreach ($sources as $breakpoint => $source):
    ?>
      <source srcset="
        <?php echo (is_string($source['1x']) && !empty($source['1x'])) ? $source['1x'].' 1x, ' : ''; ?>
        <?php echo (is_string($source['2x']) && !empty($source['2x'])) ? $source['2x'].' 2x' : ''; ?>"
        media="(min-width: <?php echo $breakpoint; ?>px)">
    <?php endforeach; ?>

    <?php // Base source: ?>
    <?php if (isset($srcset['0'])): ?>
      <img
        class="d-block w-100"
        srcset="
          <?php echo (is_string($srcset['0']['1x']) && !empty($srcset['0']['1x'])) ? $srcset['0']['1x'].' 1x, ' : ''; ?>
          <?php echo (is_string($srcset['0']['2x']) && !empty($srcset['0']['2x'])) ? $srcset['0']['2x'].' 2x' : ''; ?>"
        <?php echo (is_string($src) && !empty($src)) ? 'src="'.$src.'"' : ''; ?>
        <?php echo (is_string($alt) && !empty($alt)) ? 'alt="'.$alt.'"' : ''; ?>>
    <?php endif; ?>
  </picture>

<?php // Simple image: ?>
<?php else: ?>
  <?php if (is_string($src) && !empty($src)): ?>
    <img
      <?php echo (is_string($src) && !empty($src)) ? 'src="'.$src.'"' : ''; ?>
      <?php echo (is_string($alt) && !empty($alt)) ? 'alt="'.$alt.'"' : ''; ?>>
  <?php endif; ?>
<?php endif; ?>
