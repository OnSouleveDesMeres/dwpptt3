<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 19/09/17
 * Time: 21:01
 */

require_once '../database/Articles.class.php';
require_once '../database/Tokens.class.php';

if (isset($_POST) && !is_null($_POST)){

    if(isset($_POST['title']) && !is_null($_POST['title']) && isset($_POST['description']) && !is_null($_POST['description'])){

        $title = mb_ereg_replace("[']+", " ", $_POST['title']);
        $description = mb_ereg_replace("[']+", " ", $_POST['description']);

        $id = Tokens::getIdFromToken($_COOKIE['tt3']);

        Articles::insert($title, $description, $id[0]->getId());

        header('Location: ../market/');

    }

}
else{
    header('Location: ../');
}