<?php session_start();?>
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

<link rel="stylesheet" type="text/css" href="../style.css" />
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
      <h1>Страница библиотекаря</h1>
      <form action="user_process.php" method="post" name="form1" id="form1" onsubmit="MM_validateForm('name','','R','phone','','R','address','','R');return document.MM_returnValue">
        <table align="center" cellpadding="5" cellspacing="0">
          <tr>
            <td colspan="2" align="center">Заполняйте все поля правильно </td>
          </tr>
		  
		  <tr>
            <td width="82">Имя</td>
            <td width="313"><label>
              <input name="name" type="text" id="userName" />
            </label></td>
          </tr>
		  
		  <tr>
            <td width="82">Фамилия</td>
            <td width="313"><label>
              <input name="name" type="text" id="userFamily" />
            </label></td>
          </tr>		  
		  
          <tr>
            <td width="82">Login</td>
            <td width="313"><label>
              <input name="name" type="text" id="name" />
            </label></td>
          </tr>
          <tr>
            <td>Адрес</td>
            <td><label>
              <textarea name="address" id="address"></textarea>
            </label></td>
          </tr>
          <tr>
            <td>Телефон</td>
            <td><label>
              <input name="phone" type="text" id="phone" />
            </label></td>
          </tr>
          <tr>
            <td>Статус</td>
            <td><label>
              <select name="status" id="status">
                <option>Выберите статус</option>
                <option value="Staff">Сотрудник</option>
                <option value="Student">Студент</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="Создать" />
              <!--<input type="reset" name="Submit2" value="Reset" />-->
            </label></td>
          </tr>
        </table>
      </form>
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
