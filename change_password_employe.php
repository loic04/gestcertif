<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>
    <body>
		<?php include('navbar_employe.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('change_password_sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<div class="alert alert-info"><i class="icon-info-sign"></i> Svp Remplis les champs voulus</div>
								<?php
								$query = mysql_query("select * from employe where EMP_ID = '$session_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>								
										
								    <form  method="post" id="change_password" class="form-horizontal">
										<div class="control-group">
											<label class="control-label" for="inputEmail"> Mot de Passe Actuel</label>
											<div class="controls">
											<input type="hidden" id="password" name="password" value="<?php echo $row['EMP_PASSWORD']; ?>"  placeholder="Mot de Passe Actuel">
											<input type="password" id="current_password" name="current_password"  placeholder="Mot de Passe Actuel" required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Nouveau Mot de Passe</label>
											<div class="controls">
											<input type="password" id="new_password" name="new_password" placeholder="Nouveau Mot de Passe" required/>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Resaisit le Mot de Passe</label>
											<div class="controls">
											<input type="password" id="retype_password" name="retype_password" placeholder="Resaisit le Mot de Passe" required/>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
											<button type="submit" class="btn btn-info"><i class="icon-save"></i> Sauver</button>
											</div>
										</div>
									</form>
									
												<script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("Ce mot de passe ne correspond à l'actuel mot de passe  ", { header: 'Changement du Mot de Passe avec Echec' });
						}else if  (new_password != retype_password){
						$.jGrowl("Ce mot de passe ne correspond au deuxieme mot de passe pour la confirmation  ", { header: 'Changement du Mot de Passe avec Echec' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password.php",
						data: formData,
						success: function(html){
					
						$.jGrowl("Ton Mot de Passe a bien été changé", { header: 'Changement du Mot de Passe avec Succès' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dasboard_employe.php'  }, delay);  
						
						}
						
						
					});
			
					}
				});
			});
			</script>
										
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					

	

                </div>
	
            </div>
		<?php include('footer1.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>