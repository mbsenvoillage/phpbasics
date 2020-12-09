<?php

require '../app/Autoloader.php';


App\Autoloader::autoload_register();

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
};

// Instantiate database

//$db = new App\Database('blog');


/*
 * This function will turn output buffering on. While output buffering is active no output is sent from the script (other than headers),
 * instead the output is stored in an internal buffer.
 * The contents of this internal buffer may be copied into a string variable
 */
ob_start();
if($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'article') {
    require '../pages/single.php';
} elseif ($p === 'categorie') {
    require '../pages/categorie.php';
}


$content = ob_get_clean();

require '../pages/templates/default.php';