
<?php
    //if(!empty($_POST['submit']))
    

    $bid=$_POST['billno'];
    $cid=$_POST['cid'];
    $eid=$_POST['eid'];
    $date=$_POST['date'];
    $quant=$_POST['quant'];
    $amount=$_POST['amount'];
    $tax=$_POST['tax'];
    $tamt=$_POST['tamount'];

    require("fpdf/fpdf.php");
    $pdf=new FPDF();

    $pdf->AddPage();
    $pdf->SetFont("Arial","B",16);

    $pdf->Cell(50,10,"Date : {$date}",1,1,'R');
   // $pdf->Cell(50,10,"$date ",1,1,'R');
    $pdf->SetFont("Arial","I",18);
    $pdf->Cell(0,10,"The Velvet Box",1,1,'C');

    $pdf->SetFont("Arial","B",16);

    $pdf->Cell(0,10,"Bill NO {$bid}",1,1,'C');

    $pdf->Cell(95,10,"EID :",1,0);
    $pdf->Cell(95,10,"$eid ",1,1);

    $pdf->Cell(95,10,"CID :",1,0);
    $pdf->Cell(95,10,"$cid ",1,1);

    $pdf->Cell(95,10,"Quantity Of Purchase :",1,0);
    $pdf->Cell(95,10,"$quant ",1,1);

    $pdf->Cell(95,10,"Total Amount of Gold (Rs):",1,0);
    $pdf->Cell(95,10,"$amount ",1,1);

    $pdf->Cell(95,10,"GST(%) :",1,0);
    $pdf->Cell(95,10,"$tax ",1,1);

    $pdf->Cell(95,10,"Total Price (Rs) : ",1,0);
    $pdf->Cell(95,10,"$tamt ",1,1);

  

    $pdf->output();
  
?>