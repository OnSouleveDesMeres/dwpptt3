<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 04/09/17
 * Time: 00:42
 */

require_once '../resources/webpage.class.php';
require_once '../resources/navbar.php';

$html = new WebPage('index');

$html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css');
$html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/index.css');
$html->appendCssUrl('../font-awesome-4.7.0/css/font-awesome.css');

$html->appendContent(getNav());

$capsletters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$minletters = "abcdefghijklmnopqrstuvwxyz";
$numbers = "1234567890";
$symbols = "&-_()^%*";
$pass = "";
$lengthLetters = strlen($symbols);

for($i = 0; $i < 63; $i++){

    $rndNumber = rand(0,3);

    if($rndNumber == 0){
        $pass .= $capsletters[rand(0, 25)];
    }
    elseif ($rndNumber == 1){
        $pass .= $minletters[rand(0, 25)];
    }
    elseif ($rndNumber == 2){
        $pass .= $numbers[rand(0, 9)];
    }
    else{
        $pass .= $symbols[rand(0, $lengthLetters-1)];
    }

}

$page =<<<HTML

HTML;

$html->appendContent($page);

$html->appendContent("<main>
<div class='container'>
    <div class='col-xs-12 text-center'><h1>Your random generated password is :</h1></div>  
        <div class='row'>
    
            <div class='col-sm-10'><textarea class='no-render' id='textCopied'>{$pass}</textarea></div>
            <div class='col-sm-1'><button type='button' class='btn btn-info' id='copyButton'>Copy</button></div>
    
        </div>                
    </div>
    
</div></main>");

$html->appendContent(getFoot());


$html->appendContent('
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.0.0-alpha.6-dist/js/stick.js"></script>
<script>$(".stickcontent").stick_in_parent();</script>
<script>document.querySelector("#copyButton").onclick = function() {
  console.log($("#textCopied").select());
  document.execCommand("copy");
};</script>');

echo $html->toHTML();