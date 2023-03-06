<?php

require_once 'vendor/autoload.php';

// echo \Vilius\PirmojiAplikacija\Hello::say();
// echo '<br />';
// echo \Vilius\PirmojiAplikacija\Folderis\Goodbye::say();

$climate = new \League\CLImate\CLImate;

$climate->red('Whoa now this text is red.');
$climate->blue('Whoa now this text is blue.');

for($i = 0; $i < 10; $i++) {
    $climate->green('Žalia');
}
