<meta charset="UTF-8">
<?php
	include('controller/connect.php');  

		$fileupload1 = $_REQUEST['fileupload1'];	
		$fileupload2 = $_REQUEST['fileupload2'];	
		$date = date("d-m-Y"); 
		$upload1=$_FILES['fileupload1'];
		$upload2=$_FILES['fileupload2'];

	if($upload1 <> '') {  

		$path="fileupload/";  
		$remove_these = array(' ','`','"','\'','\\','/','_');
		$newname1 = str_replace($remove_these, '', $_FILES['fileupload1']['name']);
 
		$newname1 = time().'-'.$newname1;
		$path_copy=$path.$newname1;
		$path_link="fileupload/".$newname1;

	move_uploaded_file($_FILES['fileupload1']['tmp_name'],$path_copy); 	
	}
	
		$sql = "INSERT INTO uploadfile (fileupload) 
		VALUES('$newname1')";
		
		$result = mysql_query($sql) or die ("Error in query: $sql " . mysql_error());

        $sql4 = mysql_query("SELECT * FROM uploadfile", $link);
$doc = new DOMDocument();
$doc->load('ebxml_CLIS_DPXK000000633_20170127200227_0372_0000_M.xml');
$xPath = new DOMXPath($doc);
$nodeList = $xPath->query("fileupload/");

// $doc1->load('');
//echo $doc->saveXML(). "<br />";

  $DocumentControl=$doc->getElementsByTagName('DocumentControl');
  $GoodsShipment=$doc->getElementsByTagName('GoodsShipment');

  $k=0;
foreach ($DocumentControl as $doc)
    {
    $ReferenceNumber = $DocumentControl->item($k)->getElementsByTagName('ReferenceNumber')->item(0)->nodeValue;
    $ReceivedControlNumber = $DocumentControl->item($k)->getElementsByTagName('ReceivedControlNumber')->item(0)->nodeValue;
    $ShipAgentInfoTaxNumber = $GoodsShipment->item($k)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
    $ShipAgentInfoBranch = $GoodsShipment->item($k)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue;
    $ProcessingIndicator = $DocumentControl->item($k)->getElementsByTagName('ProcessingIndicator')->item(0)->nodeValue;
    $Callsign = $DocumentControl->item($k)->getElementsByTagName('Callsign')->item(0)->nodeValue;
    $VoyageNumber = $DocumentControl->item($k)->getElementsByTagName('VoyageNumber')->item(0)->nodeValue;
    $RegistrationID = $DocumentControl->item($k)->getElementsByTagName('RegistrationID')->item(0)->nodeValue;
      $k++;
    }

$z=0;
        foreach ($GoodsShipment as $doc)
        {
    $Number = $GoodsShipment->item($z)->getElementsByTagName('Number')->item(0)->childNodes->item(0)->nodeValue;
    $TaxNumber1 = $GoodsShipment->item($z)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
    $Branch1 = $GoodsShipment->item($z)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue;
    $SizeAndTypeCode = $GoodsShipment->item($z)->getElementsByTagName('SizeAndTypeCode')->item(0)->childNodes->item(0)->nodeValue;
    $Status = $GoodsShipment->item($z)->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
    $Material = $GoodsShipment->item($z)->getElementsByTagName('Material')->item(0)->childNodes->item(0)->nodeValue;
    $PortOfLoading = $GoodsShipment->item($z)->getElementsByTagName('PortOfLoading')->item(0)->nodeValue;
    $PlaceOfOrigin = $GoodsShipment->item($z)->getElementsByTagName('PlaceOfOrigin')->item(0)->nodeValue;
    $PortOfDischarge = $GoodsShipment->item($z)->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
    $PlaceOfDelivery = $GoodsShipment->item($z)->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
    $ShedNumberReleasePort = $GoodsShipment->item($z)->getElementsByTagName('ShedNumberReleasePort')->item(0)->nodeValue;
    $FinalPort = $GoodsShipment->item($z)->getElementsByTagName('FinalPort')->item(0)->nodeValue;
    $StowagePosition = $GoodsShipment->item($z)->getElementsByTagName('PlaceOfDelivery')->item(0)->nodeValue;
    $eSealNumber = $GoodsShipment->item($z)->getElementsByTagName('eSealNumber')->item(0)->nodeValue;
    $CommodityName = $GoodsShipment->item($z)->getElementsByTagName('CommodityName')->item(0)->nodeValue;
    $TotalGrossWeight1 = $GoodsShipment->item($z)->getElementsByTagName('Weight')->item(0)->childNodes->item(0)->nodeValue;
    $TotalGrossWeightUnitcode1 = $GoodsShipment->item($z)->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
    $LastEntry = $GoodsShipment->item($z)->getElementsByTagName('LastEntry')->item(0)->nodeValue;
         $z++;
        }




