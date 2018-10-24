<?php
  // Parameters:
  $href = $href ?? '';
  $label = $label ?? 'Click here';
  $class_list = $class_list ?? [];
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($href)) {
      throw new Exception('Link href is missing.');
    }
?>

  <a
    class="
      <?php echo is_array($class_list) && !empty($class_list) ? join(' ', $class_list) : ''; ?>
      d-i-block p-ver-3 p-hor-4
      bg-c-silver" href="<?php echo $href; ?>"
    itemprop="url">
    <div class="line-h-solid">
      <?php echo $label; ?>
    </div>
  </a>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
