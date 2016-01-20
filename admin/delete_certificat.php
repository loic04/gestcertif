<?php
include('dbcon.php');
if (isset($_POST['delete_certificat'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
    mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Supprimer Certificat $id[$i] ')")or die(mysql_error());
	$result = mysql_query("DELETE FROM certificat where cert_id='$id[$i]'");
}
header("location: certificats.php");
}
?>