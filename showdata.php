<center><table border="1" cellpadding="0" cellspacing="0" width="750" >
                            <tr>
                                <td>
                                   ลำดับที่ 
                                </td>
                                <td>
                                  ชื่อไฟล์
                                </td>
                                <td>
                                </td>
                            </tr>

<?php include("controller/connect.php");
if (isset($_GET['id'])) {
$up = $_GET['id'];
//SQL query for deletion.
}
$query = mysql_query("SELECT * FROM uploadfile order by fileID desc", $link); // SQL query to fetch data to display in menu.
while ($row = mysql_fetch_array($query)) { ?>
                            <tr>
                                <td>
                                    <?php echo $row["fileID"]; ?>
                                </td>
                                <td>
                                 <?php echo "$row["fileID"]<a href=\"readclis.php?id={$row['fileID']}\">" ?>
                                </td>
                              
                                <td>
                                <?php echo "<b><a href=\"readclis.php?id={$row['fileID']}\"><input type=\"button\" class=\"submit\" onclick=\"return deleletconfig()\" value=\"up\"/></a></b>"; ?>
                                </td>
                            </tr><?php
}


?></table></center>