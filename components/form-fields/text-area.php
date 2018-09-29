<?php
  // Parameters:
  // $label: String
  // $name: String
  // $value: String
  // $placeholder: String
  // $required: Boolean
  // $error: String
  // $tooltip: String
  // $class_list: Array
?>

<label class="
  <?php echo is_array($class_list) && !empty($class_list) ? join(' ', $class_list) : ''; ?>
  input
  d-block">
  <?php // Label: ?>
  <div class="
    input__label
    m-bottom-1">
    <?php if ($label): ?>
      <span>
        <?php echo $label; ?>
      </span>
    <?php endif; ?>
  </div>

  <?php // Field: ?>
  <?php // No linebreaks between value and closing tag to resolve whitespace issues. ?>
  <textarea class="
    input__input
    d-block w-100 p-ver-2 p-hor-3
    measure-wide
    b-all b-w-1"
    rows="8"
    <?php echo $name ? 'name="'.$name.'"' : ''; ?>
    <?php echo $placeholder ? 'placeholder="'.$placeholder.'"' : ''; ?>
    <?php echo $required ? 'required' : ''; ?>><?php echo $value ? 'value="'.$value.'"' : ''; ?></textarea>

  <?php // Error: ?>
  <div class="
    input__error
    m-top-2">
    <?php if ($error): ?>
      <div class="
        measure-normal
        c-ut-dark-red">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php // Tooltip: ?>
  <div class="
    input__tooltip
    m-top-2">
    <?php if ($tooltip): ?>
      <div class="measure-normal">
        <?php echo $tooltip; ?>
      </div>
    <?php endif; ?>
  </div>
</label>
