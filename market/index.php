<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 12/09/17
 * Time: 08:42
 */

require_once '../resources/webpage.class.php';
require_once '../resources/navbar.php';
require_once '../database/Articles.class.php';
require_once '../database/Users.class.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$html = new WebPage('index');

$html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css');
$html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/index.css');
$html->appendCssUrl('../font-awesome-4.7.0/css/font-awesome.css');

$html->appendContent(getNav());

$listCards = '';

$listArticles = Articles::getAll();

if(count($listArticles) != 0) {
    foreach ($listArticles as $listArticle){
        $user = Users::createFromId($listArticle->getIdUser());
        $listCards .= '
<div class="col-sm-12 col-md-6 col-lg-4 cardarticle">
    <div class="row">
        <div class="col-sm-12 text-center newarticle">
            <h4>Nouvel article</h4>
        </div>
        <div class="col-sm-12 contentinformations">
            <div class="titlecard">
                <p class="grow">'.$listArticle->getName().'<br/>'.$listArticle->getContent().'</p>
            </div>
        </div>
        <div class="col-sm-12 mailcard text-center">
            <i class="fa fa-envelope-o"></i> <span class="bluetext">'.$user[0]->getMail().'</span>
        </div>
    </div>
</div>';

    }
}
else{
    $listCards = "<div class='col-sm-12 col-md-10 offset-md-1'><div class='col-sm-12'><div class='alert alert-info text-center'><h3>Erreur, aucun article n'a pu être trouvé, veuillez réessayer dans quelques minutes</h3></div></div></div>";
}

$page =<<<HTML

HTML;

$html->appendContent($page);

$html->appendContent('
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h1>Achetez et vendez ce que vous souhaitez</h1>
            </div>
            <div class="col-xs-12 col-md-6 offset-md-3" id="filter">
                <input type="text" class="col-sm-12" placeholder="Cherchez ce que vous voulez" id="searchbar">
            </div>
            <div class="col-sm-12">
                <div class="dropdown-divider"></div>
            </div>
            
            <div class="container">
                <div class="container">
                    <div id="groupcards">
                        <div class="row">
                            '.$listCards.'
                        </div>
                    </div>
                </div>
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
<script src="../bootstrap-4.0.0-alpha.6-dist/js/search.js"></script>
<script>$(".stickcontent").stick_in_parent();</script>');

echo $html->toHTML();