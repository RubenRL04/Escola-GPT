<?php

$_SERVER['REQUEST_URI'];
$_SERVER['REQUEST_URI'] = substr($_SERVER['REQUEST_URI'], 1);

?>
<nav aria-label="breadcrumb" class="mx-3">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
    <?php if ($_SERVER['REQUEST_URI'] != 'dashboard') : ?>
        <li class="breadcrumb-item active text-capitalize" aria-current="page"><?php echo $_SERVER['REQUEST_URI']; ?></li>
    <?php endif; ?>
  </ol>
</nav>
