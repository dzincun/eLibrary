<?php session_start();
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
<link rel="stylesheet" type="text/css" href="../style.css" />
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   <p align="right"> <a href="javascript:history.go(-1)">�����</a> || <a href="admin.php">�������</a></p>
      <h1>�������� ������������<br />
      </h1>
          <p>
         <script type="text/javascript">
 function readySubmit(){
if(confirm("�� ������������� ����������� ������� ������ ���������?")){
return true;
}
else{
return false;
}
}
 function readySubmit2(){
if(confirm("�� ������������� ����������� ������ �������������� ������ ���������?")){
return true;
}
else{
return false;
}
}
</script>
<!--
<?php 
echo '<a href="list_subject_process.php?lett=a&letter=A">A</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=b&letter=B">B</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=c&letter=C">C</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=d&letter=D">D</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=e&letter=E">E</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=f&letter=F">F</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=g&letter=G">G</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=h&letter=H">H</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=i&letter=I">I</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=j&letter=J">J</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=k&letter=K">K</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=l&letter=L">L</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=m&letter=M">M</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=n&letter=N">N</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=o&letter=O">O</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=p&letter=P">P</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=q&letter=Q">Q</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=r&letter=R">R</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=s&letter=S">S</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=t&letter=T">T</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=u&letter=U">U</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=v&letter=V">V</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=w&letter=W">W</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=x&letter=X">X</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=y&letter=Y">Y</a> &nbsp;&nbsp;
<a href="list_subject_process.php?lett=z&letter=Z">Z</a>';
?>
-->
<?php
require ('../connections/connect.php');
//$test=$_GET["lett"];
//$test2=$_GET["letter"];
$sql="SELECT * FROM subject " or die(mysql_error());
$result= mysql_query($sql)or die(mysql_error());
$count=mysql_num_rows($result);
// If result matched, table row must be greater than 1 row
$sn=1;
if($count>=1){
echo "<table border=1 cellpadding = 10 >";
echo "<tr><td>�</td><td> ��������� </td><td>�������� 1</td><td>�������� 2</td></tr>";
while($row=mysql_fetch_array($result)){
$subject_id= $row['subject_id'];		
$subject_name= $row['subject_name'];

//if 	($subject_name[0]==$test || $subject_name[0] == $test2){
 echo "<tr><td>$sn</td><td>$subject_name</td><td><form  action=edit_subject.php onSubmit=return(readySubmit2())><input type=hidden name=id value=$subject_id><input type=submit value=�������������� ></form></td><td><form  action=delete_subject.php onSubmit=return(readySubmit())><input type=hidden name=id value=$subject_id><input type=submit value=������� ></form></td></tr>";
 $sn++;
//}

}
echo "</table>";
}
?>
</span></p>    
          </div>
    <!-- Content wrapper div ends here-->
    
    <!-- Right wrapper div starts here-->
      <div id="side_bar">
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
