<?php

/*
 * Copyright (c) 2016-2017 Barchampas Gerasimos <http://makbox.co.nf/>
 * Makbox is a personal (staas) cloud.
 *
 * Makbox is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 *
 * Makbox is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */



       require('class_cn.php');

      $obj = new in;
 
     $host = $obj->connect[0];
     $user = $obj->connect[1];
     $pass = $obj->connect[2];
     $db   = $obj->connect[3];
  $conn = new mysqli($host,$user,$pass,$db);

  if($conn->connect_error)
    {
    die ("Cannot connect to server " .$conn->connect_error);
      }


 else
   {


require('fpdf/fpdf.php');
$pdf=new FPDF();
$pdf->AddPage('P', 'A3'); // kathorizei ton tupo xartiou ths selidas
// o tupos mporei an einai P or Portrait L or Landscape kai megethos xartiou (A3,A4,A5,Letter,Legal)
$pdf->SetFont('Arial','B',10);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFillColor(230,230,230); // edw kathorizeis to xrwma
$pdf->SetFont('times','B',15);
$pdf->Cell(283,15,"All details for users",1,0,'C',TRUE);
$pdf->Ln(); // afhnei mia grammh keno kai paei apo katw
$pdf->SetFont('times','B',10);
$pdf->Cell(35,15,"Instant",1,0,'C',TRUE); // edw vazeis platos,upsos,onoma,border w,0h,kai true gia na parei to xrwma
$pdf->Cell(40,15,"Ip address",1,0,'C',TRUE);
$pdf->Cell(48,15,"Mac address(not always)",1,0,'C',TRUE);
$pdf->Cell(50,15,"Url visited",1,0,'C',TRUE);
$pdf->Cell(70,15,"Cookies",1,0,'C',TRUE);
$pdf->Cell(40,15,"Client name(if visiting)",1,0,'C',TRUE);
$pdf->Ln();


         $sql="select instant,ip_address,mac_address,folder,cookies,name from all_users_details";
        $result = $conn->query($sql);

        while($row=$result->fetch_assoc())
        {
            $instant = $row['instant'];
            $ip = $row['ip_address'];
            $mac = $row['mac_address'];
            $folder = $row['folder'];
            $cookies = $row['cookies'];
            $name = $row['name'];
  
 
            $pdf->Cell(35,7,$instant,1);
            $pdf->Cell(40,7,$ip,1);
            $pdf->Cell(48,7,$mac,1);          
            $pdf->Cell(50,7,$folder,1);
            $pdf->Cell(70,7,$cookies,1);
            $pdf->Cell(40,7,$name,1);

            //$pdf->Cell(127,7,$message,1); // edw emfanizei olo to keimeno kanwntas ansiplwsh keimenou an einai MultiCell
           $pdf->Ln(); 
        }

   $pdf->Output(); 
  



   /*
    duo eidh eksodou pdf

   $pdf->Output('D','messages.pdf'); //eksodos kateutheian me onoma

  $pdf->Output(); // edw anoigo vlewpw kai meta katevazw kai allazw onoma 

   */


 } // kleisimo ths else gia ta dedomena

$conn->close();


?>
