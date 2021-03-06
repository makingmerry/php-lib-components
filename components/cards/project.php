<?php
  // Parameters:
  $href = $href ?? '';
  $title = $title ?? 'Project title';
  $thumb = $thumb ?? false;
  $desc = $desc ?? false;
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($href)) {
      throw new Exception('[Project card]: href is missing.');
    }
    if (!is_string($href)) {
      throw new Exception('[Project card]: href is not a string.');
    }

    if (empty($title)) {
      throw new Exception('[Project card]: title is missing.');
    }
    if (!is_string($title)) {
      throw new Exception('[Project card]: title is not a string.');
    }
?>

  <div
    class="card-project"
    itemscope itemtype="http://schema.org/CreativeWork">
    <a
      href="<?php echo $href; ?>"
      itemprop="url">
      <div>
        <?php // Thumbnail: ?>
        <?php if (!empty($thumb) && is_array($thumb)): ?>
          <div
            class="card-project__thumb"
            itemscope itemtype="http://schema.org/ImageObject">
            <?php
              $data = $thumb;
              snippet('media/image', $data);
            ?>
          </div>
        <?php endif; ?>

        <?php // Title: ?>
        <h1
          class="card-project__title"
          itemprop="name">
          <?php echo $title; ?>
        </h1>

        <?php // Description: ?>
        <?php if (!empty($desc) && is_string($desc)): ?>
          <div
            class="card-project__desc"
            itemprop="description">
            <?php echo $desc; ?>
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
