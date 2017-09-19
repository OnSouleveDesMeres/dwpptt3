<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 18/09/17
 * Time: 21:37
 */

require_once '../database/Users.class.php';
require_once '../resources/webpage.class.php';
require_once '../resources/navbar.php';

if($_COOKIE['tt3'] != null && isset($_COOKIE['tt3'])){

    header('Location: http://tt3y5d3gkz2x5l4d.onion');

}
else{

    $html = new WebPage('index');

    $html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css');
    $html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/index.css');
    $html->appendCssUrl('../font-awesome-4.7.0/css/font-awesome.css');

    $html->appendContent(getNav());

    $page =<<<HTML

HTML;

    $html->appendContent($page);


    $html->appendContent('
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Inscription</h1>
            </div>
            <div style="height:100px;" ></div>
            <div class="container">
                <form method="post" action="addAccount.php">
                <div class="row">
                    <div class="form-group col-sm-12 col-md-5">
                        <label for="exampleInputEmail1">Mail</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                      </div>
                      <div class="form-group col-sm-12 col-md-5 offset-md-2">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                      </div>
                  </div>
                  
                  <div style="height: 50px;"></div>
                    <div class="col-md-4 offset-md-4">
                        <button class="g-recaptcha btn btn-info col-sm-8 offset-sm-2" data-sitekey="6LfHTTEUAAAAABLqEVqSl_1oUwUd4Q6AYsQ68UfN" data-callback="YourOnSubmitFn">
                            Valider votre inscription
                        </button>
                    </div>
                </form>
            <div style="height:50px;" ></div>
          </div>
        </div>
    </div>
</main>');

    $html->appendContent(getFoot());

    $html->appendContent('
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.0.0-alpha.6-dist/js/stick.js"></script>
<script>$(".stickcontent").stick_in_parent();</script>');

    echo $html->toHTML();

}