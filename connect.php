<!DOCTYPE html>
<html>
<header>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8"/>
</header>
<body>
<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'btngoc') or die ('Không thể kết nối tới database'. mysqli_connect_error());
	mysqli_set_charset($conn, 'UTF8'); 
?>