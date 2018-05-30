  <?php 
  $doc = new DOMDocument();
    $doc->load($path_test1);

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
        $PlaceOfDelivery = $GoodsShipment->item($z)->getElementsByTagName('PlaceOfDelivery')->item(0)->nodeValue;
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

         $query_test = ("INSERT INTO `vessel`.`goodsshipment` (`Master_ID`,`MasterBL`,`PortOfLoading`,`Shed_Number`,`ShipperInfoName`,`ShipperInfoNameAndAddress`,`ShipperInfoCountryCode`,`TotalGrossWeight`,`TotalGrossWeightUnitcode`,`Amount`,`UnitCode`,`ShippingMarks`,`CargoMovement`,`DescriptionOfGoods`,`LastEntry`) VALUES (NULL,'$MasterBL', '$PortOfLoading')");
            echo $query_test;
        $queryA = mysql_query($query_test, $link);
         $z++;
        }

        $query_test1 = ("INSERT INTO `vessel`.`documentcontrol` (`Reference_ID`,`ReferenceNumber`,`ReceivedControlNumber`,`ShipAgent_Tax`,`Container_Tax`,`ProcessingIndicator`,`Callsign`,`VoyageNumber`,`RegistrationID`,`BerthDate`,`Status`) VALUES (NULL,'$ReferenceNumber','$ReceivedControlNumber','$TaxNumber1','$TaxNumber2','$Callsign','$VoyageNumber','$BerthDate','$RegistrationID')");
        $queryB = mysql_query($query_test1, $link);

// if($MasterBL !=''  ||$ShipperInfoName !=''){ 
    
// //Insert Query of SQL
//  $query5 = mysql_query("INSERT INTO `vessel`.`mman` (`MasterBL`, `ShipperInfoName`) VALUES ('$MasterBL', '$ShipperInfoName');
// ");
//   mysql_query($query5,$link);
// }
// if($ContainerNumber !=''  ||$ContainerStatus !=''){ 
    
// //Insert Query of SQL
//  $query6 = mysql_query("INSERT INTO `vessel`.`ContainerInfo` (`MasterBL`, `ShipperInfoName`) VALUES ('$ContainerNumber', '$ContainerStatus');
// ");
//   mysql_query($query6,$link);
// }
 ?>