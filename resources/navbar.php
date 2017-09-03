<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/07/17
 * Time: 14:07
 */

function getNav(){

    $html = '
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse stickcontent">
    <span class="navbar-brand text-center">You\'re here to become lazy !</span>
</nav>';

    return $html;

}

function getFoot(){

    return '<footer class="footer footer-inverse bg-inverse text-muted">
    <div class="col-12">
        <div class="row">
            <div class="container">
                <div class="col-md-12 col-sm-12 text-center">
                    <span>© Copyrighted - This website was made to let people being lazy !</span>
                </div>
            </div>
        </div>
    </div>
</footer>';

}