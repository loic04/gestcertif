<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>
    <body>
		<?php include('navbar_employe.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('employe_sidebar.php'); ?>
                <div class="span6" id="content">
                      <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Modifier Profil</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
							
									<?php
									$query = mysql_query("select * from employe where EMP_ID = '$session_id' ")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
										
										
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['EMP_LOGIN']; ?>" name="pseudo" id="focusedInput" type="text" placeholder = "Pseudo" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['EMP_NOM']; ?>" name="nom" id="focusedInput" type="text" placeholder = "Nom" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['EMP_PRENOM']; ?>" name="prenom" id="focusedInput" type="text" placeholder = "Prénoms" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['EMP_JOB']; ?>" name="job" id="focusedInput" type="text" placeholder = "Emploi" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['EMP_MAIL']; ?>" name="mail" id="focusedInput" type="text" placeholder = "Mail" required/>
                                          </div>
                                        </div>
									
									<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['EMP_PHONE']; ?>" name="phone" id="focusedInput" type="text" placeholder = "Telephone 1 " required/>
                                          </div>
                                        </div>
										 
									
									
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
				   <?php
                            if (isset($_POST['update'])) {
                        //Prevenir les sql injections
                           function clean($str) {
                           $str = @trim($str);
                           if(get_magic_quotes_gpc()) {
                           $str = stripslashes($str);
                            }
                         return mysql_real_escape_string($str);
                            }
							
														//récupérer les données du formulaire
$pseudo=clean($_POST["pseudo"]);
$nom=clean($_POST["nom"]);
$prenom=clean($_POST["prenom"]);
$job=clean($_POST["job"]);
$mail=clean($_POST["mail"]);
$phone=clean($_POST["phone"]);

								
								
								$query = mysql_query("select * from employe where EMP_ID = '$pseudo' ")or die(mysql_error());
								$count = mysql_num_rows($query);
								
								if ($count > 1){ ?>
								<script>
								alert('Pseudo Déjà Existant');
								</script>
								<?php
								}else{
								
								mysql_query("UPDATE employe SET  EMP_NOM='$nom',EMP_PRENOM='$prenom', EMP_JOB='$job', EMP_MAIL='$mail',EMP_PHONE='$phone' where EMP_ID = '$session_id' ")or die(mysql_error());	
								mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Modification du profil utilisateur  ')")or die(mysql_error());
								?>
								<script>
							 	window.location = "employes.php"; 
								</script>
								<?php   }} ?>
						 
						 


                </div>
            </div>
		<?php include('footer1.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>