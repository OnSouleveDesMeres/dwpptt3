<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/08/17
 * Time: 22:15
 */

require_once '../vendor/autoload.php';
require_once 'requestCheckBoxState.php';
require_once('../vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');
require_once 'imagePrintInfos.php';

if(isset($_POST) && !is_null($_POST)){

    $maladie = "............";
    $sport = "............";
    $type = $_POST['type'];
    if ($type == 'school'){
        $maladie = $_POST['maladie'];
    }
    if ($type == 'validationSport'){
        $sport = $_POST['maladie'];
    }
    if (isset($_POST['period']) && !is_null($_POST['period']) && isset($_POST['name']) && !is_null($_POST['name']) &&
        isset($_POST['fname']) && !is_null($_POST['fname']) && isset($_POST['type']) && !is_null($_POST['type'])){

        $period = $_POST['period'];
        $name = $_POST['name'];
        $firstname = $_POST['fname'];
        $day = date('d/m/Y');

        $medname = 'Dr. DUCHAUSSOY Béatrice';
        $code = $_POST['mcp'].' '.$_POST['mcity'];
        $place = $_POST['mnum'].', '.$_POST['mstreet'];
        $phone = 'N° Ordre : 015 215 632';

        $sign = rand(0,7);

        $imgSign = "../resources/img/sign{$sign}.png";

        $listChoice = array(' présente un état de santé nécessitant un arrêt de travail de ', " ne pourra fréquenter l'école, le collège, le lycée, pour cause de <strong>{$maladie}</strong> pendant ", " doit être dispensé d'éducation physique et sportive pendant ", ' est exempté de piscine pendant ', "présente ce jour, une absence de signes clinique apparent contre-indiquant la pratique du sport suivant : <strong>{$sport}</strong>");
        $typeChoice = array('work', 'school', 'sport', 'swim', 'validationSport');

        generateImage($medname, $place, $code, $phone, true);

        $imgPrint = "../img/".$medname.".png";

        $checkBoxesGenerated = '<table>';

        for($i = 0; $i < count($listChoice)-1; $i++) {
            if (getState($type, $typeChoice[$i])) {
                $checkBoxesGenerated .= '<tr><td><label> &nbsp; &nbsp; &nbsp; ' . $listChoice[$i] . " <strong>" . $_POST["period"] . '</strong> jours</label><br/></td><td></td></tr>
            <tr><td colspan="2"></td></tr>';
            } else {
                $checkBoxesGenerated .= '<tr><td><label> &nbsp; &nbsp; &nbsp; ' . $listChoice[$i] . " ............ " . ' jours</label><br/></td><td></td></tr>
            <tr><td colspan="2"></td></tr>';
            }
        }

        $checkBoxesGenerated .= '<tr><td><label> &nbsp; &nbsp; &nbsp; ' . $listChoice[$i].'</label><br/></td><td></td></tr>
        <tr><td colspan="2"></td></tr>';

        $checkBoxesGenerated .= '</table>';

        $randomX = rand(80, 100);
        $randomY = rand(20,22);
        $randomYS = rand(15,27);
        $randomXS = rand(70,80);
        $randomAlpha = rand(-5,5);
        $randomAlphaS = rand(-5,5);

        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Someone');
        $pdf->SetTitle("Feel free");

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);

        // set margins
        $pdf->SetMargins(10, 10, 10);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, 10);

        // add a page
        $pdf->AddPage('L', 'A4');

        $pdf->StartTransform();
        $pdf->Rotate($randomAlpha, ($randomX + 50)/2, ($randomY + 15)/2);
        $pdf->Image($imgPrint,$randomX, $randomY, "50", "15");
        $pdf->StopTransform();
        $pdf->StartTransform();
        $pdf->Rotate($randomAlphaS, ($randomXS + 75)/2, ($randomYS + 30)/2);
        $pdf->Image($imgSign, $randomXS, $randomYS, "75", "30", 'png');
        $pdf->StopTransform();

        $pdf->Image("../resources/img/cadre.png", "74","9","78","44");

        if($type == 'work'){
            $pdf->Image("../resources/img/checkbox.png", "12", "106", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "122", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "143", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "164", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "180", "5", "5");
        }
        else if ($type == 'sport'){
            $pdf->Image("../resources/img/checkbox.png", "12", "106", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "127", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "148", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "165", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "180", "5", "5");
        }
        else{
            $pdf->Image("../resources/img/checkbox.png", "12", "106", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "127", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "148", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "170", "5", "5");
            $pdf->Image("../resources/img/checkbox.png", "12", "185", "5", "5");
        }

        $location = mb_ereg_replace('[0-9]{5}', '', $code);

        $location = mb_ereg_replace('[0-9]{4}', '', $location);


        //MC generation

        $html = <<<HTML

        <div style="height:50px;" >

        </div>
        <table>
            <tr>
                <th colspan="2"><h2>CERTIFICAT MEDICAL</h2></th><th colspan="2" rowspan="5" style="font-size: 7px; text-align: center;">signature du médecin</th><th></th><th></th><th></th><th></th>
            </tr>
            <tr><td colspan="2" style="font-size: 7px">Délivré sur la demande du patient et remis en main propres</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2">à : {$location}</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2">le : {$day}</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
        </table>
        
        </div>
        
        <div>
            <table>
                <tr><td colspan="4">Je soussigné <strong>{$medname}</strong></td></tr>
                <tr><td colspan="2">certifie, après examen, que {$_POST['sex']} <strong>{$name} {$firstname}</strong></td></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td colspan="2"></td></tr>
            </table>
        </div>
        
        {$checkBoxesGenerated}
HTML;

        $pdf->writeHTML($html, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();
        //Close and output PDF document
        $pdf->Output("MC.pdf", "I");

    }
    else{
        header('Location: index.php');
    }

}
else{
    header('Location: index.php');
}
