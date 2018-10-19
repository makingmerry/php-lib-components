<?php
  // Parameters:
  $name = $name ?? 'Business name';
  $address = $address ?? [
    'street' => '',
    'locality' => '',
    'region' => '',
    'postal_code' => '',
  ];
  $tel = $tel ?? false;
  $email = $email ?? false;
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($name)) {
      throw new Exception('[Business card]: name is missing.');
    }
    if (!is_string($name)) {
      throw new Exception('[Business card]: name is not a string.');
    }

    if (empty($address)) {
      throw new Exception('[Business card]: address is missing.');
    }
    if (!is_string($address)) {
      throw new Exception('[Business card]: address is not a string.');
    }
?>

  <div class="card-business">
    <?php // Name: ?>
    <h1
      class="card-business__name"
      itemprop="name">
      <?php echo $name; ?>
    </h1>

    <?php // Address: ?>
    <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <?php // Line 1: street ?>
      <?php if (!empty($address['street']) && $is_string($address['street'])): ?>
        <div itemprop="streetAddress">
          <?php echo $address['street']; ?>
        </div>
      <?php endif; ?>

      <?php // Line 2: locality ?>
      <?php if (!empty($address['locality']) && $is_string($address['locality'])): ?>
        <div itemprop="addressLocality">
          <?php echo $address['locality']; ?>
        </div>
      <?php endif; ?>

      <?php // Line 3: region + postal ?>
      <div>
        <?php if (!empty($address['region']) && $is_string($address['region'])): ?>
          <span itemprop="addressRegion">
            <?php echo $address['region']; ?>
          </span>
        <?php endif; ?>

        <?php if (!empty($address['postal_code']) && $is_string($address['postal_code'])): ?>
          <span itemprop="postalCode">
            <?php echo $address['postal_code']; ?>
          </span>
        <?php endif; ?>
      </div>
    </div>

    <?php // Telephone: ?>
    <?php if (!empty($tel) && is_string($tel)): ?>
      <div>
        <a
          href="tel:<?php echo $tel; ?>"
          itemprop="telephone">
          <?php echo $tel; ?>
        </a>
      </div>
    <?php endif; ?>

    <?php // Email: ?>
    <?php if (!empty($email) && is_string($email)): ?>
      <div>
        <a
          href="mailto:<?php echo $email; ?>"
          itemprop="email">
          <?php echo $email; ?>
        </a>
      </div>
    <?php endif; ?>
  </div>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
