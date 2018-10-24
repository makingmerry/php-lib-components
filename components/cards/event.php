<?php
  // Parameters:
  $href = $href ?? '';
  $buy_href = $buy_href ?? $href;
  $title = $title ?? 'Event title';
  $date_start = $date_start ?? '';
  $time_start = $time_start ?? '';
  $price = $price ?? false;
  $currency = $currency ?? 'SGD';
  $available = $available ?? false;
  // $address = $address ?? [
  //   'street' => '',
  //   'locality' => '',
  //   'region' => '',
  //   'postal_code' => '',
  // ]; ?
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
      <div itemprop="articleBody">
        <?php // Thumbnail: ?>
        <?php if (!empty($thumb) && is_array($thumb)): ?>
          <div
            class="card-event__thumb"
            itemscope itemtype="http://schema.org/ImageObject">
            <?php
              $data = $thumb;
              snippet('media/image', $data);
            ?>
          </div>
        <?php endif; ?>

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
          <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <div>
              <?php // Currency: ?>
              <?php if (!empty($currency) && is_string($currency)): ?>
                <span itemprop="priceCurrency" content="<?php echo $currency; ?>">
                  $
                </span>
              <?php else: ?>
                <span>
                  $
                </span>
              <?php endif; ?>

              <?php // Value: ?>
              <span
                class="card-event__price"
                itemprop="price"
                content="<?php echo $price; ?>">
                <?php echo $price; ?>
              </span>
            </div>

            <?php // Availability: ?>
            <div>
              <?php if (is_bool($available)): ?>
                <?php if ($available): ?>
                  <link itemprop="availability" href="http://schema.org/InStock" />
                  In stock
                <?php else: ?>
                  <link itemprop="availability" href="http://schema.org/OutOfStock" />
                  Out of stock
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </a>

    <?php // Buy/view options: ?>
    <div class="d-flex align-ct-center justify-ct-space-btw">
      <?php // View 'marker': ?>
      <div>
        View
      </div>

      <?php // Buy: ?>
      <?php if (!empty($buy_href) && is_string($buy_href)): ?>
      <div>
        <?php
          $data = [
            'href' => $buy_href,
            'label' => 'Buy',
          ];
          snippet('links/button-primary', $data);
        ?>
      </div>
    </div>
  </div>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
