   <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Ajouter Service</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="nom" type="text" placeholder = "Nom Du Service">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="local" type="text" placeholder = "Localisation">
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
if (isset($_POST['save'])){
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

if ($count > 0){ ?>
<script>
alert('Service Déjà Existant');
</script>
<?php
}else{
mysql_query("insert into service (SERV_NOM,SERV_LOCAL) values('$nom','$local')")or die(mysql_error());
mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Ajouter Service $nom($local)  ')")or die(mysql_error());
?>
<script>
window.location = "localisation.php";
</script>
<?php
}
}
?>