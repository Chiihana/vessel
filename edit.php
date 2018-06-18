
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

include("controller/conn.php")
//getting id from url
$id = $_POST['eid'];

//selecting data associated with this particular id
$sql = "SELECT * FROM `uploadfile` WHERE `uploadfile`.`fileID`=$id";
$query = $db->prepare($sql);
$query->execute(array(':fileID' => $id));
 
    while($row = $query->fetch(PDO::FETCH_ASSOC))
    {   $fileID = $row["fileID"];
        $ConfirmBerthDate = $row['ConfirmBerthDate'];
        $CallSign = $row['CallSign'];
        $down_number = $row['down_number'];
        $terminal_number = $row['terminal_number'];
        $voyage_number = $row['voyage_number'];
    
    include("menu.php");
?>
    
    <div class="formoutput">
        <div class="transbox">
            <div class="abc">
                <center><h1>การอัพเดรตข้อมูลขาเข้า</h1></center>
            </div>       
                <div id="output">
                   <center> <p><b><div class="title">การอัพเดรตข้อมูลขาเข้า</b></p></center></br>
                    
                    <form action="testedit.php" class="comment" method="post" enctype="multipart/form-data">
                        <fieldset>
                        <div class="form-group">
                          <input  class="form-control" placeholder="คอนเฟิร์มวันที่เรือ" type="DatePicker" name="ConfirmBerthDate" value="<?php echo $ConfirmBerthDate;?>" />
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์มชื่อเรือเข้า" class="form-control  name="CallSign" value="<?php echo $CallSign;?>" required>
                        </div>
                          
                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์ม SHED" class="form-control name="down_number" value="<?php echo $down_number;?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์ม TERMINAL" class="form-control  name="terminal_number" value="<?php echo $terminal_number;?>" required>
                        </div>

                        <div class="form-group">
                            <input type="text" placeholder="คอนเฟิร์มเลขที่เรือ" class="form-control  name="voyage_number" value="<?php echo $voyage_number;?>" required>
                        </div>

                        <div class="form-actions">
                             <input type="hidden" name="id" class="btn btn-block btn-lg btn-primary" value="submit<?php echo $_GET['editid'];?>">
                            <input type="submit" name="submit" class="btn btn-block btn-lg btn-primary" value="Update">
                        </div>
                        <?php } ?>
                        </fieldset>
                    </form>
                </div><br/>
            </div>
        </div>
    </div>

  <footer>
    <div class="footer">
      <p>&copy;2018 S KRICHPHOL KHONSONG (1997) CO.,LTD.</p>
    </div>
  </footer>

</body>
</html>