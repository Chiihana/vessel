<?php
//including the database connection file
include_once("controller/conn.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$sql = "DELETE FROM `uploadfile` WHERE `uploadfile`.`fileID`=:id";
$query = $db->prepare($sql);
$query->execute(array(':id' => $id));

header("Location: comeinmain.php");
 
?>