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
        $(#content).html(data); } });
    </script>

     
   
</head>
<body>

<?php 

include("controller/conn.php");

//$id = $_POST['fileID'];

$perpage = 10;
//$id = $_GET['fileID'];
 if (isset($_POST['page'])) {
 $page = $_POST['page'];
 } else {
 $page = 1;
 }

 $start = ($page - 1) * $perpage;

$query = "SELECT * FROM `uploadfile` ORDER BY `fileID` DESC limit {$start} , {$perpage}"; // SQL query to fetch data to display in menu.
$query_db = $db->prepare($query);
$query_db->execute();

include("menu.php"); 
?>
    <div class="formoutput">
        <div class="transbox">                            
            <div class="abc">
                <center><h1>การจัดการข้อมูลขาเข้า</h1></center>
            </div><br/>

        <a href="comein.php"><button class="btn btn-info">อัพโหลดไฟล์ XML</button></a><br/></br>
        <center><table class="table table-hover">
            <tr>
                <td>ลำดับที่</td>
                <td>วันที่เรือเข้า</td>
                <td>ชื่อเรือ</td>
                <td>เลขที่เรือ</td>
                <td>ข้อมูล SHED</td>
                <td>ข้อมูล TERMINAL</td>
                <td>PRINT</td>
                <td>EDIT</td>
                <td>DELETE</td>
            </tr>

<?php 

while($row = $query_db->fetch()){  ?>
            <tr>
                <td><?php echo $row['fileID'] ."\t"; ?></td>
                <td><?php echo $row['ConfirmBerthDate'] ."\t"; ?></td>
                <td><?php echo $row['CallSign'] ."\t"; ?></td>
                <td><?php echo $row['down_number'] ."\t"; ?></td>
                <td><?php echo $row['terminal_number'] ."\t"; ?></td>
                <td><?php echo $row['voyage_number'] ."\t"; ?></td>

                <td><div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" class="drop-edit" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-zoom-in"></i><span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><?php echo "<a href=\"Views/LCL.php?lid={$row['fileID']}\" class=\"btn btn-success\">LCL</a>"; ?></li>
                            <li><?php echo "<a href=\"Views/FCL.php?fid={$row['fileID']}\" class=\"btn btn-success\">FCL</a>"; ?></li>
                            <li><?php echo "<a href=\"Views/FCLCFS.php?cid={$row['fileID']}\" class=\"btn btn-success\">FCLCFS</a>"; ?></li>
                            <li><?php echo "<a href=\"Views/tally_sheet.php?tid={$row['fileID']}\" class=\"btn btn-success\">Tally_Sheet</a>"; ?></li>
                        </ul>
                    </div>
                </td>
            
            <td><?php echo "<b><a href=\"edit.php?eid={$row['fileID']}\" class=\"btn btn-info\" ><span class=\"glyphicon glyphicon-pencil\" ></span></a></b>"; ?></td>
            <td><?php echo "<b><a href=\"delete.php?id={$row['fileID']}\" class=\"btn btn-danger\" onclick=\"return confirm('ต้องการลบข้อมูลใช่หรือไม่?')\"><span class=\"glyphicon glyphicon-trash\" ></span></a></b>"; ?></td>
<!-- <input type=\"button\" class=\"submit\" onclick=\"return deleletconfig()\" /> -->
            </tr>

<?php } 
$sql2 = "SELECT * FROM `uploadfile` ORDER BY `fileID` DESC";
$query2 = $db->prepare($sql2);
$query2->execute();
$total_record = $query2->fetchColumn();
$total_page = ceil($total_record / $perpage);
?>
        </table>
    </center>
</br>


        <nav>
            <ul class="pagination">
                <li><a href="comeinmain.php?page=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
            </li>
        <?php for($i=1;$i<=$total_page;$i++){ ?>
                <li><a href="comeinmain.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>
                <li><a href="comeinmain.php?page=<?php echo $total_page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
            </ul>
        </nav>

    </div>
</div>

<?php 

$conn = null;
?>


<footer>
    <div class="footer">
        <p>&copy;2018 S KRICHPHOL KHONSONG (1997) CO.,LTD.</p>
    </div>
</footer>


</body>
</html>
