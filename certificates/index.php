<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 06/07/17
 * Time: 15:21
 */

require_once '../resources/webpage.class.php';
require_once '../resources/navbar.php';

$html = new WebPage('index');

$html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css');
$html->appendCssUrl('../bootstrap-4.0.0-alpha.6-dist/css/index.css');
$html->appendCssUrl('../font-awesome-4.7.0/css/font-awesome.css');

$html->appendContent(getNav());

$page =<<<HTML

HTML;

$html->appendContent($page);

$html->appendContent('<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1>Remplissez le formulaire puis cliquez sur Submit pour générer le certificat au format PDF</h1>
        </div>
        <div style="height:100px;" ></div>
        <div class="container">
            <form method="post" action="generator.php">
            <div class="row">
                <div class="form-group col-sm-12 col-md-5">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" name="name" pattern="[A-z]+" required>
                  </div>
                  <div class="form-group col-sm-12 col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Prénom</label>
                    <input type="text" class="form-control" placeholder="Prénom" name="fname" pattern="[A-z]+" required>
                  </div>
                  <div class="form-group col-sm-12 col-md-5">
                    <label for="exampleInputPassword1">Durée</label>
                    <input type="text" class="form-control" placeholder="Durée (en jours)" name="period" pattern="[0-9]+" required>
                  </div>
                  <div class="form-group col-sm-12 col-md-5 offset-md-2">
                    <label for="exampleInputPassword1" id="choice">Maladie</label>
                    <input type="text" id="choice2" class="form-control" placeholder="Votre maladie" name="maladie" required>
                  </div>
                  <div class="form-group col-sm-12 col-md-5">
                    <label for="exampleInputPassword1">Sexe</label>
                    <select class="form-control" name="sex" required>
                        <option value="Mr">
                            Mr.
                        </option>
                        <option value="Mme">
                            Mme.
                        </option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12 col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Type de certificat</label>
                    <select class="form-control" id="type" name="type" onchange="modifyText()" required>
                        <option value="work">
                            Travail
                        </option>
                        <option value="school">
                            Ecole
                        </option>
                        <option value="sport">
                            Sport (dispense)
                        </option>
                        <option value="swim">
                            Piscine
                        </option>
                        <option value="validationSport">
                            Sport (participation)
                        </option>
                    </select>
                  </div>
          
              </div>
            <div class="row" id="replace">
                <div class="col-sm-12 text-center dropdown-divider">
                </div>
                <div class="col-sm-12 text-center">
                    <span>Informations sur votre médecin le plus proche</span>
                </div>
                <div style="height:50px;" ></div>
                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Rue de votre médecin</label>
                    <input type="text" class="form-control replace" placeholder="Rue de votre médecin" name="mstreet">
                  </div>
                  <div class="form-group col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Numéro de rue du cabinet</label>
                    <input type="text" class="form-control replace" placeholder="Numéro de rue du cabinet" name="mnum" pattern="[0-9]+">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="exampleInputPassword1">Code postal</label>
                    <input type="text" class="form-control replace" placeholder="Code postal" name="mcp" pattern="[0-9]+">
                  </div>
                  <div class="form-group col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Ville du cabinet</label>
                    <input type="text" class="form-control replace" placeholder="Ville du cabinet" name="mcity">
                  </div>
          
              </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
        <div style="height:50px;" ></div>
        <div class="container">
            <div class="col-sm-12 col-lg-8 offset-lg-2 donations">
                <div class=" col-sm-12 text-center"><h3>Un don ? En bitcoin uniquement</h3></div>
                <div class="dropdown-divider"></div>
                <div class="col-sm-12 text-center">
                    <textarea class="no-render" readonly>32DnzSSxaE2oAyZKWdPgt5SWvnyYGn2WiD</textarea>
                </div>
            </div>
        </div>
        <div style="height:50px;" ></div>
      </div>
    </div>
</div>');

$html->appendContent(getFoot());

$html->appendContent('
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="../bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.0.0-alpha.6-dist/js/stick.js"></script>
<script>$(".stickcontent").stick_in_parent();</script>
<script>function modifyText() {
    
    var type = document.getElementById("type");
    
    if (type.selectedIndex == 4){
        document.getElementById("choice").innerText = "Sport à pratiquer"
        document.getElementById("choice2").setAttribute("placeholder", "Sport à pratiquer");
    }
    else {
        document.getElementById("choice").innerText = "Maladie"
        document.getElementById("choice2").setAttribute("placeholder", "Maladie");
    }
    
  
}</script>');

echo $html->toHTML();