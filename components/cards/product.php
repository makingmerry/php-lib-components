<?php
  // Parameters:
  $href = $href ?? '';
  $buy_href = $buy_href ?? $href;
  $title = $title ?? 'Product name';
  $thumb = $thumb ?? false;
  $desc = $desc ?? false;
  $price = $price ?? false;
  $currency = $currency ?? 'SGD';
  $available = $available ?? false;
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($href)) {
      throw new Exception('[Product card]: href is missing.');
    }
    if (!is_string($href)) {
      throw new Exception('[Product card]: href is not a string.');
    }

    if (empty($title)) {
      throw new Exception('[Product card]: title is missing.');
    }
    if (!is_string($title)) {
      throw new Exception('[Product card]: title is not a string.');
    }
?>

  <div
    class="card-product"
    itemscope itemtype="http://schema.org/Product">
    <a
      href="<?php echo $href; ?>"
      itemprop="url">
      <?php // Thumbnail: ?>
      <?php if (!empty($thumb) && is_array($thumb)): ?>
        <div
          class="card-product__thumb"
          itemscope itemtype="http://schema.org/ImageObject">
          <?php
            $data = $thumb;
            snippet('media/image', $data);
          ?>
        </div>
      <?php endif; ?>

      <?php // Title: ?>
      <h1
        class="card-product__title"
        itemprop="name">
        <?php echo $title; ?>
      </h1>

      <?php // Description: ?>
      <?php if (!empty($desc) && is_string($desc)): ?>
        <div
          class="card-product__desc"
          itemprop="description">
          <?php echo $desc; ?>
        </div>
      <?php endif; ?>

      <?php // Price: ?>
      <?php if (!empty($price) && is_string($price)): ?>
        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
          <div>
            <?php // Currency: ?>
            <?php if (!empty($currency) && is_string($currency)): ?>
              <span
                class="card-product__currency"
                itemprop="priceCurrency" content="<?php echo $currency; ?>">
                $
              </span>
            <?php else: ?>
              <span class="card-product__currency">
                $
              </span>
            <?php endif; ?>

            <?php // Value: ?>
            <span
              class="card-product__price"
              itemprop="price"
              content="<?php echo $price; ?>">
              <?php echo $price; ?>
            </span>
          </div>

          <?php // Availability: ?>
          <div class="card-product__availability">
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
