<?php
ob_start();
session_start();
function upload_file($path, $new_name){
	//$userfile_error is size in bytes
	$userfile_error = $_FILES['file']['error'];
	if ($userfile_error > 0){
		echo '<div align=center><b>Problem: ';
		switch ($userfile_error){
			case 1: echo 'Document exceeded upload_max_filesize Go <a href="javascript:history.go(-1)">Back</a>'; break;
			case 2: echo 'Document exceeded 25KB Go <a href="javascript:history.go(-1)">Back</a>'; break;
			case 3: echo 'Document only partially uploaded Go <a href="javascript:history.go(-1)">Back</a>'; break;
			case 4: echo 'No Document uploaded Go <a href="javascript:history.go(-1)">Back</a>'; break;
			}
			exit;
		}
	/*$userfile_error = $_FILES['file']['error'];
	
	if($userfile_error==4){
	echo 'You have not attached a passport photograph. Go <a href="javascript:history.go(-1)">Back</a> and attach it';
	exit;
	}
*/
	//$userfile where file went on webserver
	$userfile = $_FILES['file']['tmp_name'];

	//$userfile_name is original fie name
	$userfile_name = $_FILES['file']['name'];

	//$userfile_size is size in bytes
	//$userfile_size = $_FILES['file']['size'];

	//$userfile_type is mime type
	$userfile_type = $_FILES['file']['type'];
	
	$extension = explode('.',$userfile_name);

	$exten = $extension[1];
	$_SESSION['exten'] = $exten;
	if (($exten != 'pdf') && ($exten != 'PDF')){
			echo '<div align=center><b>Ваш документ должен быть в формате PDF. <br>Отправленный документ: '.$userfile_name.' Вернуться <a href="javascript:history.go(-1)">назад</a> и выбрать другой документ для загрузки';
			exit;
	}
		global $newfile_name;
		
		$newfile_name = mktime().'.'.$extension[1];

	//put file in the right directory/* || ($userfile_type != 'image/gif'))*/
	$upfile = $path.'/'.$newfile_name;
	
	if (is_uploaded_file($userfile)){
		if (!move_uploaded_file($userfile, $upfile)){
			echo 'Невозможно перенести файл в выбранную директорию';
			exit;
		}
	}
	else {
		echo 'Problem: Possible file upload attack. Filename: '.$userfile_name;
		exit;
	}
}	
ob_flush();
?>