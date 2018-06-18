<?php
include("controller/conn.php");

// Prepare Input



$date = $_POST['datepicker'];
$birth = $_POST['birth'];
$shed = $_POST['shed'];
$terminal = $_POST['terminal'];
$voy = $_POST['voy'];
$upload1=$_FILES['fileupload'];
$upload2=$_FILES['fileupload1'];

$path="fileupload/";  
$remove_these = array(' ','`','"','\'','\\','/','_');


// Upload File 1
if(isset($upload1)) { 

    $newname1 = str_replace($remove_these, '', $_FILES['fileupload']['name']);
    $newname1 = time().'-'.$newname1;
    $path_copy=$path.$newname1;
    $path_link="fileupload/".$newname1;
    move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);  
}

// Upload File 2
if(isset($upload2)) { 

    $newname2 = str_replace($remove_these, '', $_FILES['fileupload1']['name']);
    $newname2 = time().'-'.$newname2;
    $path_copy1=$path.$newname2;
    $path_link1="fileupload1/".$newname2;
    move_uploaded_file($_FILES['fileupload1']['tmp_name'],$path_copy1);  
}


// Insert to uploadfile
 $sql = "INSERT INTO `uploadfile` (`fileID`, `fileupload`, `dateup`, `fileupload1`, `ConfirmBerthDate`, `CallSign`, `down_number`
 , `terminal_number`, `voyage_number`) VALUES (NULL, '$path_copy', NOW(), '$path_copy1', '$date', '$birth', '$voy', '$shed', '$terminal');";
// $db->exec($sql);
$stmt = $db->prepare($sql);
$stmt->execute();
$file_id = $db->lastInsertId();

// Read XML
 
