<?php
  // Parameters:
  $name = $name ?? '';
  $disabled = $disabled ?? false;
  $required = $required ?? false;
  $options = $options ?? [];
  $label = $label ?? 'Text input';
  $error = $error ?? false;
  $tooltip = $tooltip ?? false;
  $class_list = $class_list ?? [];
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($name)) {
      throw new Exception('Select input name is missing.');
    }
    if (!is_string($name)) {
      throw new Exception('Select input name is not a string.');
    }
?>

  <label class="
    <?php echo !empty($class_list) && is_array($class_list) ? join(' ', $class_list) : ''; ?>
    input
    d-block">
    <?php // Label: ?>
    <div class="
      input__label
      m-bottom-1">
      <?php if (!empty($label) && is_string($label)): ?>
        <div class="line-h-title">
          <?php echo $label; ?>
        </div>
      <?php endif; ?>
    </div>

    <?php // Field: ?>
    <div class="
      select
      pos-relative
      measure-normal">
      <select class="
        input__field
        d-block w-100 p-ver-2 p-hor-3
        b-all b-w-1"
        name="<?php echo $name; ?>"
        <?php echo (is_bool($disabled) && $disabled) ? 'disabled' : ''; ?>
        <?php echo (is_bool($required) && $required) ? 'required' : ''; ?>>
        <?php // Default option: ?>
        <option disabled selected value>
          Select an option
        </option>
        <?php // Options: ?>
        <?php if (!empty($options) && is_array($options)): ?>
          <?php foreach ($options as $option): ?>
            <option <?php echo (!empty($option['value']) && is_string($option['value'])) ? 'value="'.$option['value'].'"' : ''; ?>>
              <?php echo (!empty($option['label']) && is_string($option['label'])) ? $option['label'] : ''; ?>
            </option>
          <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>

    <?php // Error: ?>
    <div class="
      input__error
      m-top-2">
      <?php if (!empty($error) && is_string($error)): ?>
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
      <?php if (!empty($tooltip) && is_string($tooltip)): ?>
        <div class="measure-normal">
          <?php echo $tooltip; ?>
        </div>
      <?php endif; ?>
    </div>
  </label>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
