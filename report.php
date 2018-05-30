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
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   

     <title>VESSEY SYSTEM</title>
    <!-- Custom CSS -->
    <link href="../css/vessel.css" rel="stylesheet">
     <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
    <script type="../css/view.css"></script>


    

</head>

<body>

     <?php
        include("menu.php");
    ?>

     <div class="container">
        <div class="transbox">                   
                <div class="abc">
                    
                  <center>
                        ยินดีต้อนรับเข้าสู่ระบบ
                    </h2>
                    <hr >
                    <h1>VESSEL SYSTEM</h1>
                    <hr> <h2></center> 
               
                


                    <form action="index.php" method="POST" enctype="multipart/form-data">
                     
                        <input type="file" name="ufile" />
                        <input type="submit" value="เปิด" value="Send File" /> </i>

                       <!--  <button style="font-size:24px;">เปิด <i class="material-icons">file_upload</i></button> -->
                   </form>
                     
                    <?php
                       // include("bottom.txt");

                    $xml=simplexml_load_file("ebxml_CLIS_DPXK000000633_20170127200227_0372_0000_M.xml") or die("Error: Cannot create object");
                    print_r($xml);
                    


                    ?>
                  </div>
            </div>
        </div>

    <!-- /.container -->
    <!-- /.container -->


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                     <p>&copy;2018 S KRICHPHOL KHONSONG (1997) CO.,LTD.</p>
                </div>
            </div>
        </div>


    </footer>

   


</script>

</body>

</html>
