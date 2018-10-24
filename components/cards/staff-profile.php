<?php
  // Parameters:
  $name = $name ?? '';
  $job_title = $role ?? false;
  $desc = $desc ?? false;
  $email = $email ?? false;
?>

<?php
  // Try and ensure core data is present before
  // excecuting snippet body.
  try {
    if (empty($name)) {
      throw new Exception('[Staff profile card]: name is missing.');
    }
    if (!is_string($name)) {
      throw new Exception('[Staff profile card]: name is not a string.');
    }
?>

  <div
    class="card-staff-profile"
    itemscope itemtype="http://schema.org/Person">
    <?php // Thumbnail: ?>
    <?php if (!empty($thumb) && is_array($thumb)): ?>
      <div
        class="card-staff-profile__thumb"
        itemscope itemtype="http://schema.org/ImageObject">
        <?php
          $data = $thumb;
          snippet('media/image', $data);
        ?>
      </div>
    <?php endif; ?>

    <?php // Name: ?>
    <h1
      class="card-staff-profile__name"
      itemprop="name">
      <?php echo $name; ?>
    </h1>

    <?php // Job title/role: ?>
    <?php if (!empty($job_title) && is_string($job_title)): ?>
      <div
        class="card-staff-profile__job-title"
        itemprop="jobTitle">
        <?php echo $job_title; ?>
      </div>
    <?php endif; ?>

    <?php // Description: ?>
    <?php if (!empty($desc) && is_string($desc)): ?>
      <div
        class="card-staff-profile__desc"
        itemprop="description">
        <?php echo $desc; ?>
      </div>
    <?php endif; ?>

    <?php // Email link: ?>
    <?php if (!empty($email) && is_string($email)): ?>
      <div class="card-staff-profile__email">
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
