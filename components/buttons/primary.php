<?php
  // Parameters:
  $label = $label ?? 'Submit';
  $type = $type ?? 'submit';
  $class_list = $class_list ?? [];
?>

<button class="
  <?php echo is_array($class_list) && !empty($class_list) ? join(' ', $class_list) : ''; ?>
  d-i-block p-ver-3 p-hor-4
  bg-c-silver"
  type="<?php echo $type; ?>">
  <span class="
    d-block
    line-h-solid">
    <?php echo $label; ?>
  </span>
</button>
