   <div class="row-fluid">
       <a href="clients.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Ajouter Clients</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Modifier Clients</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
							
									<?php
									$query = mysql_query("select * from client where client_id = '$get_id' ")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['nom_client']; ?>" name="nom" id="focusedInput" type="text" placeholder = "Nom" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['prenom_client']; ?>" name="prenom" id="focusedInput" type="text" placeholder = "Prenoms" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['emploi_client']; ?>" name="job" id="focusedInput" type="text" placeholder = "Emploi" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['mail_client']; ?>" name="mail" id="focusedInput" type="text" placeholder = "Mail" required/>
                                          </div>
                                        </div>
									
									<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['tel_client']; ?>" name="phone" id="focusedInput" type="text" placeholder = "Telephone " required/>
                                          </div>
                                        </div>

                                        <div class="control-group">
											<label>Certificat:</label>
                                          <div class="controls">
                                            <select name="certificat"  class="chzn-select"required>
											<?php
											$query_emp = mysql_query("select * from client left join  certificat on certificat.libelle_cert=client.certificat_client where client_id = '$get_id'")or die(mysql_error());
											$row_emp = mysql_fetch_array($query_emp);
											
											?>
											
                                             	<option value="<?php echo $row_emp['libelle_cert']; ?>">
												<?php echo $row_emp['libelle_cert']; ?>
												</option>
											<?php
											$service = mysql_query("select * from certificat order by cert_id");
											while($service_row = mysql_fetch_array($service)){
											
											?>
											<option value="<?php echo $service_row['libelle_cert']; ?>"><?php echo $service_row['libelle_cert']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['certificat_num']; ?>" name="numcert" id="focusedInput" type="text" placeholder = "Numero unique du certificat " required/>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['cart_ind']; ?>" name="cartid" id="focusedInput" type="text" placeholder = "Numero carte national " required/>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['entreprise']; ?>" name="entreprise" id="focusedInput" type="text" placeholder = "Entreprise " required/>
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
$nom=clean($_POST["nom"]);
$prenom=clean($_POST["prenom"]);
$job=clean($_POST["job"]);
$mail=clean($_POST["mail"]);
$phone=clean($_POST["phone"]);
$certificat=clean($_POST['certificat']);
$numcert=clean($_POST["numcert"]);
$cartid=clean($_POST["cartid"]);
$entreprise=clean($_POST["entreprise"]);
								
								
								$query = mysql_query("select * from client where mail_client= '$mail' ")or die(mysql_error());
								$count = mysql_num_rows($query);
								
								if ($count > 1){ ?>
								<script>
								alert('Mail Existe déjà');
								</script>
								<?php
								}else{
								
								mysql_query("UPDATE client SET  nom_client='$nom',prenom_client='$prenom', emploi_client='$job', mail_client='$mail',tel_client='$phone', certificat_client='$certificat', certificat_num='$numcert', cart_ind='$cartid', entreprise='$entreprise' where client_id = '$get_id' ")or die(mysql_error());	
								
								?>
								<script>
							 	window.location = "clients.php"; 
								</script>
								<?php   }} ?>
						 
						 