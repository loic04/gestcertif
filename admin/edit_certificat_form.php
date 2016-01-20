   <div class="row-fluid">
    <a href="certificats.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Ajouter Certificats</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Modifier Certificat</div>
                            </div>
							<?php 
							$query = mysql_query("select * from certificat where cert_id = '$get_id'")or die(mysql_error());
							$row = mysql_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
									<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['libelle_cert']; ?>" id="focusedInput" name="nom" type="text" placeholder = "Nom Du Certificat">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['prix_cert']; ?>" id="focusedInput" name="prix" type="text" placeholder = "Prix">
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
 if (isset($_POST['update'])){
//Prevenir les sql injections
                           function clean($str) {
                           $str = @trim($str);
                           if(get_magic_quotes_gpc()) {
                           $str = stripslashes($str);
                            }
                         return mysql_real_escape_string($str);
                            }
$nom = clean($_POST['nom']);
$prix = clean($_POST['prix']);

$query = mysql_query("select * from certificat where libelle_cert = '$nom' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 1){ ?>
<script>
alert('Certificat Déjà Existant');
</script>
<?php
}else{
 mysql_query("update certificat set libelle_cert = '$nom' , prix_cert  = '$prix' where cert_id = '$get_id' ")or die(mysql_error());
?>

 <script>
 window.location='certificats.php'; 
 </script>
 <?php 
 }}
 ?>
 