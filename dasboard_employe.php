<?php  include('session.php'); ?>
<?php include('header_dashboard.php'); ?>
<body>
				<?php include('navbar_employe.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
						<?php include('employe_sidebar.php'); ?>
                <!--/span-->
                <div class="span9" id="content">
						<div class="row-fluid"></div>

                    <div class="row-fluid">

                        <!-- block RESUME -->


                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"> RESUME DES OPERATIONS SUR LA PLATEFORME</div>
                            </div>

                            <div class="block-content collapse in">
							        <div class="span12">
							        	<!--Statistiques about clients-->

											<?php
										$query_mat = mysql_query("select * from client ")or die(mysql_error());
										$count_mat = mysql_num_rows($query_mat);
										?>

		                                <div class="span3">
		                                    <div class="chart" data-percent="<?php echo $count_mat; ?>"><?php echo $count_mat; ?></div>
		                                    <div class="chart-bottom-heading"><strong>Nombre de Clients</strong>

		                                    </div>
		                                </div>
							        	<!--/Statistiques about clients-->

							        	<!--Variables of cost-->
							        	<?php
							        	//Personnal
							      $query_price_person = mysql_query("select * from certificat where libelle_cert='Personne physique' ")or die(mysql_error());
										$row                = mysql_fetch_array($query_price_person);
										$cost_Pers          = $row['prix_cert'];

										//SSLOV
							      $query_price_person = mysql_query("select * from certificat where libelle_cert='SSL OV' ")or die(mysql_error());
										$row                = mysql_fetch_array($query_price_person);
										$cost_SSL           = $row['prix_cert'];

										//Stamp server
							      $query_price_person = mysql_query("select * from certificat where libelle_cert='Cachet serveur' ")or die(mysql_error());
										$row                = mysql_fetch_array($query_price_person);
										$cost_Serv          = $row['prix_cert'];

										//Get name of operateur
										$query_name_operateur1 = mysql_query("select * from employe where EMP_ID='7' ")or die(mysql_error());
										$row                = mysql_fetch_array($query_name_operateur1);
										$name_operateur1          = $row['EMP_NOM'];


										$query_name_operateur2 = mysql_query("select * from employe where EMP_ID='10' ")or die(mysql_error());
										$row                = mysql_fetch_array($query_name_operateur2);
										$name_operateur2          = $row['EMP_NOM'];
										?>
							        	<!--/Variables of cost-->

							        	<!--Statistiques about our certificates-->

		                                <?php //personnal certificate
										$query_mat2 = mysql_query("select * from client where certificat_client='Personne physique' ")or die(mysql_error());
										$count_mat2 = mysql_num_rows($query_mat2);
										//operateur1
										$query_mat8 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='7' ")or die(mysql_error());
							 		 $count_mat8 = mysql_num_rows($query_mat8);
									 //operateur2
									 $query_mat9 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='10' ")or die(mysql_error());
									 $count_mat9 = mysql_num_rows($query_mat9);
										?>

		                                <div class="span3">
		                                    <div class="chart" data-percent="<?php echo $count_mat2; ?>"><?php echo $count_mat2; ?></div>
		                                    <div class="chart-bottom-heading"><strong>Certificat personne</strong>

		                                    </div>
		                                    <div class="chart-bottom-heading">Montant <strong><?php echo $count_mat2*$cost_Pers; ?> FCFA</strong></div>
		                                </div>

		                                <?php //SSL certificate
										$query_mat3 = mysql_query("select * from client where certificat_client='SSL OV' ")or die(mysql_error());
										$count_mat3 = mysql_num_rows($query_mat3);
										//operateur1
										$query_mat10 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='7' ")or die(mysql_error());
							 		 $count_mat10 = mysql_num_rows($query_mat10);
									 //operateur2
									 $query_mat11 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='10' ")or die(mysql_error());
									 $count_mat11 = mysql_num_rows($query_mat11);
										?>

		                                <div class="span3">
		                                    <div class="chart" data-percent="<?php echo $count_mat3; ?>"><?php echo $count_mat3; ?></div>
		                                    <div class="chart-bottom-heading"><strong>Certificat SSL OV</strong>

		                                    </div>
		                                    <div class="chart-bottom-heading">Montant <strong><?php echo $count_mat3*$cost_SSL ?> FCFA</strong></div>

		                                </div>

		                                <?php //Stamp certificate
										$query_mat4 = mysql_query("select * from client where certificat_client='Cachet serveur' ")or die(mysql_error());
										$count_mat4 = mysql_num_rows($query_mat4);
										//operateur1
										$query_mat12 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='7' ")or die(mysql_error());
							 		 $count_mat12 = mysql_num_rows($query_mat12);
									 //operateur2
									 $query_mat13 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='10' ")or die(mysql_error());
									 $count_mat13 = mysql_num_rows($query_mat13);
										?>

		                                <div class="span3">
		                                    <div class="chart" data-percent="<?php echo $count_mat4; ?>"><?php echo $count_mat4; ?></div>
		                                    <div class="chart-bottom-heading"><strong>Certificat Cachet serveur</strong>

		                                    </div>
		                                    <div class="chart-bottom-heading">Montant <strong><?php echo $count_mat4*$cost_Serv; ?> FCFA</strong></div>
		                                </div>

							        	<!--/Statistiques about our certifcates-->

												<!--Total in wallet-->
							        	<?php
												//calcul of total operation
							        	$person_cost = $count_mat2*$cost_Pers;
							        	$sslov_cost  = $count_mat3*$cost_SSL;
							        	$server_cost = $count_mat4*$cost_Serv;
											  $total_cert  = $count_mat2+$count_mat3+$count_mat4;
												$caisse_Total = $person_cost+$sslov_cost+$server_cost;

												//cacul total sell for operateur1 (8µ10µ12)
												$person_cost_op1 = $count_mat8*$cost_Pers;
												$sslov_cost_op1  = $count_mat10*$cost_SSL;
												$server_cost_op1 = $count_mat12*$cost_Serv;
												$total_cert_op1  = $count_mat8+$count_mat10+$count_mat12;
												$caisse_op1      = $person_cost_op1+$sslov_cost_op1+$server_cost_op1;

												//calcul total sell for operateur2 (9µ11µ13)
												$person_cost_op2 = $count_mat9*$cost_Pers;
												$sslov_cost_op2  = $count_mat11*$cost_SSL;
												$server_cost_op2 = $count_mat13*$cost_Serv;
												$total_cert_op2 =  $count_mat9+$count_mat11+$count_mat13;
												$caisse_op2 = $person_cost_op2+$sslov_cost_op2+$server_cost_op2;

							        	?>
												<!--/total in wallet-->


							        	<!--Diagram operateurs-->
							        	<div class="span5">
							        		<div class="panel panel-primary">
					                            <div class="panel-heading">
					                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i><?php echo $name_operateur1; ?></h3>
																					<div class="row">
																					<h4>Vendu: <?php echo $total_cert_op1; ?> certificats</h4>
																					</div>
																					<div class="row">
																					<h4>Caisse: <?php echo $caisse_op1; ?> FCFA</h4>
																					</div>
					                            </div>
					                            <div class="panel-body">
					                                <div id="morris-bar-chart"></div>
					                                <div class="text-right">
					                                </div>
					                              </div>
					                         </div>
					                    </div>

															<div class="span5">
										        		<div class="panel panel-primary">
								                            <div class="panel-heading">
								                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i><?php echo $name_operateur2; ?></h3>
																								<div class="row">
																								<h4>Vendu: <?php echo $total_cert_op2; ?> certificats</h4>
																								</div>
																								<div class="row">
																								<h4>Caisse: <?php echo $caisse_op2; ?> FCFA</h4>
																								</div>
								                            </div>
								                            <div class="panel-body">
								                                <div id="morris-bar-chart2"></div>
								                                <div class="text-right">
								                                </div>
								                              </div>
								                         </div>
								                    </div>

							        	<!--/Diagram certificates-->


												<div class="span6">
			        		            <h1>Total Vendu: <?php echo $total_cert; ?> certificats</h1>
			        					<h1>Total Caisse: <?php echo $caisse_Total; ?> FCFA</h1>

											</div>



                                   </div>
                           </div>

                        <!-- /block -->

                    </div>
                    </div>




                </div>
            </div>

         <?php include('footer1.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>
