   <div class="row-fluid">
       <a href="employes.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Ajouter Utilisateur</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Modifier Utilisateur</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
							
									<?php
									$query = mysql_query("select * from employe where EMP_ID = '$get_id' ")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
										
										  
										
											  <div class="control-group">
											<label>Droit De L' Utilisateur:</label>
                                          <div class="controls">
                                            <select name="droit"  class="chzn-select"required>
											<?php
											$query_emp = mysql_query("select * from employe")or die(mysql_error());
											$row_emp = mysql_fetch_array($query_emp);
											
											?>
											
                                             	<option value="<?php echo $row_emp['EMP_DROIT']; ?>">
												<?php echo $row_emp['EMP_DROIT']; ?>
												</option>
											  <option value="aucun droit donné"></option>
		                                      <option value="administrateur" >administrateur</option>
		                                      <option value="normal">standard</option>
                                              <option value="operateur">operateur</option>
                                              <option value="auditeur">auditeur</option>
                                            </select>
                                          </div>
                                        </div>
										<input class="input focused" value="<?php echo $row['EMP_LOGIN']; ?>" name="pseudo" id="focusedInput" type="hidden"  required/>
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
$droit=clean($_POST['droit']);

								
								
								$query = mysql_query("select * from employe where EMP_LOGIN= '$pseudo' ")or die(mysql_error());
								$count = mysql_num_rows($query);
								
								if ($count > 1){ ?>
								<script>
								alert('Pseudo Déjà Existant');
								</script>
								<?php
								}else{
								
								mysql_query("UPDATE employe SET  EMP_NOM='$nom',EMP_PRENOM='$prenom', EMP_JOB='$job', EMP_MAIL='$mail',EMP_PHONE='$phone', EMP_DROIT='$droit' where EMP_ID = '$get_id' ")or die(mysql_error());	
								
								?>
								<script>
							 	window.location = "employes.php"; 
								</script>
								<?php   }} ?>
						 
						 