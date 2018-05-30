<meta charset="UTF-8">
<?php
  include('controller/conn.php');  

  //  $fileupload1 = $_POST['fileupload1'];  
   // $fileupload2 = $_POST['fileupload2'];  
    $date = date("d-m-Y"); 
    $upload1=$_FILES['fileupload1'];
  //  $upload2=$_FILES['fileupload2'];
    //start upload file 1

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
    //finished upload file1

//reading file xml to database
         
        $sql4 = mysql_query("SELECT * FROM uploadfile", $link); 
        //$sql4 = ("SELECT * FROM uploadfile", $link); 
        //$db_query1= mysql_query($sql4);
        $result1 = mysql_fetch_array($sql4);
        $test = $result1['fileupload'];
        $path_test = "fileupload/".$test;
    
       include("readclis.php");

    
 mysql_close($link); 
 die();
 ?>

