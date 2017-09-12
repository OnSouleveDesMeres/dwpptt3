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
      <span class="navbar-brand text-center">You\'re here to become lazy man</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navLittleScreen" aria-controls="navLittleScreen" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navLittleScreen">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/shop/">Market (WIP)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/certificates/">School</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/security/">Password generator</a>
          </li>
        </ul>
      </div>
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
