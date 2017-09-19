<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/07/17
 * Time: 14:07
 */

function getNav(){
    $nav = '<form class="navbar-form navbar-right" action="http://localhost/dwpptt3/auth/" method="post">
                <div class="row">
                    <div class="col-sm-3">
                        <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email">
                    </div>
                    <div class="col-sm-3">
                        <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                    <div class="col-sm-3">
                        <a href="localhost/dwpptt3/auth/register.php">Pas encore inscrit ?</a>
                    </div>
                </div>
           </form>';
    if (isset($_COOKIE) && $_COOKIE != null){
        $nav = '<form class="navbar-form navbar-right" action="http://localhost/dwpptt3/auth/" method="post">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/profile/">Profil</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/sell/">Vendre</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/disconnect/">Déconnexion</a>
                      </li>
                    </ul>
                </form>';
    }
    $html = '
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse stickcontent">
      <span class="navbar-brand text-center">Bienvenue</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navLittleScreen" aria-controls="navLittleScreen" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navLittleScreen">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/market/">Market (WIP)</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/certificates/">Certificats</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://tt3y5d3gkz2x5l4d.onion/security/">Mot de passe aléatoire</a>
          </li>
        </ul>
      '.$nav.'
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
