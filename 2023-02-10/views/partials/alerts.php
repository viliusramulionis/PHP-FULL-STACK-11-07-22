<?php if(isset($_GET['message'])) : ?>
    <div class="alert alert-<?= $_GET['status'] ?>">
        <?= $_GET['message'] ?>
    </div>
<?php endif; ?>