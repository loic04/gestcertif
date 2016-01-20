<?php
include('dbcon.php');
if (isset($_POST['delete_client'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
    mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Supprimer Client $id[$i]   ')")or die(mysql_error());
	$result = mysql_query("DELETE FROM client where client_id='$id[$i]'");
}
header("location: clients.php");
}
?>