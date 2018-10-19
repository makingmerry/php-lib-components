<?php
  // Parameters:
  $href = $href ?? '';
  $title = $title ?? 'Event title';
  $date_start = $date_start ?? '';
  $time_start = $time_start ?? '';
  $price = $price ?? false;
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($href)) {
      throw new Exception('[Event card]: href is missing.');
    }
    if (!is_string($href)) {
      throw new Exception('[Event card]: href is not a string.');
    }

    if (empty($title)) {
      throw new Exception('[Event card]: title is missing.');
    }
    if (!is_string($title)) {
      throw new Exception('[Event card]: title is not a string.');
    }

    if (empty($date_start)) {
      throw new Exception('[Event card]: start date is missing.');
    }
    if (!is_string($date_start)) {
      throw new Exception('[Event card]: start date is not a string.');
    }

    if (empty($time_start)) {
      throw new Exception('[Event card]: start time is missing.');
    }
    if (!is_string($time_start)) {
      throw new Exception('[Event card]: start time is not a string.');
    }
?>

  <div
    class="card-event"
    itemscope itemtype="http://schema.org/Event">
    <a
      href="<?php echo $href; ?>"
      itemprop="url">
      <div>
        <?php // Title: ?>
        <h1
          class="card-event__title"
          itemprop="name">
          <?php echo $title; ?>
        </h1>

        <?php // Start date: ?>
        <?php if (!empty($date_start) && is_string($date_start)): ?>
          <time
            class="card-event__date-start"
            datetime="<?php echo $date_start; ?>"
            itemprop="startDate"
            content="<?php echo $date_start; ?>">
            <?php echo $date_start; ?>
          </time>
        <?php endif; ?>

        <?php // Start time: ?>
        <?php if (!empty($time_start) && is_string($time_start)): ?>
          <time
            class="card-event__time-start"
            datetime="<?php echo $time_start; ?>"
            itemprop="startDate"
            content="<?php echo $time_start; ?>">
            <?php echo $time_start; ?>
          </time>
        <?php endif; ?>

        <?php // Price: ?>
        <?php if (!empty($price) && is_string($price)): ?>
          <div
            class="card-event__price"
            itemprop="price"
            content="<?php echo $price; ?>">
            $<?php echo $price; ?>
          </div>
        <?php endif; ?>
      </div>
    </a>
  </div>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
