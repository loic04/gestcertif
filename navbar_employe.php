	<div class="navbar navbar-fixed-top navbar-inverse">
           <div class="navbar-inner">
               <div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
                   <a class="brand" href="#">Back-office standard</a>
							<div class="nav-collapse collapse">
								<ul class="nav pull-right">
												<?php $query= mysql_query("select * from employe where EMP_ID = '$session_id'")or die(mysql_error());
														$row = mysql_fetch_array($query);
												?>
												<li class="dropdown">
													<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $row['EMP_NOM']." ".$row['EMP_PRENOM'];  ?> <i class="caret"></i></a>
															<ul class="dropdown-menu">
																<li>
																	<a href="change_password_employe.php"><i class="icon-circle"></i> Changer Mot de Passe</a>
																	<a tabindex="-1" href="profile_employe.php"><i class="icon-user"></i> Changer Profil</a>
																</li>
																<li class="divider"></li>
																<li><a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Deconnexion</a></li>
															</ul>
												</li>
								</ul>
							</div>
                   <!--/.nav-collapse -->
               </div>
           </div>
</div>	