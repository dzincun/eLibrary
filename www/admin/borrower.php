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
      <form id="form1" name="form1" method="post" action="borrower_process.php">
        <table cellpadding="5" cellspacing="0">
          <tr>
            <td colspan="2" align="center">FILL PROPERLY </td>
          </tr>
          <tr>
            <td width="94">Name</td>
            <td width="186"><label>
              <?php //require ('../include/inc_user.php')?>
            </label></td>
          </tr>
          <tr>
            <td>Select Titles </td>
            <td><label>
              <select name="book" id="book" onchange="showtitle(this.value)">
                <option>UNKNOWN</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><div id="txttitle"></div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><label>
              <input type="submit" name="Submit" value="Save" />
              <input type="reset" name="Submit2" value="Reset" />
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
