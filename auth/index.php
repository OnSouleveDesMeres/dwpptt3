<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 18/09/17
 * Time: 19:22
 */

require_once '../database/Users.class.php';
require_once '../database/Tokens.class.php';
require_once '../database/key.function.php';

if(isset($_POST['email']) && $_POST['email'] != null && isset($_POST['password']) && $_POST['password'] != null){

    $user = Users::createFromMailAndPassword($_POST['email'],$_POST['password']);

    if(count($user) != 0){

        $chaine = hash_hmac('sha256', $user[0]->getId().$user[0]->getMail().getKey(), getKey());
        Tokens::insert($user[0]->getId(), $chaine);
        setcookie('tt3',$chaine);

    }

}

header('Location: http://tt3y5d3gkz2x5l4d.onion/');