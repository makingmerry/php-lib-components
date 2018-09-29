<?php
  // Parameters:
  // $label: String
  // $href: String
  // $class_list: Array
?>

<a class="
  <?php echo is_array($class_list) && !empty($class_list) ? join(' ', $class_list) : ''; ?>
  d-i-block p-ver-3 p-hor-4
  bg-c-silver" href="<?php echo $href; ?>">
  <div class="line-h-solid">
    <?php echo $label; ?>
  </div>
</a>
