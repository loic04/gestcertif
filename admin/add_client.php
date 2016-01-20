   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Ajouter Client</div>
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
                                            <input class="input focused" name="prenom" id="focusedInput" type="text" placeholder = "Prenoms" required/>
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
                                        <label>Type de Certificat:</label>
                                          <div class="controls">
                                              <select name="certificat"  class="" required>
                                                                <option></option>
                                        <?php
                                        $query = mysql_query("select * from certificat order by cert_id");
                                        while($row = mysql_fetch_array($query)){
                                        
                                        ?>
                                        <option value="<?php echo $row['libelle_cert']; ?>"><?php echo $row['libelle_cert']; ?></option>
                                        <?php } ?>
                                              </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="numcert" id="focusedInput" type="text" placeholder = "Numero unique du certificat " required/>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="cartid" id="focusedInput" type="text" placeholder = "Numero carte national " required/>
                                          </div>
                                        </div>

                                        <div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" name="entreprise" id="focusedInput" type="text" placeholder = "Entreprise " required/>
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
$certificat=clean($_POST["certificat"]);
$numcert=clean($_POST["numcert"]);
$cartid=clean($_POST["cartid"]);
$entreprise=clean($_POST["entreprise"]);

                             
															     //Vérification du mdp
                                                                  if (empty($nom) || empty($prenom)|| empty($job)|| empty($mail)|| empty($phone)|| empty($certificat)|| empty($numcert)|| empty($cartid)|| empty($entreprise))
                                                                   {?>
																                                   <script>
                                                                alert('Veuillez remplir tous les champs svp!');
                                                                  </script>
                                                                   <?php }	
								
								$query = mysql_query("select * from client where mail_client = '$mail' ")or die(mysql_error());
								$count = mysql_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Mail existe déjà');
								</script>
								
								<?php
								}else{

                                mysql_query("INSERT INTO `client`(`nom_client`,`prenom_client`,`emploi_client`,`mail_client`, `tel_client`, `certificat_client`, `certificat_num`, `cart_ind`, `entreprise`, `enregistr_par`)
								values('$nom','$prenom','$job','$mail','$phone','$certificat','$numcert','$cartid','$entreprise','$user_id')         
								") or die(mysql_error()); 
								 mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Ajouter client $nom ')")or die(mysql_error());
								?>
								<script>
							 	window.location = "clients.php"; 
								</script>
								<?php   }} ?>
						 
						 