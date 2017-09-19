<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 19/09/17
 * Time: 17:45
 */

require_once '../database/Tokens.class.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_COOKIE['tt3'] != null && isset($_COOKIE['tt3'])){
    Tokens::deleteToken($_COOKIE['tt3']);

    setcookie("tt3", "", time()-99999, "/");
}

header('Location: http://tt3y5d3gkz2x5l4d.onion');
