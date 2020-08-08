<?php ob_start();
session_start();
if (!isset($_SESSION['myusername'])) {
header("location:index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
<script type="text/javascript" language="javascript" src="../include/add.js"></script>
<script type="text/javascript" language="javascript" src="../include/add_subject.js"></script>
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
</head>

<body>
<div class="wrapper">
<?php include("top.php");?>  
  <!-- Main wrapper div starts here-->
  <div class="main_wrapper">
  
  <!-- Content wrapper div starts here-->
    <div class="content_wrapper">
   <p align="right"> <a href="javascript:history.go(-1)">previous page</a> || <a href="admin.php">admin</a></p>
      <h1>Страница библиотекаря<br />
      </h1>
          <?php 
$book_id = mktime();
$file_name = $book_id;
$checkBoxValue = $_POST['checkbox'];
require ('../connections/connect.php');
if ($checkBoxValue == 'checked'){
	require('upload_file.php');
	upload_file('../books', $file_name);
}
$exten = $_SESSION['exten'];
$title2=strtolower( $_POST['title']);
$title=ucwords( $title2);

$author=$_POST['author_id'];
$publisher=$_POST['publisher_id'];
$subject = $_POST['subject_id'];
$edition=$_POST['edition'];

$isbn = $_POST['isbn'];
// replace all instances of "Frank" with "Crazy Dan"
$newisbn = str_replace("-", "", $isbn);
$newisbn = trim($newisbn);

	//	echo  $_POST['author'];
	//	echo  $_POST['subject'];
//echo "ghghdhdsh";
//$isbn = $_POST['isbn'];

// if receive a valid file from server
if (isset ($_POST['author'])) {


  // checks the files received for upload
  for($f=0; $f<count($_POST['author']); $f++) {
    $author_list = $_POST['author'][$f];       // gets the name of the file
//echo $author_list;
    // checks to not be an empty field (the name of the file to have more then 1 character)
    if(strlen($author_list)>=1) {
		//echo  $author_list;

	$insert = mysql_query("insert into saved_author values ('$book_id', '$author_list' )");
	//mysql_query($insert) or die(mysql_error());


}
}
}
// if receive a valid file from server
if (isset ($_POST['subject'])) {
  // checks the files received for upload
  for($n=0; $n<count($_POST['subject']); $n++) {
    $subject_list = $_POST['subject'][$n];       // gets the name of the file
//echo $subject_list;
    // checks to not be an empty field (the name of the file to have more then 1 character)
    if(strlen($subject_list)>=1) {
	//echo $subject_list;

	$insert2 = mysql_query("insert into saved_subject values ('$book_id', '$subject_list' )");
//mysql_query($insert2) or die(mysql_error());

}
}
}

if ($checkBoxValue == 'checked'){
	$sqlb="insert into book_details (`book_id`,`title`,`publisher_id`,`edition`,`isbn`, `soft_copy`) values('$book_id','$title','$_POST[publisher_id]','$_POST[edition]','$newisbn', '$file_name.$exten')" or die(mysql_error());
}
else
{
	$sqlb="insert into book_details (`book_id`,`title`,`publisher_id`,`edition`,`isbn`, `soft_copy`) values('$book_id','$title','$_POST[publisher_id]','$_POST[edition]','$newisbn', '')" or die(mysql_error());
}

mysql_query($sqlb) or die(mysql_error());


echo "Книга успешно добавлена. Нажмите <a href='add_book.php'>сюда</a>, чтобы вернуться назад";

?>

    <p>&nbsp;</p>    </div>
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
<?php ob_flush();?>