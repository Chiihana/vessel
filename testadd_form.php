<?php
$doc = new DOMDocument();
$doc->load('?del={$row['fileID']}');
// $doc1->load('');
//echo $doc->saveXML(). "<br />";

  $DocumentControl=$doc->getElementsByTagName('DocumentControl');
  $GoodsShipment=$doc->getElementsByTagName('GoodsShipment');

  $k=0;
foreach ($DocumentControl as $doc)
    {
    echo "ReferenceNumber: ".$DocumentControl->item($k)->getElementsByTagName('ReferenceNumber')->item(0)->nodeValue;
    echo "ReceivedControlNumber:".$DocumentControl->item($k)->getElementsByTagName('ReceivedControlNumber')->item(0)->nodeValue;
    echo "ProcessingIndicator:".$DocumentControl->item($k)->getElementsByTagName('ProcessingIndicator')->item(0)->nodeValue;
   // echo "TaxNumber:".$ShipAgentInfo->item($k)->getElementsByTagName('TaxNumber')->item(0)->nodeValue;
    echo"TaxNumber:".$DocumentControl->item($k)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
    echo"Branch:".$DocumentControl->item($k)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue; 
    echo "Callsign:".$DocumentControl->item($k)->getElementsByTagName('Callsign')->item(0)->nodeValue;
    echo "VoyageNumber:".$DocumentControl->item($k)->getElementsByTagName('VoyageNumber')->item(0)->nodeValue;
    echo "RegistrationID:".$DocumentControl->item($k)->getElementsByTagName('RegistrationID')->item(0)->nodeValue;
      $k++;
    }

$z=0;
        foreach ($GoodsShipment as $doc)
        {
         echo"Number:".$GoodsShipment->item($z)->getElementsByTagName('Number')->item(0)->childNodes->item(0)->nodeValue;
         echo"TaxNumber:".$GoodsShipment->item($z)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
         echo"Branch:".$GoodsShipment->item($z)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue;
         echo"SizeAndTypeCode:".$GoodsShipment->item($z)->getElementsByTagName('SizeAndTypeCode')->item(0)->childNodes->item(0)->nodeValue;
         echo"Status:".$GoodsShipment->item($z)->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
         echo"Material:".$GoodsShipment->item($z)->getElementsByTagName('Material')->item(0)->childNodes->item(0)->nodeValue;
         echo "PortOfLoading:".$GoodsShipment->item($z)->getElementsByTagName('PortOfLoading')->item(0)->nodeValue;
         echo "PlaceOfOrigin".$GoodsShipment->item($z)->getElementsByTagName('PlaceOfOrigin')->item(0)->nodeValue;
         echo "PortOfDischarge:".$GoodsShipment->item($z)->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
         echo "PlaceOfDelivery:".$GoodsShipment->item($z)->getElementsByTagName('PlaceOfDelivery')->item(0)->nodeValue;
         echo "ShedNumberReleasePort:".$GoodsShipment->item($z)->getElementsByTagName('ShedNumberReleasePort')->item(0)->nodeValue;
         echo "FinalPort:".$GoodsShipment->item($z)->getElementsByTagName('FinalPort')->item(0)->nodeValue;
         echo "StowagePosition:".$GoodsShipment->item($z)->getElementsByTagName('StowagePosition')->item(0)->nodeValue;
         echo "eSealNumber:".$GoodsShipment->item($z)->getElementsByTagName('eSealNumber')->item(0)->nodeValue;
         echo "CommodityName".$GoodsShipment->item($z)->getElementsByTagName('CommodityName')->item(0)->nodeValue;
         echo "Weight':".$GoodsShipment->item($z)->getElementsByTagName('Weight')->item(0)->childNodes->item(0)->nodeValue;
         echo "UnitCode':".$GoodsShipment->item($z)->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
         echo "LastEntry".$GoodsShipment->item($z)->getElementsByTagName('LastEntry')->item(0)->nodeValue;
         
         $z++;
        }


