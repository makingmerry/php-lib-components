<?php
  // Parameters:
  $routes = $routes ?? [];
?>

<?php
  // Try and ensure core route data is present before
  // excecuting snippet body.
  try {
    if (empty($routes)) {
      throw new Exception('[Pagination]: routes are missing.');
    }
    if (!is_array($routes)) {
      throw new Exception('[Pagination]: routes is not an array.');
    }

    $current_route = array_filter($routes, function ($route, $i) {
      return $route['current'] === true;
    }, ARRAY_FILTER_USE_BOTH);

    if (empty($current_route)) {
      throw new Exception('[Pagination]: Current route missing.');
    }

    $routes_count = count($routes);
    $current_i = key($current_route);
    $current_route_is_first = $current_i === 0;
    $current_route_is_last = $current_i === $routes_count - 1;
?>

  <div>
    <?php // Link-to-first: ?>
    <a
      <?php echo $current_route_is_first
        ? 'disabled'
        : 'href="'.$routes[0]['href'].'"'; ?>>
      First
    </a>

    <?php // Link-to-prev: ?>
    <?php
      $prev_route = !$current_route_is_first
        ? $routes[$current_i - 1]
        : false;
    ?>
    <a
      <?php echo $prev_route ? 'href="'.$prev_route['href'].'"' : ''; ?>
      <?php echo $prev_route ? 'rel="prev"' : ''; ?>
      <?php echo $current_route_is_first ? 'disabled' : ''; ?>>
      Prev
    </a>

    <?php // List: ?>
    <div>
      <ol>
        <?php foreach ($routes as $i => $route): ?>
          <?php $is_prev = $i === $current_i - 1; ?>
          <?php $is_current = $i === $current_i; ?>
          <?php $is_next = $i === $current_i + 1; ?>
          <li>
            <a
              <?php echo !$is_current && $route['href'] ? 'href="'.$route['href'].'"' : ''; ?>
              <?php echo $is_prev ? 'rel="prev"' : ''; ?>
              <?php echo $is_current ? 'disabled' : ''; ?>
              <?php echo $is_next ? 'rel="next"' : ''; ?>>
              <?php echo strval($i + 1); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>

    <?php // Link-to-next: ?>
    <?php
      $next_route = !$current_route_is_last
        ? $routes[$current_i + 1]
        : false;
    ?>
    <a
      <?php echo $next_route ? 'href="'.$next_route['href'].'"' : ''; ?>
      <?php echo $next_route ? 'rel="next"' : ''; ?>
      <?php echo $current_route_is_last ? 'disabled' : ''; ?>>
      Next
    </a>

    <?php // Link-to-last: ?>
    <a
      <?php echo $current_route_is_last
        ? 'disabled'
        : 'href="'.$routes[$routes_count - 1]['href'].'"'; ?>>
      First
    </a>
  </div>

<?php
  // End try.
  }

  catch (Exception $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n"; // !Single quotes does not work.
  }
?>
