
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
    <!-- Custom CSS -->
    <link href="../css/vessel.css" rel="stylesheet">
     <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Script to Activate the Carousel -->
    <script type="../css/view.css"></script>

    <style>
body {
  background: #fff;
}
.container {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 768px) {
  .container {
    width: 750px;
  }
}
@media (min-width: 992px) {
    width: 970px;
  }
}
@media (min-width: 1200px) {
  .container {
    width: 1170px;
  }
}

div.transbox {
  margin: 1px;
  background-color: #4CAF50;
  border: 1px;
  opacity: 0.8;
  filter: alpha(opacity=80); /* For IE8 and earlier */
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
}
#output{
    max-width: 480px;
    margin: 10px auto;
    margin-top: 100px;
    background-color: #00666a;
    padding: 10px;
    box-shadow: 0px 0px 10px #cccccc;

    border-radius: 10px;
}
</style>

</head>

<body>

     <?php
        include("menu.php");
    ?>

    <div class="container">
                    <div id="output">
                        <center> <p><b><div class="title">LOGIN</b></p></center></br>
                                <div class="content1">
                                
                                <form class="comment" action="" method="post">
                                 <fieldset>
                                        <div class="form-group no-margin">
                                                <input id="username" name="username" type="username" class="form-control input-lg" placeholder="USERNAME">
                                        </div>
                                        <div class="form-group">
                                                <input id="password" name="password" type="password" class="form-control input-lg" placeholder="PASSWORD">
                                        </div>
                                    </fieldset>

                                    <div class="form-actions">
                                        <button type="submit" value="Log-In" name="submit" class="btn btn-block btn-lg btn-primary">
                                            <span class="small-circle"></i></span>
                                            <small>SUBMIT</small>
                                        </button>
                                        <button type="reset" value="Reset" class="btn btn-block btn-lg btn-danger">
                                        <span class="small-circle"></i></span>
                                            <small>CANCLE</small>
                                        </button>
                                        <center>
                                        <table>
                                          <tr>
                                            <th><a href="signup.php">&emsp;Forgot Password </a></th>
                                            <th></th>
                                          </tr>
                                        </table>
                                       </center>
                                     </div>   
                                </form>
                              </div>
                          </div>
    </div>
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
