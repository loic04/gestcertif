<?php
		include('admin/dbcon.php');
		session_start();
         //Prevenir les sql injections
		 function clean($str) {
         $str = @trim($str);
         if(get_magic_quotes_gpc()) {
         $str = stripslashes($str);
         }
         return mysql_real_escape_string($str);
         }
		$username = clean($_POST['username']);
		$password = clean($_POST['password']);
		/* employe */
		$query_emp = mysql_query("SELECT * FROM employe WHERE EMP_LOGIN='$username' AND EMP_PASSWORD='$password'")or die(mysql_error());
		$num_row_emp = mysql_num_rows($query_emp);
		$row_emp = mysql_fetch_array($query_emp);
	     if ($num_row_emp > 0){
		$_SESSION['id']=$row_emp['EMP_ID'];
		echo 'true';
				
		mysql_query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row_emp['EMP_ID'].")")or die(mysql_error());
		 }
		 else{ 
				echo 'false';
		}	
				
		?>
