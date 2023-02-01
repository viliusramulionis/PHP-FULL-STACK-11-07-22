<?php 
    $navigacija = [
        'Home' => 'index.php',
        'Blogas' => '?page=blog'
    ];
    
?>
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <h2>PARDUOTUVĖ</h2>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <?php foreach($navigacija as $title => $link) : ?>
            <li><a href="<?= $link ?>" class="nav-link px-2 link-dark"><?= $title ?></a></li>
        <?php endforeach; ?>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2">Login</button>
        <button type="button" class="btn btn-primary">Sign-up</button>
      </div>
    </header>
</div>