$doc4 = new DOMDocument();
$doc4->load($path_copy1);

 $CustomsMaster=$doc4->getElementsByTagName('CustomsMasterSeaCargoManifest');
 //$CustomsCon=$doc1->getElementsByTagName('CustomsContainerList');

 if ($CustomsMaster->length == 0) {
    $doc2 = new DOMDocument();
    $doc2->load($path_copy);

    $CustomsMaster=$doc2->getElementsByTagName('CustomsMasterSeaCargoManifest');

 }
 if ($CustomsMaster->length != 0 ) {

    $DocumentControl=$CustomsMaster->item(0)->getElementsByTagName('DocumentControl');
    $GoodsShipments=$CustomsMaster->item(0)->getElementsByTagName('GoodsShipment');
   // $ContainerDetails=$CustomsMaster->item(0)->getElementsByTagName('ContainerDetail');

    // echo $DocumentControl->item(0)->getElementsByTagName('ReceivedControlNumber')->item(0)->nodeValue;
    // echo "<br />";
    // echo $GoodsShipments->length;

    $ReferenceNumber = $DocumentControl->item(0)->getElementsByTagName('ReferenceNumber')->item(0)->nodeValue;
    $ReceivedControlNumber = $DocumentControl->item(0)->getElementsByTagName('ReceivedControlNumber')->item(0)->nodeValue;
    $ShipAgentTaxNumber = $DocumentControl->item(0)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
    $ShipAgentBranch= $DocumentControl->item(0)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue; 
    $ContainerTaxNumber =$DocumentControl->item(0)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
    $ContainerBranch = $DocumentControl->item(0)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue; 
    $Callsign = $DocumentControl->item(0)->getElementsByTagName('Callsign')->item(0)->nodeValue;
    $VoyageNumber = $DocumentControl->item(0)->getElementsByTagName('VoyageNumber')->item(0)->nodeValue;
    $BerthDate = $DocumentControl->item(0)->getElementsByTagName('BerthDate')->item(0)->nodeValue;
    $RegistrationID = $DocumentControl->item(0)->getElementsByTagName('RegistrationID')->item(0)->nodeValue;
    
    if($ReferenceNumber !='' ||$ReceivedControlNumber !=''){  // check ว่ามี ReferenceNumber

        $sqlInsertDomcumentControl = " INSERT INTO `documentcrotrol` (`Reference_ID`, `ReferenceNumber`, `ReceivedControlNumber`, `ShipAgent_Tax`, `Container_Tax`, `ProcessingIndicator`, `Callsign`, `VoyageNumber`, `RegistrationID`, `BerthDate`, `Status`, `fileID`) VALUES (NULL,'$ReferenceNumber','$ReceivedControlNumber','$ShipAgentTaxNumber','$ContainerTaxNumber','0','$Callsign','$VoyageNumber','$RegistrationID','$BerthDate','A','$file_id')"; 
          //$db->exec($sqlInsertDomcumentControl);
        $stmt1 = $db->prepare($sqlInsertDomcumentControl);
        $stmt1->execute();
        $Reference_ID = $db->lastInsertId();
        echo $sqlInsertDomcumentControl;
     
                foreach($GoodsShipments as $GoodsShipment) {
                    $MasterBL = $GoodsShipment->getElementsByTagName('MasterBL')->item(0)->nodeValue;
                    $PortOfLoading = $GoodsShipment->getElementsByTagName('PortOfLoading')->item(0)->nodeValue;
                    $PortOfDischarge = $GoodsShipment->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
                    $PlaceOfDelivery = $GoodsShipment->getElementsByTagName('PlaceOfDelivery')->item(0)->nodeValue;
                    $ShedNumberReleasePort = $GoodsShipment->getElementsByTagName('ShedNumberReleasePort')->item(0)->nodeValue;
                    $ShipperInfoName = $GoodsShipment->getElementsByTagName('Name')->item(0)->childNodes->item(0)->nodeValue;
                    $ShipperInfoNameAndAddress = $GoodsShipment->getElementsByTagName('NameAndAddress')->item(0)->childNodes->item(0)->nodeValue;
                    $ShipperInfoCountryCode = $GoodsShipment->getElementsByTagName('CountryCode')->item(0)->childNodes->item(0)->nodeValue;
                    $ConsigneeInfoName = $GoodsShipment->getElementsByTagName('Name')->item(0)->childNodes->item(0)->nodeValue;
                   // $ConsigneeInfoNameAndAddress = $GoodsShipmenget->ElementsByTagName('NameAndAddress')->item(0)->childNodes->item(0)->nodeValue;
                    $ConsigneeInfoCountryCode = $GoodsShipment->getElementsByTagName('CountryCode')->item(0)->childNodes->item(0)->nodeValue;
                    $NotifyPartyInfoName = $GoodsShipment->getElementsByTagName('Name')->item(0)->childNodes->item(0)->nodeValue;
                    $NotifyPartyInfoNameAndAddress = $GoodsShipment->getElementsByTagName('NameAndAddress')->item(0)->childNodes->item(0)->nodeValue;
                    $NotifyPartyInfoCountryCode = $GoodsShipment->getElementsByTagName('CountryCode')->item(0)->childNodes->item(0)->nodeValue;
                    $TotalGrossWeight2 = $GoodsShipment->getElementsByTagName('Weight')->item(0)->childNodes->item(0)->nodeValue;
                    $TotalGrossWeightUnitcode2 = $GoodsShipment->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
                   // $TotalPackageInfoAmount = $GoodsShipment->getElementsByTagName('Amount')->item(0)->childNodes->item(0)->nodeValue;
                  //  $Totalpack = $GoodsShipment->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
                  //  $Measurement = $GoodsShipment->getElementsByTagName('Measurement')->item(0)->childNodes->item(0)->nodeValue;
                  //  $MeasurementUnitCode = $GoodsShipment->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;

                    $ShippingMarks = $GoodsShipment->getElementsByTagName('ShippingMarks')->item(0)->nodeValue;
                    $CargoMovement = $GoodsShipment->getElementsByTagName('CargoMovement')->item(0)->nodeValue;
                    $DescriptionOfGoods = $GoodsShipment->getElementsByTagName('DescriptionOfGoods')->item(0)->nodeValue;
                    $GoodsCargoType = $GoodsShipment->getElementsByTagName('GoodsCargoType')->item(0)->nodeValue;
                    $LastEntry = $GoodsShipment->getElementsByTagName('LastEntry')->item(0)->nodeValue;
                    // $ContainerNumber = $GoodsShipment->getElementsByTagName('Number')->item(0)->childNodes->item(0)->nodeValue;
                    // $ContainerStatus = $GoodsShipment->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
                    // $ContainerRackIndicator = $GoodsShipment->getElementsByTagName('RackIndicator')->item(0)->childNodes->item(0)->nodeValue;
                    // $ContainerGoodsCargoType = $GoodsShipment->getElementsByTagName('GoodsCargoType')->item(0)->childNodes->item(0)->nodeValue;
                    // $ContainerLastEntry = $GoodsShipment->getElementsByTagName('LastEntry')->item(0)->childNodes->item(0)->nodeValue;
                    
                    if($MasterBL !='' ||$ConsigneeInfoName !=''){
                    $sqlInsertGoodsShipment = "INSERT INTO `goodsshipment` (`Master_ID`, `MasterBL`, `PortOfLoading`, `Shed_Number`, `ShipperInfoName`, `ShipperInfoNameAndAddress`, `ShipperInfoCountryCode`, `ConsigneeName`, `ConsineeNameAndAddress`, `ConsineeCountry`, `TotalGrossWeight`, `TotalGrossWeightUnitcode`, `Amount`, `UnitCode`, `Measurement`, `MeasurementUnitCode`, `ShippingMarks`, `CargoMovement`, `DescriptionOfGoods`, `GoodsCargoType`, `LastEntry`, `Reference_ID`, `fileID`) VALUES (NULL, '$MasterBL', '$PortOfLoading', '$ShedNumberReleasePort', '$ShipperInfoName', '$ShipperInfoNameAndAddress', '$ShipperInfoCountryCode', '$ConsigneeInfoName', '', '$ConsigneeInfoCountryCode', '$TotalGrossWeight2', '$TotalGrossWeightUnitcode2', '', '', '', '', '$ShippingMarks', '$CargoMovement', '$DescriptionOfGoods', '$GoodsCargoType', '$LastEntry', '$Reference_ID','$file_id')";
                    
                    $stmt2 = $db->prepare($sqlInsertGoodsShipment);
                    $stmt2->execute();
                    $MasterID = $db->lastInsertId();
                    echo "$sqlInsertGoodsShipment";

                    $Totalpackage = $GoodsShipment->getElementsByTagName('TotalPackageInfo');
                        
                        foreach($Totalpackage as $Totalpacka) {
                            $TotalPackageInfoAmount = $Totalpacka->getElementsByTagName('Amount')->item(0)->childNodes->item(0)->nodeValue;
                            $TotalpackUnit = $Totalpacka->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;

                        if($TotalPackageInfoAmount !='' ||$TotalPack !=''){
                        
                        $inserttotalpack = "UPDATE `goodsshipment` SET   `Amount` = '$TotalPackageInfoAmount', `UnitCode` = '$TotalpackUnit' WHERE `goodsshipment`.`MasterBL` = '$MasterBL' ";
                        $querytotal = $db->prepare($inserttotalpack);
                        $querytotal->execute();


                    $Measurements = $GoodsShipment->getElementsByTagName('MeasurementInfo');
                        
                        foreach($Measurements as $Measurementa) {
                            $Measurement = $Measurementa->getElementsByTagName('Measurement')->item(0)->childNodes->item(0)->nodeValue;
                            $MeasurementUnitCode = $Measurementa->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;

                        if($Measurement !='' ||$MeasurementUnitCode !=''){
                        
                        $insertMeasure = "UPDATE `goodsshipment` SET   `Measurement` = '$Measurement', `MeasurementUnitCode` = '$MeasurementUnitCode' WHERE `goodsshipment`.`MasterBL` = '$MasterBL' ";
                        $queryMeasure = $db->prepare($insertMeasure);
                        $queryMeasure->execute();


                    $ContainerDetails = $GoodsShipment->getElementsByTagName('ContainerDetail');
                        
                        foreach($ContainerDetails as $ContainerDetail) {
                            $ContainerNumber = $ContainerDetail->getElementsByTagName('Number')->item(0)->childNodes->item(0)->nodeValue;
                            $ContainerStatus = $ContainerDetail->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
                            $ContainerRackIndicator = $ContainerDetail->getElementsByTagName('RackIndicator')->item(0)->childNodes->item(0)->nodeValue;
                            $ContainerGoodsCargoType = $ContainerDetail->getElementsByTagName('GoodsCargoType')->item(0)->childNodes->item(0)->nodeValue;
                            $ContainerLastEntry = $ContainerDetail->getElementsByTagName('LastEntry')->item(0)->childNodes->item(0)->nodeValue;
                        
                            // Insert
                             if($ContainerNumber !='' ||$ContainerStatus !=''){
                             $insertCon = "INSERT INTO `containerinfo` (`con_Number`, `Number`, `SizeAndTypeCode`, `Status`, `RackIndicator`, `GoodsCargoTyper`, `Material`, `PortOfLoading`, `PlaceOfOrigin`, `Shed_Number`, `StowagePosition`, `eSealNumber`, `CommodityName`, `Weight`, `UnitCode`, `Remark`, `LastEntry`, `Master_ID`, `fileID`) VALUES (NULL, '$ContainerNumber', '', '$ContainerStatus', '$ContainerRackIndicator', '$ContainerGoodsCargoType', '', '', '', '', '', '', '', '', '', '', '$LastEntry', '$MasterID', '$file_id' )";

                             $querycon = $db->prepare($insertCon);
                             $querycon->execute();
                             echo "$insertCon";
                             $conNumber = $db->lastInsertId();
                             header("Location: comeinmain.php");
                                            
                        }}}}}
                    }
                }
            }
    }
}

 $doc = new DOMDocument();
  $doc->load($path_copy1);

  $CustomsCon=$doc->getElementsByTagName('CustomsContainerList');

 if ($CustomsCon->length == 0) {
     $doc3 = new DOMDocument();
     $doc3->load($path_copy);

     $CustomsCon=$doc3->getElementsByTagName('CustomsContainerList');

  }
 if ($CustomsCon->length != 0 ) {

     $Document=$CustomsCon->item(0)->getElementsByTagName('DocumentControl');
     $GoodsShip=$CustomsCon->item(0)->getElementsByTagName('GoodsShipment'); // สั่ง


         if (isset($Document)) { // Check ว่าใน file มี DocumentControl หรือไม่
        
             // อ่านข้อมูล DocumentControl ลงตัวแปร
             $ReferenceNumber = $Document->item(0)->getElementsByTagName('ReferenceNumber')->item(0)->nodeValue;
             $ReceivedControlNumber = $Document->item(0)->getElementsByTagName('ReceivedControlNumber')->item(0)->nodeValue;
             $ShipAgentInfoTaxNumber = $Document->item(0)->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
             $ShipAgentInfoBranch = $Document->item(0)->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue;
             $ProcessingIndicator = $Document->item(0)->getElementsByTagName('ProcessingIndicator')->item(0)->nodeValue;
             $Callsign = $Document->item(0)->getElementsByTagName('Callsign')->item(0)->nodeValue;
             $VoyageNumber = $Document->item(0)->getElementsByTagName('VoyageNumber')->item(0)->nodeValue;
             $RegistrationID = $Document->item(0)->getElementsByTagName('RegistrationID')->item(0)->nodeValue;
            
            if($ProcessingIndicator !='' ){  // check ว่ามี ReferenceNumber

        $sqlInsertDomcumentControl = " UPDATE `documentcrotrol` SET `ProcessingIndicator` = '$ProcessingIndicator' WHERE `documentcrotrol`.`Reference_ID` = '$Reference_ID'"; 
          //$db->exec($sqlInsertDomcumentControl);
        $stmt1 = $db->prepare($sqlInsertDomcumentControl);
        $stmt1->execute();
            
  
                foreach($GoodsShip as $GoodsShipment) {
                     $Number = $GoodsShipment->getElementsByTagName('Number')->item(0)->childNodes->item(0)->nodeValue;
                     $TaxNumber1 = $GoodsShipment->getElementsByTagName('TaxNumber')->item(0)->childNodes->item(0)->nodeValue;
                     $Branch1 = $GoodsShipment->getElementsByTagName('Branch')->item(0)->childNodes->item(0)->nodeValue;
                     $SizeAndTypeCode = $GoodsShipment->getElementsByTagName('SizeAndTypeCode')->item(0)->childNodes->item(0)->nodeValue;
                     $Status = $GoodsShipment->getElementsByTagName('Status')->item(0)->childNodes->item(0)->nodeValue;
                     $Material = $GoodsShipment->getElementsByTagName('Material')->item(0)->childNodes->item(0)->nodeValue;
                     $PortOfLoading = $GoodsShipment->getElementsByTagName('PortOfLoading')->item(0)->nodeValue;
                     $PlaceOfOrigin = $GoodsShipment->getElementsByTagName('PlaceOfOrigin')->item(0)->nodeValue;
                     $PortOfDischarge = $GoodsShipment->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
                     $PlaceOfDelivery = $GoodsShipment->getElementsByTagName('PortOfDischarge')->item(0)->nodeValue;
                     $ShedNumberReleasePort = $GoodsShipment->getElementsByTagName('ShedNumberReleasePort')->item(0)->nodeValue;
                     $FinalPort = $GoodsShipment->getElementsByTagName('FinalPort')->item(0)->nodeValue;
                     $StowagePosition = $GoodsShipment->getElementsByTagName('PlaceOfDelivery')->item(0)->nodeValue;
                    // $eSealNumber = $GoodsShipment->getElementsByTagName('eSealNumber')->item(0)->nodeValue;
                     $CommodityName = $GoodsShipment->getElementsByTagName('CommodityName')->item(0)->nodeValue;
                     $TotalGrossWeight1 = $GoodsShipment->getElementsByTagName('Weight')->item(0)->childNodes->item(0)->nodeValue;
                     $TotalGrossWeightUnitcode1 = $GoodsShipment->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
                     $Remark = $GoodsShipment->getElementsByTagName('Remark')->item(0)->nodeValue;
                     $LastEntry = $GoodsShipment->getElementsByTagName('LastEntry')->item(0)->nodeValue;
                    
                 if($Material !='' ||$PortOfLoading){
                     $insertNumber = "UPDATE `containerinfo` SET `SizeAndTypeCode` = '$SizeAndTypeCode', `Material` = '$Material', `PortOfLoading` = '$PortOfLoading', `PlaceOfOrigin` = '$PlaceOfOrigin',  `Shed_Number` = '$ShedNumberReleasePort',  `CommodityName` = '$CommodityName', `Weight` = '$TotalGrossWeight1', `UnitCode` = '$TotalGrossWeightUnitcode1' , `Remark` = '$Remark' WHERE `containerinfo`.`Number` = '$Number' ";

                     $queryNumber = $db->prepare($insertNumber);
                     $queryNumber->execute();
                     echo "$insertNumber";
                    // $conNumber = $db->lastInsertId();      
                    header("Location: comeinmain.php");     
             }
         }
 }
 } 

}

$db= null;

// Goto View

?>

