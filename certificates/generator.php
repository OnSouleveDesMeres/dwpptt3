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
    $type = $_POST['type'];
    if ($type == 'school'){
        $maladie = $_POST['maladie'];
    }
    if (isset($_POST['period']) && !is_null($_POST['period']) && isset($_POST['name']) && !is_null($_POST['name']) &&
        isset($_POST['fname']) && !is_null($_POST['fname']) && isset($_POST['mstreet']) && !is_null($_POST['mstreet']) && isset($_POST['mnum']) && !is_null($_POST['mnum']) &&
        isset($_POST['mcp']) && !is_null($_POST['mcp']) && isset($_POST['mcity']) && !is_null($_POST['mcity']) && isset($_POST['type']) && !is_null($_POST['type'])){

        $imgSign = '../img/sign.png';

        $listChoice = array(' présente un état de santé nécessitant un arrêt de travail de ', " ne pourra fréquenter l'école, le collège, le lycée, pour cause de {$maladie} pendant ", " doit être dispensé d'éducation physique et sportive pendant ", ' est exempté de piscine pendant ');
        $typeChoice = array('work', 'school', 'sport', 'swim');

        $period = $_POST['period'];
        $datens = $_POST['datens'];
        $name = $_POST['name'];
        $firstname = $_POST['fname'];
        $medstreet = $_POST['mstreet'];
        $mednum = $_POST['mnum'];
        $medcp = $_POST['mcp'];
        $medcity = $_POST['mcity'];
        $day = date('d/m/Y');

        generateImage($medstreet, $medcity, $medcp, $mednum);

        $imgPrint = "../img/".$medcity.".png";

        $checkBoxesGenerated = '<table>';

        for($i = 0; $i < count($listChoice); $i++) {
            if (getState($type, $typeChoice[$i])) {
                $checkBoxesGenerated .= '<tr><td><input type="checkbox" name="1" value="1" readonly="true" /><label> ' . $listChoice[$i] . " " . $_POST["period"] . ' jours</label><br/></td><td></td></tr>
            <tr><td colspan="2"></td></tr>';
            } else {
                $checkBoxesGenerated .= '<tr><td><input type="checkbox" name="1" value="1" readonly="true" /><label> ' . $listChoice[$i] . " ............ " . ' jours</label><br/></td><td></td></tr>
            <tr><td colspan="2"></td></tr>';
            }
        }

        $checkBoxesGenerated .= '</table>';

        $randomX = rand(80, 100);
        $randomY = rand(20,22);

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

        $pdf->Image($imgPrint,$randomX, $randomY, "50", "15");
        $pdf->Image($imgSign, "70", "20", "75", "30", 'png');

        //MC generation

        $html = <<<HTML

        <div style="height:50px;" >

        </div>
        <table>
            <tr>
                <th colspan="2"><h2>CERTIFICAT MEDICAL</h2></th><th colspan="2" rowspan="5" style="font-size: 7px; text-align: center;border-right: 1px solid black; border-left: 1px solid black; border-top: 1px solid black; border-bottom: 1px solid black;">signature du médecin</th><th></th><th></th><th></th><th></th>
            </tr>
            <tr><td colspan="2" style="font-size: 7px">Délivré sur la demande du patient et remis en main propres</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2">à : {$medcity}</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2">le : {$day}</td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
            <tr><td colspan="2"></td><td></td><td></td><td></td><td></td><td></td></tr>
        </table>
        
        </div>
        
        <div>
            <table>
                <tr><td colspan="4">Je soussigné docteur <strong>Béatrice DUCHAUSSOY</strong></td></tr>
                <tr><td colspan="2">certifie, après examen, que {$_POST['sex']} <strong>{$name} {$firstname}</strong></td></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td colspan="2"></td></tr>
                <tr><td colspan="2"></td></tr>
            </table>
        </div>
        
        {$checkBoxesGenerated}
        
        <!-- A transformer en iamge avec GD
        <table>
            <tr>
            <th></th><th style="border-right: 1px solid black; border-left: 1px solid black; border-top: 1px solid black; text-align: center;">Dr. DUCHAUSSOY B.</th><th></th><th></th><th></th>
            </tr>
            <tr>
            <td></td><td style="border-right: 1px solid black; border-left: 1px solid black; text-align: center;">MEDECIN REMPLAÇANTE</td><td></td><td></td><td></td>
            </tr>
            <tr>
            <td></td><td style="border-right: 1px solid black; border-left: 1px solid black; text-align: center;">{$mednum}, {$medstreet}</td><td></td><td></td><td></td>
            </tr>
            <tr>
            <td></td><td style="border-right: 1px solid black; border-left: 1px solid black; text-align: center;">{$medcp} {$medcity}</td><td></td><td></td><td></td>
            </tr>
            <tr>
            <td></td><td style="border-right: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black; text-align: center;">N° Ordre : 015 215 632</td><td></td><td></td><td></td>
            </tr>
        </table>
-->
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
