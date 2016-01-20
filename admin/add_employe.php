   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Ajouter Utilisateur</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								<!--
										<label>Photo:</label>
										<div class="control-group">
                                          <div class="controls">
                                               <input class="input-file uniform_on" id="fileInput" type="file" required>
                                          </div>
                                        </div>
									-->	
										
										  
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="nom" id="focusedInput" type="text" placeholder = "Nom" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="prenom" id="focusedInput" type="text" placeholder = "Prénoms" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="job" id="focusedInput" type="text" placeholder = "Emploi" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="mail" id="focusedInput" type="text" placeholder = "Mail" required/>
                                          </div>
                                        </div>
									
									<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="phone" id="focusedInput" type="text" placeholder = "Telephone 1 " required/>
                                          </div>
                                        </div>
										 
										 
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="pseudo" id="focusedInput" type="text" placeholder = "Pseudonyme" required/>
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="password" id="focusedInput" type="password" placeholder = "Mot De Passe" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="confirmation" id="focusedInput" type="password" placeholder = "Confirmation Du Mot De Passe" required/>
                                          </div>
                                        </div>
										
																				  <div class="control-group">
											<label>Droit De L' Utilisateur:</label>
                                          <div class="controls">
                                            <select name="droit"  class="" required>
                                             	<option value="aucun droit donné"></option>
				                                      <option value="administrateur" >administrateur</option>
				                                      <option value="normal">standard</option>
                                              <option value="operateur">operateur</option>
                                              <option value="auditeur">auditeur</option> 
                                            </select>
                                          </div>
                                        </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					    <?php
                            if (isset($_POST['save'])) {
                           //Prevenir les sql injections
                           function clean($str) {
                           $str = @trim($str);
                           if(get_magic_quotes_gpc()) {
                           $str = stripslashes($str);
                            }
                         return mysql_real_escape_string($str);
                            }
							//récupérer les données du formulaire
$nom=clean($_POST["nom"]);
$prenom=clean($_POST["prenom"]);
$job=clean($_POST["job"]);
$mail=clean($_POST["mail"]);
$phone=clean($_POST["phone"]);
$pseudo=clean($_POST['pseudo']);
$password=clean($_POST['password']);
$confirmation=clean($_POST['confirmation']);
$droit=clean($_POST['droit']);
                             
															     //Vérification du mdp
                                                                  if ($password != $confirmation || empty($confirmation) || empty($password))
                                                                   {?>
																   <script>
                                                                alert('Votre mot de passe et votre confirmation diffèrent, ou sont vides');
                                                                  </script>
                                                                   <?php }	
								
								$query = mysql_query("select * from employe where EMP_LOGIN = '$pseudo' ")or die(mysql_error());
								$count = mysql_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Pseudo Déjà Existant');
								</script>
								
								

								<?php
								}else{

                                mysql_query("INSERT INTO `employe`(`EMP_NOM`,`EMP_PRENOM`,`EMP_JOB`,`EMP_MAIL`, `EMP_PHONE`, `EMP_LOGIN`, `EMP_PASSWORD`, `EMP_DROIT`)
								values('$nom','$prenom','$job','$mail','$phone','$pseudo','$password','$droit')         
								") or die(mysql_error()); 
								 mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Ajouter utilisateur $pseudo($nom $prenom)  ')")or die(mysql_error());
								?>
								<script>
							 	window.location = "employes.php"; 
								</script>
								<?php   }} ?>
						 
						 