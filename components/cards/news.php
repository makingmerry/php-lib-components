<?php
  // Parameters:
  $href = $href ?? '';
  $headline = $headline ?? '';
  $thumb = $thumb ?? false;
  $date_published = $date_published ?? false;
  $desc = $desc ?? false;
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($href)) {
      throw new Exception('[News card]: href is missing.');
    }
    if (!is_string($href)) {
      throw new Exception('[News card]: href is not a string.');
    }

    if (empty($headline)) {
      throw new Exception('[News card]: headline is missing.');
    }
    if (!is_string($headline)) {
      throw new Exception('[News card]: headline is not a string.');
    }
?>

  <div itemscope itemtype="http://schema.org/NewsArticle">
    <a href="<?php echo $href; ?>" itemprop="url">
      <div>
        <?php // Thumbnail: ?>
        <?php if (!empty($thumb) && is_array($thumb)): ?>
          <?php
            $data = $thumb;
            snippet('media/image', $data);
          ?>
        <?php endif; ?>

        <?php // Headline: ?>
        <h1 itemprop="headline">
          <?php echo $headline; ?>
        </h1>

        <?php // Published date: ?>
        <?php if (!empty($date_published) && is_string($date_published)): ?>
          <time
            datetime="<?php echo $date_published; ?>"
            itemprop="datePublished">
            <?php echo $date_published; ?>
          </time>
        <?php endif; ?>

        <?php // Description: ?>
        <?php if (!empty($desc) && is_string($desc)): ?>
          <div itemprop="description">
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
