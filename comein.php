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
    <link href="css/vessel.css" rel="stylesheet">
<script type="css/view.css"></script>

    
   
</head>
<body>

<?php include("menu.php"); ?>
    <div class="formoutput">
      <div class="transbox">
        <div class="abc">
          <center><h1>การอัพเดรตข้อมูล</h1></center>
        </div>       
          <div id="output">
            <center> <p><b><div class="title">อัพโหลดไฟล์&nbsp;XML</b></p></center></br>

            <form action="test_upfile.php" class="comment" method="post" enctype="multipart/form-data" name="upfile" id="upfile">
              <fieldset>
                <div class="form-group">
                  <input  class="form-control" placeholder="คอนเฟิร์มวันที่เรือ" type="DatePicker" name="datepicker" />
                    <script>
                           $('#datepicker').datepicker({ uiLibrary: 'bootstrap' });</script>
                </div>

                <div class="form-group">
                  <input type="text" placeholder="คอนเฟิร์มชื่อเรือเข้า" class="form-control id="birth" name="birth" required>
                </div>

                <div class="form-group">
                  <input type="text" placeholder="คอนเฟิร์ม SHED" class="form-control id="shed" name="shed" required>
                </div>

                <div class="form-group">
                  <input type="text" placeholder="คอนเฟิร์ม TERMINAL" class="form-control id="terminal" name="terminal" required>
                </div>

                <div class="form-group">
                  <input type="text" placeholder="คอนเฟิร์มเลขที่เรือ" class="form-control id="voy" name="voy" required>
                </div>

                <div class="form-group no-margin">
                  <input type="file" name="fileupload" class="form-control id="fileupload"  accept="xml" placeholder="FILECLIS" required="required"/>
                </div>

                <div class="form-group">
                  <input type="file" name="fileupload1" class="form-control id="fileupload1" accept="xml" placeholder="FILEMMAN" required="required"/>
                </div>

                <div class="form-actions">
                  <input type="submit" class="btn btn-block btn-lg btn-primary" name="button" id="button" value="อัพโหลดไฟล์" />
                  <span class="small-circle"></i></span>
                </div>
              </fieldset>
            </form>
          </div><br/>
        </div>
      </div>

  <footer>
    <div class="footer">
      <p>&copy;2018 S KRICHPHOL KHONSONG (1997) CO.,LTD.</p>
    </div>
  </footer>

</body>
</html>
