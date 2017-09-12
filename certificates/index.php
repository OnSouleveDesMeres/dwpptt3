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
        <div class="col-xs-12 text-center">
            <h1>Fill this form then you\'ll be able to generate your medical certificate to pdf format</h1>
        </div>
        <div style="height:100px;" ></div>
        <div class="container">
            <form method="post" action="generator.php">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" placeholder="Nom" name="name" pattern="[A-Za-z]*" required>
                  </div>
                  <div class="form-group col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Prénom</label>
                    <input type="text" class="form-control" placeholder="Prénom" name="fname" pattern="[A-Za-z]*" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="exampleInputPassword1">Durée</label>
                    <input type="text" class="form-control" placeholder="Durée (en jours, maximum 9 jours)" name="period" pattern="[1-9]" required>
                  </div>
                  <div class="form-group col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Votre maladie</label>
                    <input type="text" class="form-control" placeholder="Votre maladie" name="maladie" required>
                  </div>
                  <div class="form-group col-md-5">
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
                  <div class="form-group col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Type de certificat</label>
                    <select class="form-control" name="type" required>
                        <option value="work">
                            Travail
                        </option>
                        <option value="school">
                            Ecole
                        </option>
                        <option value="sport">
                            Sport
                        </option>
                        <option value="swim">
                            Piscine
                        </option>
                    </select>
                  </div>
          
              </div>
            <div class="row">
                <div class="col-sm-12 text-center dropdown-divider">
                    <span>Informations about nearest medical center</span>
                </div>
                <div class="col-sm-12 text-center">
                    <span>Informations sur votre médecin le plus proche</span>
                </div>
                <div style="height:50px;" ></div>
                <div class="form-group col-md-5">
                    <label for="exampleInputEmail1">Rue de votre médecin</label>
                    <input type="text" class="form-control" placeholder="Rue de votre médecin" name="mstreet" required>
                  </div>
                  <div class="form-group col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Numéro de rue du cabinet</label>
                    <input type="text" class="form-control" placeholder="Numéro de rue du cabinet" name="mnum" pattern="[0-9]*" required>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="exampleInputPassword1">Code postal</label>
                    <input type="text" class="form-control" placeholder="Code postal" name="mcp" pattern="[0-9]*" required>
                  </div>
                  <div class="form-group col-md-5 offset-md-2">
                    <label for="exampleInputPassword1">Ville du cabinet</label>
                    <input type="text" class="form-control" placeholder="Ville du cabinet" name="mcity" required>
                  </div>
          
              </div>
          
            <div style="height:50px;" ></div>
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
        </form>
        <div style="height:50px;" ></div>
        <div class="container">
            <div class="col-lg-8 offset-lg-2 donations">
                <div class="col-xs-12 text-center"><h3>Want to donate ? Copy this address</h3></div>
                <div class="dropdown-divider"></div>
                <div class="col-xs-12 text-center"><h3 class="no-render">32DnzSSxaE2oAyZKWdPgt5SWvnyYGn2WiD</h3></div>
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
<script src="bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
<script src="bootstrap-4.0.0-alpha.6-dist/js/stick.js"></script>
<script>$(".stickcontent").stick_in_parent();</script>');

echo $html->toHTML();