if(isset($_POST['submit'])){
//$Reference_ID = $DocumentControl->item($k)->getElementsByTagName('ReferenceNumber')->item(0)->nodeValue;

$ReferenceNumber = $DocumentControl->item($k)->getElementsByTagName('ReferenceNumber')->item(0)->nodeValue;
$ReceivedControlNumber = $DocumentControl->item($k)->getElementsByTagName('ReceivedControlNumber')->item(0)->nodeValue;
$ShipAgentInfoTaxNumber = $GoodsShipment->item($k)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
$ShipAgentInfoBranch = $GoodsShipment->item($k)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue;
//$ContainerOperatorInfo = $_POST['ContainerOperatorInfo'];
$ProcessingIndicator = $DocumentControl->item($k)->getElementsByTagName('ProcessingIndicator')->item(0)->nodeValue;
$Callsign = $DocumentControl->item($k)->getElementsByTagName('Callsign')->item(0)->nodeValue;
$VoyageNumber = $DocumentControl->item($k)->getElementsByTagName('VoyageNumber')->item(0)->nodeValue;
$RegistrationID = $DocumentControl->item($k)->getElementsByTagName('RegistrationID')->item(0)->nodeValue;
//$BerthDate = $DocumentControl->item($k)->getElementsByTagName('BerthDate')->item(0)->nodeValue;
//$ConfirmBerthDate = $_POST['ConfirmBerthDate'];
//$Status = $_POST['Status'];
//GoodsShipment
//$MaterBL = $_POST['MaterBL'];
$Number = $GoodsShipment->item($z)->getElementsByTagName('Number')->item(0)->childNodes->item(0)->nodeValue;
$TaxNumber = $GoodsShipment->item($z)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
$Branch = $GoodsShipment->item($z)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue;
$SizeAndTypeCode = $GoodsShipment->item($z)->getElementsByTagName('SizeAndTypeCode')->item(0)->childNodes->item(0)->nodeValue;
$Status = $GoodsShipment->item($z)->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
$Material = $GoodsShipment->item($z)->getElementsByTagName('Material')->item(0)->childNodes->item(0)->nodeValue;
$PortOfLoading = $GoodsShipment->item($z)->getElementsByTagName('PortOfLoading')->item(0)->nodeValue;
//$PortOfLoading = $GoodsShipment->item($z)->getElementsByTagName('PortOfLoading')->item(0)->nodeValue;
$PlaceOfOrigin = $GoodsShipment->item($z)->getElementsByTagName('PlaceOfOrigin')->item(0)->nodeValue;
$PortOfDischarge = $GoodsShipment->item($z)->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
$PlaceOfDelivery = $GoodsShipment->item($z)->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
$ShedNumberReleasePort = $GoodsShipment->item($z)->getElementsByTagName('ShedNumberReleasePort')->item(0)->nodeValue;
$FinalPort = $GoodsShipment->item($z)->getElementsByTagName('FinalPort')->item(0)->nodeValue;
$StowagePosition = $GoodsShipment->item($z)->getElementsByTagName('PlaceOfDelivery')->item(0)->nodeValue;
$eSealNumber = $GoodsShipment->item($z)->getElementsByTagName('eSealNumber')->item(0)->nodeValue;
$CommodityName = $GoodsShipment->item($z)->getElementsByTagName('CommodityName')->item(0)->nodeValue;
$TotalGrossWeight = $GoodsShipment->item($z)->getElementsByTagName('TotalGrossWeight')->item(0)->childNodes->item(0)->nodeValue;
$TotalGrossWeightUnitcode = $GoodsShipment->item($z)->getElementsByTagName('TotalGrossWeightUnitcode')->item(0)->childNodes->item(0)->nodeValue;
$LastEntry = $GoodsShipment->item($z)->getElementsByTagName('LastEntry')->item(0)->nodeValue;


if($ReferenceNumber !='' ||$ReceivedControlNumber !=''){ 
    $query = mysql_query("INSERT INTO `vessel`.`clis` (`ReferenceNumber`, `ReceivedControlNumber`, `ShipAgentInfoTaxNumber`, `ShipAgentInfoTaxNumber`,`ProcessingIndicator` ,`Callsign`, `VoyageNumber`, `RegistrationID`,`ContainerInfoNumber`,`ContainerInfoTaxNumber`,`Branch`,`SizeAndTypeCode`, `Status`, `Material`, `PortOfLoading`, `PlaceOfOrigin`, `PortOfDischarge`, `PlaceOfDelivery`, `ShedNumberReleasePort`, `FinalPort`,`StowagePosition`, `eSealNumber`, `CommodityName`, `TotalGrossWeight`, `TotalGrossWeightUnitcode`, `LastEntry`) VALUES ('$ReferenceNumber', '$ReceivedControlNumber', '$ShipAgentInfoTaxNumber','$ShipAgentInfoTaxNumber', '$Callsign', '$VoyageNumber', '$RegistrationID','$SizeAndTypeCode', '$Number','$TaxNumber','$Branch','$Status', '$Material','$PortOfLoading', '$PortOfDischarge','$PlaceOfDelivery','$ShedNumberReleasePort','$FinalPort','StowagePosition','eSealNumber','CommodityName','TotalGrossWeight','$TotalGrossWeightUnitcode','$LastEntry');
");
    mysql_query($query,$link);
  if($query){
 header("Location: test2.php");
 echo "You Data is Success";
 echo "<script type='text/javascript'>";
 echo "alert('อัพโหลดไฟล์สำเร็จ');";
 echo "window.location = 'test2.php'; ";
 echo "</script>";

}
else{
    echo "<script type='text/javascript'>";
    echo "alert('อัพโหลดไฟล์ไม่สำเร็จ');";
    echo "window.location = 'test2.php'; ";
    echo "</script>";
}


mysql_close($link); 
die();
}
}
?>