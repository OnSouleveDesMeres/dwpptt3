<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 20/08/17
 * Time: 22:15
 */

require_once '../vendor/autoload.php';
require_once('../vendor/tecnickcom/tcpdf/examples/tcpdf_include.php');
if(isset($_POST) && !is_null($_POST)){

    if (isset($_POST['period']) && !is_null($_POST['period']) && isset($_POST['datens']) && !is_null($_POST['datens']) && isset($_POST['name']) && !is_null($_POST['name']) &&
        isset($_POST['fname']) && !is_null($_POST['fname']) && isset($_POST['mstreet']) && !is_null($_POST['mstreet']) && isset($_POST['mnum']) && !is_null($_POST['mnum']) &&
        isset($_POST['mcp']) && !is_null($_POST['mcp']) && isset($_POST['mcity']) && !is_null($_POST['mcity']) && isset($_POST['maladie']) && !is_null($_POST['maladie'])){

        $imgPrint = 'img/print.jpg';
        $imgSign = 'img/sign.png';

        $period = $_POST['period'];
        $datens = $_POST['datens'];
        $name = $_POST['name'];
        $firstname = $_POST['fname'];
        $medstreet = $_POST['mstreet'];
        $mednum = $_POST['mnum'];
        $medcp = $_POST['mcp'];
        $medcity = $_POST['mcity'];
        $maladie = $_POST['maladie'];

        $dateEnd = date('d/m/Y', strtotime($period." days"));
        $day = date('d/m/Y');


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

        $pdf->Image($imgSign, "55", "150", "75", "30");

        //MC generation

        $html = <<<HTML

        <div style="height:50px;" >

        </div>
        <table>
            <tr>
                <th colspan="2" style="text-align: center;"><h1>CERTIFICAT MEDICAL</h1></th><th></th><th></th><td></td>
            </tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
        </table>
        
        </div>
        
        <table>
            <tr><td colspan="4">Je soussigné docteur <strong>Béatrice DUCHAUSSOY</strong></td></tr>
            <tr><td colspan="2">certifie avoir examiné ce jour <strong>{$name} {$firstname}</strong></td></tr>
            <tr><td colspan="2">né le <strong>{$datens}</strong></td></tr>
            <tr><td colspan="2">souffrant de <strong>{$maladie}</strong></td></tr>
            <tr><td colspan="2">Son état actuel ne lui permettra pas d'assister aux cours jusqu'au <strong>{$dateEnd}</strong></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
        </table>    
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
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr><td colspan="2"></td></tr>
            <tr>
                <th colspan="2" style="text-align: center;"><span>Certificat remis à la demande de l'intéressé en main propre le <strong>{$day}</strong></span></th><th></th><th></th><td></td>
            </tr>
        </table>
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
