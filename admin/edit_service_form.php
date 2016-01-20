   <div class="row-fluid">
    <a href="localisation.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Ajouter Service</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Modifier Service</div>
                            </div>
							<?php 
							$query = mysql_query("select * from service where SERV_ID = '$get_id'")or die(mysql_error());
							$row = mysql_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
									<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['SERV_NOM']; ?>" id="focusedInput" name="nom" type="text" placeholder = "Nom Du Service" required/>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['SERV_LOCAL']; ?>" id="focusedInput" name="local" type="text" placeholder = "Localisation">
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
$local = clean($_POST['local']);

$query = mysql_query("select * from service where SERV_NOM = '$nom' and SERV_LOCAL = '$local' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 1){ ?>
<script>
alert('Service Déjà Existant');
</script>
<?php
}else{
 mysql_query("update service set SERV_NOM = '$nom' , SERV_LOCAL  = '$local' where SERV_ID = '$get_id' ")or die(mysql_error());
?>



 <script>
 window.location='localisation.php'; 
 </script>
 <?php 
 }
 }
 ?>
 