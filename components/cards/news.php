<?php
  // Parameters:
  $href = $href ?? '';
  $title = $title ?? 'News title';
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

    if (empty($title)) {
      throw new Exception('[News card]: title is missing.');
    }
    if (!is_string($title)) {
      throw new Exception('[News card]: title is not a string.');
    }
?>

  <div
    class="card-news"
    itemscope itemtype="http://schema.org/NewsArticle">
    <a
      href="<?php echo $href; ?>"
      itemprop="url">
      <div itemprop="articleBody">
        <?php // Thumbnail: ?>
        <?php if (!empty($thumb) && is_array($thumb)): ?>
          <div
            class="card-news__thumb"
            itemscope itemtype="http://schema.org/ImageObject">
            <?php
              $data = $thumb;
              snippet('media/image', $data);
            ?>
          </div>
        <?php endif; ?>

        <?php // Title: ?>
        <h1
          class="card-news__title"
          itemprop="headline">
          <?php echo $title; ?>
        </h1>

        <?php // Published date: ?>
        <?php if (!empty($date_published) && is_string($date_published)): ?>
          <time
            class="card-news__date-published"
            datetime="<?php echo $date_published; ?>"
            itemprop="datePublished">
            <?php echo $date_published; ?>
          </time>
        <?php endif; ?>

        <?php // Description: ?>
        <?php if (!empty($desc) && is_string($desc)): ?>
          <div
            class="card-news__desc"
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
