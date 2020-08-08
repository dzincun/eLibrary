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


$sql3="SELECT * FROM book_details" or die(mysql_error());
$result3= mysql_query($sql3)or die(mysql_error());
$count3=mysql_num_rows($result3);
if($count3>=1){
	echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='Начните вводить'>";
	echo '<table id=myTable border=2px>';
	
//$i = 0;
echo '<form action=deleteBook.php method=POST>';
while($row3=mysql_fetch_array($result3)){
	echo '<tr>';
	
	//echo '<td>';
	//echo '<input type="checkbox" id="checkbox" name="names[]" value="'.$i.'"/>';
	//echo '</td>';
	echo '<td><input type=checkbox name=books_delete[] id=books_delete value='.$row3[book_id].'></td>';
	$title= $row3['title'];
	echo '<td>'.$title.'</td>';
	$book_id= $row3['book_id'];
	
	if ($row3['soft_copy'] != null){
		echo '<td><a href=../books/'.$book_id.'.pdf target=_blank>'.'Открыть книгу'.'</a></td>';
	}
	else
	{
		echo '<td>Только в библиотеке</td>';
	}

	$isbn= $row3['isbn'];
	echo '<td>'.$isbn.'</td>';
	$edition= $row3['edition'];
	echo '<td>'.$edition.'</td>';
	echo '<td><a href=editBook.php?bookId='.$book_id.'>Редактировать</a></td>';
	echo '</tr>';
	//$i++;
}
echo '<input type=submit name=submit id=submit value=Удалить>';
echo '</form>';
echo '</table>';
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