if($ReferenceNumber !='' ||$ReceivedControlNumber !=''){ 
    $query4 = mysql_query("INSERT INTO `vessel`.`clis` (`ReferenceNumber`, `ReceivedControlNumber`, `ShipAgentInfoTaxNumber`, `ShipAgentInfoTaxNumber`,`ProcessingIndicator` ,`Callsign`, `VoyageNumber`, `RegistrationID`,`ContainerInfoNumber`,`ContainerInfoTaxNumber`,`Branch`,`SizeAndTypeCode`, `Status`, `Material`, `PortOfLoading`, `PlaceOfOrigin`, `PortOfDischarge`, `PlaceOfDelivery`, `ShedNumberReleasePort`, `FinalPort`,`StowagePosition`, `eSealNumber`, `CommodityName`, `TotalGrossWeight`, `TotalGrossWeightUnitcode`, `LastEntry`) VALUES ('$ReferenceNumber', '$ReceivedControlNumber', '$ShipAgentInfoTaxNumber','$ShipAgentInfoBranch', '$Callsign', '$VoyageNumber', '$RegistrationID','$SizeAndTypeCode', '$Number','$TaxNumber1','$Branch1','$Status', '$Material','$PortOfLoading', '$PortOfDischarge','$PlaceOfDelivery','$ShedNumberReleasePort','$FinalPort','$StowagePosition','$eSealNumber','$CommodityName','$TotalGrossWeight1','$TotalGrossWeightUnitcode1','$LastEntry');
");
    mysql_query($query4,$link);
}




	if($upload2 <> '') {  

		$path="fileupload/";  
		$remove_these = array(' ','`','"','\'','\\','/','_');
		$newname2 = str_replace($remove_these, '', $_FILES['fileupload2']['name']);

		$newname2 = time().'-'.$newname2;
		$path_copy=$path.$newname2;
		$path_link="fileupload/".$newname2;
	move_uploaded_file($_FILES['fileupload2']['tmp_name'],$path_copy); 	
	}
	
		$sql1 = "INSERT INTO uploadfile (fileupload) 
		VALUES('$newname2')";
		
		$result1 = mysql_query($sql1) or die ("Error in query: $sql1 " . mysql_error());


            $sql3 = mysql_query("SELECT * FROM uploadfile", $link); 
    $doc = new DOMDocument();
    $doc->load('ebxml_MMAN_DSDL000000286_20180501233046_0654_0000_M.xml');

  $DocumentControl=$doc->getElementsByTagName('DocumentControl');
  $GoodsShipment=$doc->getElementsByTagName('GoodsShipment');

  $k=0;
foreach ($DocumentControl as $doc)
    {
        $ReferenceNumber = $DocumentControl->item($k)->getElementsByTagName('ReferenceNumber')->item(0)->nodeValue;
        $ReceivedControlNumber = $DocumentControl->item($k)->getElementsByTagName('ReceivedControlNumber')->item(0)->nodeValue;
        $TaxNumber1 = $DocumentControl->item($k)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
        $Branch1= $DocumentControl->item($k)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue; 
        $TaxNumber2 =$DocumentControl->item($k)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
        $Branch2 = $DocumentControl->item($k)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue; 
        $Callsign = $DocumentControl->item($k)->getElementsByTagName('Callsign')->item(0)->nodeValue;
        $VoyageNumber = $DocumentControl->item($k)->getElementsByTagName('VoyageNumber')->item(0)->nodeValue;
        $BerthDate = $DocumentControl->item($k)->getElementsByTagName('BerthDate')->item(0)->nodeValue;
        $RegistrationID = $DocumentControl->item($k)->getElementsByTagName('RegistrationID')->item(0)->nodeValue;
      $k++;
    }

            $z=0;
        foreach ($GoodsShipment as $doc)
        {
        $MasterBL = $GoodsShipment->item($z)->getElementsByTagName('MasterBL')->item(0)->nodeValue;
        $PortOfLoading = $GoodsShipment->item($z)->getElementsByTagName('PortOfLoading')->item(0)->nodeValue;
        $PortOfDischarge = $GoodsShipment->item($z)->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
        $PlaceOfDelivery = $GoodsShipment->item($z)->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
        $ShedNumberReleasePort = $GoodsShipment->item($z)->getElementsByTagName('ShedNumberReleasePort')->item(0)->nodeValue;
        $ShipperInfoName = $GoodsShipment->item($z)->getElementsByTagName('Name')->item(0)->childNodes->item(0)->nodeValue;
        $ShipperInfoNameAndAddress = $GoodsShipment->item($z)->getElementsByTagName('NameAndAddress')->item(0)->childNodes->item(0)->nodeValue;
        $ShipperInfoCountryCode = $GoodsShipment->item($z)->getElementsByTagName('CountryCode')->item(0)->childNodes->item(0)->nodeValue;
        $ConsigneeInfoName = $GoodsShipment->item($z)->getElementsByTagName('Name')->item(0)->childNodes->item(0)->nodeValue;
        $ConsigneeInfoNameAndAddress = $GoodsShipment->item($z)->getElementsByTagName('NameAndAddress')->item(0)->childNodes->item(0)->nodeValue;
        $ConsigneeInfoCountryCode = $GoodsShipment->item($z)->getElementsByTagName('CountryCode')->item(0)->childNodes->item(0)->nodeValue;
        $NotifyPartyInfoName = $GoodsShipment->item($z)->getElementsByTagName('Name')->item(0)->childNodes->item(0)->nodeValue;
        $NotifyPartyInfoNameAndAddress = $GoodsShipment->item($z)->getElementsByTagName('NameAndAddress')->item(0)->childNodes->item(0)->nodeValue;
        $NotifyPartyInfoCountryCode = $GoodsShipment->item($z)->getElementsByTagName('CountryCode')->item(0)->childNodes->item(0)->nodeValue;
        $TotalGrossWeight2 = $GoodsShipment->item($z)->getElementsByTagName('Weight')->item(0)->childNodes->item(0)->nodeValue;
        $TotalGrossWeightUnitcode2 = $GoodsShipment->item($z)->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
        $TotalPackageInfoAmount = $GoodsShipment->item($z)->getElementsByTagName('Amount')->item(0)->childNodes->item(0)->nodeValue;
        $TotalGrossWeightUnitcode3 = $GoodsShipment->item($z)->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
        $Measurement = $GoodsShipment->item($z)->getElementsByTagName('Measurement')->item(0)->childNodes->item(0)->nodeValue;
        $MeasurementUnitCode = $GoodsShipment->item($z)->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;

        $ShippingMarks = $GoodsShipment->item($z)->getElementsByTagName('ShippingMarks')->item(0)->nodeValue;
        $CargoMovement = $GoodsShipment->item($z)->getElementsByTagName('CargoMovement')->item(0)->nodeValue;
        $DescriptionOfGoods = $GoodsShipment->item($z)->getElementsByTagName('DescriptionOfGoods')->item(0)->nodeValue;
        $GoodsCargoType = $GoodsShipment->item($z)->getElementsByTagName('GoodsCargoType')->item(0)->nodeValue;
        $LastEntry = $GoodsShipment->item($z)->getElementsByTagName('LastEntry')->item(0)->nodeValue;
        $ContainerNumber = $GoodsShipment->item($z)->getElementsByTagName('Number')->item(0)->childNodes->item(0)->nodeValue;
        $ContainerStatus = $GoodsShipment->item($z)->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
        $ContainerRackIndicator = $GoodsShipment->item($z)->getElementsByTagName('RackIndicator')->item(0)->childNodes->item(0)->nodeValue;
        $ContainerGoodsCargoType = $GoodsShipment->item($z)->getElementsByTagName('GoodsCargoType')->item(0)->childNodes->item(0)->nodeValue;
        $ContainerLastEntry = $GoodsShipment->item($z)->getElementsByTagName('LastEntry')->item(0)->childNodes->item(0)->nodeValue;
         $z++;
        }


if($MasterBL !=''  ||$ShipperInfoName !=''){ 
    
//Insert Query of SQL
 $query = mysql_query("INSERT INTO `vessel`.`mman` (`MasterBL`, `ShipperInfoName`) VALUES ('$MasterBL', '$ShipperInfoName');
");
}
	
	
 mysql_close($link); 
 die();
    	
?>