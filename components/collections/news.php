<?php
  // Parameters:
  $news = $news ?? [];
?>

<?php $news_count = count($news); ?>
<?php foreach($news as $i => $news_item): ?>
  <?php $first_news_item = $i === 0; ?>
  <article class="
    <?php echo !$first_news_item ? 'm-top-4': '';?>">
    <?php
      $data = [
        'Key' => 'Value',
      ];
      snippet('cards/news', $data);
    ?>
  </article>
<?php endforeach; ?>
