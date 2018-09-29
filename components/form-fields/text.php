<?php
  // Parameters:
  // $label: String
  // $type: String
  // $name: String
  // $multi_line: Int
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
  <?php // Mutli-line: ?>
  <?php if (is_int($multi_line) && $multi_line > 0): ?>
    <?php for ($i = 1; $i <= $multi_line; $i++): ?>
      <input class="
        input
        d-block w-100 p-ver-2 p-hor-3
        measure-wide
        b-all b-w-1
        <?php echo $i !== $multi_line ? 'm-bottom-2' : ''; ?>"
        <?php echo $type ? 'type="'.$type.'"' : ''; ?>
        <?php echo $name ? 'name="'.$name.'-'.$i.'"' : ''; ?>
        <?php echo $value && $i === 1 ? 'value="'.$value.'"' : ''; ?>
        <?php echo $placeholder && $i === 1 ? 'placeholder="'.$placeholder.'"' : ''; ?>
        <?php echo $required && $i === 1 ? 'required' : ''; ?>>
    <?php endfor; ?>

  <?php // Single-line: ?>
  <?php else: ?>
    <input class="
      input
      d-block w-100 p-ver-2 p-hor-3
      measure-normal
      b-all b-w-1"
      <?php echo $type ? 'type="'.$type.'"' : ''; ?>
      <?php echo $name ? 'name="'.$name.'"' : ''; ?>
      <?php echo $value ? 'value="'.$value.'"' : ''; ?>
      <?php echo $placeholder ? 'placeholder="'.$placeholder.'"' : ''; ?>
      <?php echo $required ? 'required' : ''; ?>>
  <?php endif; ?>

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