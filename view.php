<!DOCTYPE html>
<head>    
    <title>Edit Data</title>


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
    <link href="css/vessel.css" rel="stylesheet">
<script type="css/view.css"></script>

</head>
<body>
   

<?php
include("controller/conn.php");
//getting id from url
$id = $_GET['vid'];

 
//selecting data associated with this particular id
$sql = "SELECT * FROM `uploadfile` WHERE `uploadfile`.`fileID`=$id";
$query = $db->prepare($sql);
$query->execute(array(':fileID' => $id));
 
    while($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $ConfirmBerthDate = $row['ConfirmBerthDate'];
        $CallSign = $row['CallSign'];
        $down_number = $row['down_number'];
        $terminal_number = $row['terminal_number'];
        $voyage_number = $row['voyage_number'];
   }

    include("menu.php");
?>

    <div class="formoutput">
        <div class="transbox">
                                           
            <div class="abc">
                <center><h1>การจัดการข้อมูล</h1></center>
            </div>       
                <div id="output">
                   <center> <p></p></center></br>
                    <form action="edit.php" class="comment" method="POST" >
                        <fieldset>
                        <div class="form-group">
                            <input  class="form-control" placeholder="คอนเฟิร์มวันที่เรือ" type="DatePicker" name="datepicker" value="<?php echo $ConfirmBerthDate;?>" />
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์มชื่อเรือเข้า" class="form-control  name="birth" value="<?php echo $CallSign;?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์ม SHED" class="form-control name="shed" value="<?php echo $down_number;?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์ม TERMINAL" class="form-control  name="terminal" value="<?php echo $terminal_number;?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์มเลขที่เรือ" class="form-control  name="voy" value="<?php echo $voyage_number;?>" required>
                        </div>

                        </fieldset>
                    </form><br/>
                </div>
                
                <center><div>
                    <?php echo "<b><a href=\"Views/LCL.php?lid={$row['fileID']}\" class=\"btn btn-warning\">STATUS LCL</a></b>"; ?>
                    <?php echo "<b><a href=\"Views/FCL.php?fid={$row['fileID']}\" class=\"btn btn-success\">STATUS FCL</a></b>"; ?>
                    <?php echo "<b><a href=\"Views/FCLCFS.php?cid={$row['fileID']}\" class=\"btn btn-primary\">STATUS FCL/CFS</a></b>"; ?>
                    <?php echo "<b><a href=\"Views/opencontainers.php?oid={$row['fileID']}\" class=\"btn btn-primary\">แบบอนุญาติเปิดตู้</a></b>"; ?>
                </div></br></center>
        </div><?php  ?>
    </div>

  <footer>
    <div class="footer">
      <p>&copy;2018 S KRICHPHOL KHONSONG (1997) CO.,LTD.</p>
    </div>
  </footer>


</body>
</html>