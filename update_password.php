 <?php
 include('admin/dbcon.php');
 include('session.php');
 //Prevenir SQL injection
function clean($str) {
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}
 $new_password  = clean($_POST['new_password']);
 mysql_query("update employe set EMP_PASSWORD = '$new_password' where EMP_ID = '$session_id'")or die(mysql_error());
 mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Modification du mot de passe ')")or die(mysql_error());
 ?>