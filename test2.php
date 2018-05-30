<meta charset="UTF-8">
<?php
  include('controller/conn.php');  

  //  $fileupload1 = $_POST['fileupload1'];  
   // $fileupload2 = $_POST['fileupload2'];  
    $date = date("d-m-Y"); 
   // $upload1=$_FILES['fileupload1'];
    $upload2=$_FILES['fileupload2'];
    //start upload file 1


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
    
    $result1 = query($sql1) or die ("Error in query: $sql1 " . mysql_error());


 $sql2 = query("SELECT * FROM uploadfile", $link); 
        $result2 = mysql_fetch_array($sql2);
        $test2 = $result2['fileupload'];
        $path_test1 = "fileupload/".$test2;

       include("readmman.php");

    
 mysql_close($link); 
 die();
 ?>

