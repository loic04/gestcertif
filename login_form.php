			<form id="login_form1" class="form-signin" method="post">
						<h3 class="form-signin-heading"><i class="icon-lock"></i> Connexion</h3>
						<input type="text" class="input-block-level" id="username" name="username" placeholder="Nom d'Utilisateur" required>
						<input type="password" class="input-block-level" id="password" name="password" placeholder="Mot De Passe" required>
						<button data-placement="right" title="Cliquez Ici Pour Vous Connecter" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Connexion</button>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin').tooltip('show');
															$('#signin').tooltip('hide');
														});
														</script>		
			</form>
						<script>
						jQuery(document).ready(function(){
						jQuery("#login_form1").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true')
									{
									$.jGrowl("Chargement des paramtres..", { sticky: true });
									$.jGrowl("Bienvenue sur la plateforme de Gestion des certificats", { header: 'Accès Accordé' });
									var delay = 2000;
										setTimeout(function(){ window.location = 'dasboard_employe.php'  }, delay);  
									}else
									{
									$.jGrowl("vérifier votre nom d'utilisateur et votre mot de passe", { header: 'Echec de la Connexion' });
									}
									}
								});
								return false;
							});
						});
						</script>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_student').tooltip('show'); $('#signin_student').tooltip('hide');
														});
														</script>	
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin_teacher').tooltip('show'); $('#signin_teacher').tooltip('hide');
														});
														</script>	