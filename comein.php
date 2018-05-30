<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="google-site-verification" content="V9Kcd0DPXdzVCrMret-je3Nc3mS8bD_wqHPpe3037UM" />
    <meta name="keywords" content="" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   
    <title>VESSEY SYSTEM</title>
     <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <link href="../css/vessel.css" rel="stylesheet">
<script type="../css/view.css"></script>

    <title>Bootstrap DatePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <script type="text/javascript">
    $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
</script> 
   

    <script type="text/javascript">$.ajax({
      url: 'ajax.php?param1=aaa&param2=bbb',
      success: function(data){
        $(#content).html(data);
      }
      });
    </script>

      <script type="text/javascript">
     function UPDATE{
        var id=confirm("ต้องการลบข้อมูลใช่หรือไม่?");
            if (id==true){
            }else{
                alert("ข้อมูลไม่ถูกลบออก")
            }
        return up;
        }
    </script>
   
</head>
<body>

     <?php
        include("menu.php");
    ?>
    <div class="container">
        <div class="transbox">
                                           
                    <div class="abc">
                    <hr >
                    <center><h1>การจัดการข้อมูลขาเข้า</h1></center>
                    <hr></div>            

  <form action="testreadclis.php" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
  <p>&nbsp;</p>
  <table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="40" colspan="2" align="center" bgcolor="#00cc99">อัพโหลดไฟล์&nbsp;XML</td>
    </tr>
    <tr>
      <td width="160" bgcolor="#CCFFCC">&nbsp;</td>
      <td width="574" bgcolor="#CCFFCC">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" bgcolor="#CCFFCC">เลือกไฟล์ XML CLIS</td>
      <td bgcolor="#CCFFCC"><label>
        <input type="file" name="fileupload1" class="form-control id="fileupload1"  accept="xml" required="required"/>
      </label></td>
    </tr>

     <tr>
      <td align="center" bgcolor="#CCFFCC">เลือกไฟล์ XML MMAN</td>
      <td bgcolor="#CCFFCC"><label>
        <input type="file" name="fileupload2" class="form-control id="fileupload2"  accept="xml" required="required"/>
      </label></td>
    </tr> 
    
    <tr>
      <td bgcolor="#CCFFCC">&nbsp;</td>
      <td bgcolor="#CCFFCC">&nbsp;</td>
    </tr>
    <tr>
      <td bgcolor="#CCFFCC">&nbsp;</td>
      <td bgcolor="#CCFFCC"><input type="submit" class="btn btn-primary" name="button" id="button" value="Upload" /></td>
    </tr>
    <tr>
      <td bgcolor="#CCFFCC">&nbsp;</td>
      <td bgcolor="#CCFFCC">&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
<br/></div></div>
<!-- <div id="output">
  <center> <p><b>UPLOADFILE</b></p></center></br>
 <label for="uname"><b>UPLOAD FILE XML CLIS</b></label>
<form action="testreadclis.php" method="POST" enctype="multipart/form-data" >
    <div class="input-group" >
      <input type="file" class="form-control id="fileupload1"" placeholder="Upload File" accept="xml"  name="fileupload1" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-upload"></i></button>
      </div>
    </div>
  </form>

  <label for="uname"><b>UPLOAD FILE XML MMAN</b></label>
<form action="test2.php" method="POST" enctype="multipart/form-data" >
    <div class="input-group" >
      <input type="file"  class="form-control id="fileupload2"" placeholder="Upload File" accept="xml"  name="fileupload2" >
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-upload"></i></button>
      </div>
    </div>
  </form>
</div> -->

<?php include("Views/modalconfirm.php"); ?>


<center><table border="1" cellpadding="0" cellspacing="0" width="750" >
                            <tr>
                                <td>
                                   ลำดับที่ 
                                </td>
                                <td>
                                  ชื่อไฟล์
                                </td>
                               
                            </tr>

<?php include("controller/conn.php");

if (isset($_GET['id'])) {

//SQL query for deletion.
}
$query = mysql_query("SELECT * FROM uploadfile where fileID ", $link); // SQL query to fetch data to display in menu.
 //$last_id = mysql_insert_id(); //
 $row = mysql_fetch_array($query);
while ($row = mysql_fetch_array($query)) {
 ?>
                            <tr>
                                <td>
                                    <?php echo $row["fileID"]; ?>
                                </td>
                                <td>
                                   <?php echo $row["fileupload"]; ?>
                                </td>
                    
                            </tr>
<?php
}?>
</table>
</center></br>


</div>
</div>

 

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                     <p>&copy;2018 S KRICHPHOL KHONSONG (1997) CO.,LTD.</p>
                </div>
            </div>
        </div>
    </footer>


</body>
</html>
