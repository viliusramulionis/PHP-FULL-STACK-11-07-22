<?php
//https://www.php.net/manual/en/function.session-start
session_start();

//Sesijos informacijos pašalinimui
//unset($_SESSION['vardas']);

//Sesijos sunaikinimas serveryje
//https://www.php.net/manual/en/function.session-destroy.php
//session_destroy();
?>

<?php if(isset($_SESSION['vardas'])) : ?>
    <div>Sveiki, <?php echo $_SESSION['vardas']; ?></div>
<?php else: ?>
    <div>Sveiki, Anonimas</div>
<?php endif; ?>