<?php
  // Parameters:
  // $label: String
  // $name: String
  // $options: Array
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
  <div class="
    select
    pos-relative
    measure-normal">
    <select class="
      input
      d-block w-100 p-ver-2 p-hor-3
      b-all b-w-1"
      <?php echo $name ? 'name="'.$name.'"' : ''; ?>
      <?php echo $required ? 'required' : ''; ?>>
      <option value="">Please select</option>
      <?php if (is_array($options) && !empty($options)): ?>
        <?php foreach ($options as $option): ?>
          <option value="<?php echo $option['value']; ?>">
            <?php echo $option['label']; ?>
          </option>
        <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </div>

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
