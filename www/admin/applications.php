<?php 
session_start();
if (!isset($_SESSION['myusername'])) {
//echo 'no permission';
header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<script language="javascript" src="../connections/add.js"></script>
<script language="javascript" src="../connections/add_subject.js"></script>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function getData(x, userVAR, bookVAR, xy){
	var xhr = new XMLHttpRequest();
	
	xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    //alert(xhr.responseText);
                }
            }
	
	xhr.open("POST", "applicationsRequests.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	var indexTable = x.parentNode.parentNode.rowIndex;
	
	//var user_id = document.getElementById("myTable").rows[indexTable].cells.item(0).innerHTML;
	xhr.send("user="+userVAR+"&book="+bookVAR+"&xy="+xy);
	window.location = 'applications.php';
	//document.getElementById("myTable").deleteRow(indexTable);
}
</script>

<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   <p align="right"> <a href="javascript:history.go(-1)">Назад</a> || <a href="admin.php">Главная</a></p>
      <h1>Страница библиотекаря</h1>
      <?php 
//session_start();
require ('../connections/connect.php');


$sql3="SELECT * FROM borrow_details WHERE status = 1" or die(mysql_error());
$result3= mysql_query($sql3)or die(mysql_error());
$count3=mysql_num_rows($result3);
if($count3>=1){
	echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Начните вводить'>";
	echo '<table id=myTable border=2px>';
	
//$i = 0;
while($row3=mysql_fetch_array($result3)){
	echo '<tr>';
	
	$bookId = $row3['book_id'];
	
	$sql_1  = "SELECT title FROM book_details WHERE book_id = '$bookId'";
	$executeSQL_1 = mysql_query($sql_1);
	$result_1 = mysql_fetch_array($executeSQL_1);
	
	$userId = $row3['user_id'];
	//echo '<td>'.$userId.'</td>';
	
	$sql_2  = "SELECT userName, userFamily FROM users WHERE id = '$userId'";
	$executeSQL_2 = mysql_query($sql_2);
	$result_2 = mysql_fetch_array($executeSQL_2);
	
	echo '<td>'.$result_2[userName].' '.$result_2[userFamily].'</td>';
	echo '<td>'.$result_1[title].'</td>';
	
	echo '<td><input type="button" onclick="getData(this, '.$userId.', '.$bookId.', 1);" value="Разрешить"/></td>';
	echo '<td><input type="button" onclick="getData(this, '.$userId.', '.$bookId.', 0);" value="Отказать"/></td>';
	echo '</tr>';
	//$i++;
}
echo '</table>';
}
else
{
	echo 'Нет заявок на взятие книг';
}
?>
      </span>
      <p>&nbsp;</p><p><!-- Content wrapper div ends here-->
  
  <!-- Right wrapper div starts here-->
</p>
    </div><div id="side_bar">
	<?php include("admin2.php");?>      
    </div>
    <!-- Right wrapper div ends here-->
<div class="clr"></div>
        <div><img src="../images/edge_bottom.jpg" border="0" /></div>
  </div>
  <p>

  <!-- Main wrapper div ends here-->
</div>
</body>

</html>
