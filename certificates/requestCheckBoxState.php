<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 10/09/17
 * Time: 21:20
 */

function getState($valuePost, $valueState){

    $res = false;

    if($valuePost == $valueState){
        $res = true;
    }

    return $res;

}