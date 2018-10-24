<?php
  // Parameters:
  $list = $list ?? false;
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($list)) {
      throw new Exception('[Projects collection]: list is missing.');
    }
    if (!is_string($list)) {
      throw new Exception('[Projects collection]: list is not an array.');
    }
?>

  <div itemscope itemtype="http://schema.org/ItemList">
    <link itemprop="itemListOrder" href="http://schema.org/ItemListOrderUnordered" />
    <?php $count = count($list); ?>
    <?php foreach($list as $i => $item): ?>
      <?php $first_item = $i === 0; ?>
      <article
        class="<?php echo !$first_item ? 'm-top-4': '';?>"
        itemprop="itemListElement">
        <?php snippet('cards/project', $item); ?>
      </article>
    <?php endforeach; ?>
  </div>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
