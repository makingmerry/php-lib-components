<?php
  // Parameters:
  $html = $html ?? '';
  $class_list = $class_list ?? [];
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($html)) {
      throw new Exception('Paragraph HTML is missing.');
    }
?>

  <div class="
    <?php echo is_array($class_list) && !empty($class_list) ? join(' ', $class_list) : ''; ?>
    text-paragraph">
    <?php echo $html; ?>
  </div>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
