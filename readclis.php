<?php   

        $doc = new DOMDocument();
        //$doc = new DOMDocument();
        //$doc->load($path1);

        $doc->load($path_test);
  
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
    $PlaceOfDelivery = $GoodsShipment->item($z)->getElementsByTagName('PlaceOfDelivery')->item(0)->nodeValue;
    $ShedNumberReleasePort = $GoodsShipment->item($z)->getElementsByTagName('ShedNumberReleasePort')->item(0)->nodeValue;
    $FinalPort = $GoodsShipment->item($z)->getElementsByTagName('FinalPort')->item(0)->nodeValue;
    $StowagePosition = $GoodsShipment->item($z)->getElementsByTagName('StowagePosition')->item(0)->nodeValue;
    //$eSealNumber = $GoodsShipment->item($z)->getElementsByTagName('eSealNumber')->item(0)->nodeValue;
    $CommodityName = $GoodsShipment->item($z)->getElementsByTagName('CommodityName')->item(0)->nodeValue;
    $TotalGrossWeight1 = $GoodsShipment->item($z)->getElementsByTagName('Weight')->item(0)->childNodes->item(0)->nodeValue;
    $TotalGrossWeightUnitcode1 = $GoodsShipment->item($z)->getElementsByTagName('UnitCode')->item(0)->childNodes->item(0)->nodeValue;
    $LastEntry = $GoodsShipment->item($z)->getElementsByTagName('LastEntry')->item(0)->nodeValue;
   

    $query_test = ("INSERT INTO `vessel`.`containerinfo` (`con_Number`,`Number`,`SizeAndTypeCode`,`Status`,`Material`,`PortOfLoading`,`PlaceOfOrigin`,`Shed_Number`,`StowagePosition`,`CommodityName`,`Weight`,`UnitCode`,`Remark`,`LastEntry`) VALUES (NULL,'$Number','$SizeAndTypeCode','$Status','$Material','PortOfLoading','PlaceOfOrigin','$ShedNumberReleasePort','$StowagePosition','$CommodityName','$TotalGrossWeight1','$TotalGrossWeightUnitcode1','$LastEntry')");
    $queryA = ($query_test, $link);

    echo $queryA;

         $z++;
        }

        $query_test1 = ("INSERT INTO `vessel`.`clis` (`ReferenceNumber`,`ReceivedControlNumber`) VALUES ('$ReferenceNumber','$ReceivedControlNumber')");
    $queryA = ($query_test1);


?>