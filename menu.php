<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<div class="topnav" id="myTopnav">
   <div class="icon-bar">
        <a class="active" href="index.php"><i class="fa fa-home"></i></a> </div>
  <a href="#HOME" class="active">ASSEL SYSTEM</a>
                        <a href="comeinmain.php">การจัดการด้านขาเข้า</a>
                        <a href="report.php">การจัดการข้อมูลขาออก</a>
                        <a href="receive.php">ออกใบเสร็จ</a>
                        <a href="searching.php">ค้นหาข้อมูล</a>
                        <a href="about.php">เกี่ยวกับ</a>
    <a href="signup.php" class="barright"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
    <a href="login.php" class="barright2"><span class="glyphicon glyphicon-log-in"></span> Login</a>
  <a href="javascript:void(0);" style="font-size:22px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<style>
.topnav {
  overflow: hidden;
  background-color: #339999;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 25px 30px;
  text-decoration: none;
  font-size: 17px;
}
.barright{
  float: right;
  display: block;

}
.barright2{
  float: right;
  display: block;

}

.topnav a:hover {
  background-color: #006666;
  color: black;
}

.active {
  background-color: #339999;
  color: white;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

.bar1, .bar2, .bar3 {
    width: 35px;
    height: 5px;
    background-color: #333;
    margin: 6px 0;
    transition: 0.4s;
}

.change .bar1 {
    -webkit-transform: rotate(-45deg) translate(-9px, 6px);
    transform: rotate(-45deg) translate(-9px, 6px);
}

.change .bar2 {opacity: 0;}

.change .bar3 {
    -webkit-transform: rotate(45deg) translate(-8px, -8px);
    transform: rotate(45deg) translate(-8px, -8px);
}

</style>

