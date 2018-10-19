<?php
  // Parameters:
  $core = $core ?? [];
  // - $title: String
  // - $url: String<URL>
  // - $desc: String
  // - $img_src: String<URL>

  $og = $og ?? [];
  // - $site_name: String
  // - $desc: String
  // - $type: String
  // - $img_src: <URL>String

  $twitter = $twitter ?? [];
  // - $card: String
  // - $site: String
  // - $desc: String
  // - $creator: String
  // - $img_src: <URL>String

  $article = $article ?? [];
  // - $published_time: <datetime>String
  // - $modified_time: <datetime>String
  // - $section: String
  // - $tag: String
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($core)) {
      throw new Exception('[SEO]: Core page meta data is missing.');
    }
    if (!is_array($core)) {
      throw new Exception('[SEO]: Core page meta data is not an array.');
    }

    if (empty($core['title'])) {
      throw new Exception('[SEO]: Page meta title is missing.');
    }
    if (!is_string($core['title'])) {
      throw new Exception('[SEO]: Page meta title is not a string.');
    }

    if (empty($core['url'])) {
      throw new Exception('[SEO]: Page meta URL is missing.');
    }
    if (!is_string($core['url'])) {
      throw new Exception('[SEO]: Page meta URL is not a string.');
    }

    if (empty($core['desc'])) {
      throw new Exception('[SEO]: Page meta description is missing.');
    }
    if (!is_string($core['desc'])) {
      throw new Exception('[SEO]: Page meta description is not a string.');
    }
?>

  <?php // Core meta tags: ?>
  <title><?php echo $core['title']; ?></title>
  <link rel="canonical" href="<?php echo $core['url']; ?>" />
  <meta name="description" content="<?php echo $core['desc']; ?>" />
  <?php if (!empty($core['img_src'])): ?>
    <meta name="image" content="<?php echo $core['img_src']; ?>" />
  <?php endif; ?>

  <?php // Facebook OG tags: ?>
  <?php if (is_array($og) && !empty($og)): ?>
    <meta property="og:title" content="<?php echo $core['title']; ?>" />
    <meta property="og:url" content="<?php echo $core['url']; ?>" />
    <?php if (!empty($og['site_name'])): ?>
      <meta property="og:site_name" content="<?php echo $og['site_name']; ?>" />
    <?php endif; ?>
    <?php if (!empty($og['desc'])): ?>
      <meta property="og:description" content="<?php echo $og['desc']; ?>" />
    <?php endif; ?>
    <?php if (!empty($og['type'])): ?>
      <meta property="og:type" content="<?php echo $og['type']; ?>" />
    <?php endif; ?>
    <?php if (!empty($og['img_src'])): ?>
      <meta property="og:image" content="<?php echo $og['img_src']; ?>" />
    <?php endif; ?>
  <?php endif; ?>

  <?php // Twitter tags: ?>
  <?php if (is_array($twitter) && !empty($twitter)): ?>
    <meta property="twitter:title" content="<?php echo $core['title']; ?>" />
    <?php if (!empty($twitter['card'])): ?>
      <meta property="twitter:card" content="<?php echo $twitter['card']; ?>" />
    <?php endif; ?>
    <?php if (!empty($twitter['site'])): ?>
      <meta property="twitter:site" content="<?php echo $twitter['site']; ?>" />
    <?php endif; ?>
    <?php if (!empty($twitter['desc'])): ?>
      <meta property="twitter:description" content="<?php echo $twitter['desc']; ?>" />
    <?php endif; ?>
    <?php if (!empty($twitter['creator'])): ?>
      <meta property="twitter:creator" content="<?php echo $twitter['creator']; ?>" />
    <?php endif; ?>
    <?php if (!empty($twitter['img_src'])): ?>
      <meta property="twitter:image:src" content="<?php echo $twitter['img_src']; ?>" />
    <?php endif; ?>
  <?php endif; ?>

  <?php // Article-specific content tags: ?>
  <?php if (is_array($article) && !empty($article)): ?>
    <?php if (!empty($article['published_time'])): ?>
      <meta property="article:published_time" content="<?php echo $article['published_time']; ?>" />
    <?php endif; ?>
    <?php if (!empty($article['modified_time'])): ?>
      <meta property="article:modified_time" content="<?php echo $article['modified_time']; ?>" />
    <?php endif; ?>
    <?php if (!empty($article['section'])): ?>
      <meta property="article:section" content="<?php echo $article['section']; ?>" />
    <?php endif; ?>
    <?php if (!empty($article['tag'])): ?>
      <meta property="article:tag" content="<?php echo $article['tag']; ?>" />
    <?php endif; ?>
  <?php endif; ?>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
