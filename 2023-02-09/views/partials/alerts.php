<?php if(isset($_GET['message'])) : ?>
    <div class="alert alert-danger">
        <?= $_GET['message'] ?>
    </div>
<?php endif; ?>