<?php
include('dbcon.php');
if (isset($_POST['delete_service'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
  mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Supprimer Service $id[$i]   ')")or die(mysql_error());
	$result = mysql_query("DELETE FROM service where SERV_ID='$id[$i]'");
}
header("location: localisation.php");
}
?>