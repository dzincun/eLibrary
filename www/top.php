 <script type="text/javascript" src="javascript/mootools.js"></script>
<script type="text/javascript" src="javascript/visualslideshow.js"></script>
<link rel="stylesheet" type="text/css" href="slideshow.css" media="screen" />
<style type="text/css">.slideshow a#vlb{display:none}</style>

 <div id="show" class="slideshow">
	<div class="slideshow-images">
<a href=""><img id="slide-0" src="data/images/dsc00108.jpg" alt="�������� 1" title="�������� 1" /></a>
<a href=""><img id="slide-1" src="data/images/017.jpg" alt="�������� 1" title="�������� 1" /></a>
<a href=""><img id="slide-2" src="data/images/020.jpg" alt="�������� 1" title="�������� 1" /></a>
<a href=""><img id="slide-3" src="data/images/022.jpg" alt="�������� 1" title="�������� 1" /></a>
<a href=""><img id="slide-4" src="data/images/admin.jpg" alt="�������� 1" title="�������� 1" /></a></div>
	</div>
<div class="top">
    <div class="menus">
    
	<?php 
	if (!isset($_SESSION['user_log'])) 
	{ 
		echo "<div class='menu'><a href='index.php'>��������</a></div>";
	} 
	
	if (isset($_SESSION['user_log'])) 
	{ 
		echo "<div class='menu'><a href='library.php'>����������</a></div>"; 
		//echo "<div class='menu'><a href='search_form2.php'>�������</a></div>";
	} 

	?>  
	<div class="menu"><a href="#">���� ����</a></div>
	<div class="menu"><a href="about.php">����������� ����</a></div>
	<div class="menu"><a href="about.php">PLATONUS</a></div>
    <div class="menu"><a href="about.php">� �����</a></div>

    <p align="right" style="padding-right:10px">
		<?php 
        $user_log = $_SESSION['user_log'];
        if (isset($_SESSION['user_log'])){
            echo "<a href='profile.php' style='color:#FFC'>������������ ���, $_SESSION[nameAndFamily] </a> ||  <a href='logout.php' style='color:#FFC'>�����</a>";
        }
        else{
            echo "<a href='admin/admin.php' style='color:#FFC'>���� ��� ������������</a>";
        }
        ?>
    </p>
</div>