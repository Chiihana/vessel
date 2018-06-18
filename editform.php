<?php
// including the database connection file
include_once("controller/conn.php");
 
if(isset($_POST['submit']))
{    
    $id = $_GET['fileID'];
    
    $ConfirmBerthDate= $_POST['ConfirmBerthDate'];
    $CallSign= $_POST['CallSign'];
    $down_number= $_POST['down_number'];
    $terminal_number= $_POST['terminal_number'];
    $voyage_number= $_POST['voyage_number'];    
    
    // checking empty fields
    if($CallSign !='') {    

        //updating the table
        $sql = "UPDATE uploadfile SET ConfirmBerthDate ='$ConfirmBerthDate',CallSign ='$CallSign', down_number ='$down_number', terminal_number ='$terminal_number', voyage_number ='$voyage_number' WHERE fileID = '$id' ";
        $query = $db->prepare($sql);
                
        $query->bindparam(':fileID', $id);
        $query->bindparam(':ConfirmBerthDate', $ConfirmBerthDate);
        $query->bindparam(':CallSign', $CallSign);
        $query->bindparam(':down_number', $down_number);
        $query->bindparam(':terminal_number', $terminal_number);
        $query->bindparam(':voyage_number', $voyage_number);
        $query->execute();
        
        // Alternative to above bindparam and execute
        // $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
                
        //redirectig to the display page. In our case, it is index.php
        header("Location: comein.php");
    }
}
?>