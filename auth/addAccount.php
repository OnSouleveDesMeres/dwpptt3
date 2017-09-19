<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 18/09/17
 * Time: 23:27
 */

require_once '../database/Users.class.php';
require_once '../database/Tokens.class.php';
require_once '../database/key.function.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['email']) && $_POST['email'] != null && isset($_POST['password']) && $_POST['password'] != null){

    Users::insert($_POST['email'],$_POST['password']);
    $user = Users::createFromMailAndPassword($_POST['email'],$_POST['password']);

    if(count($user) != 0){

        $chaine = hash_hmac('sha256', $user[0]->getId().$user[0]->getMail().getKey(), getKey());
        Tokens::insert($user[0]->getId(), $chaine);
        setcookie('tt3',$chaine, 0, "/");

    }

}

header('Location: http://tt3y5d3gkz2x5l4d.onion/');