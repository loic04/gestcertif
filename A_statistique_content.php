
                            <div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								$query_mat = mysql_query("select * from materiel ")or die(mysql_error());
								$count_mat = mysql_num_rows($query_mat);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_mat; ?>"><?php echo $count_mat; ?></div>
                                    <div class="chart-bottom-heading"><strong>Matériels Enregistrés</strong>

                                    </div>
                                </div>
								
									<?php 
								$query_mat1 = mysql_query("select * from materiel where ORDI_ETAT='En Stock' ")or die(mysql_error());
								$count_mat1 = mysql_num_rows($query_mat1);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_mat1; ?>"><?php echo $count_mat1; ?></div>
                                    <div class="chart-bottom-heading"><strong>Matériels En Stock</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_mat2 = mysql_query("select * from materiel where ORDI_ETAT='En Service' ")or die(mysql_error());
								$count_mat2 = mysql_num_rows($query_mat2);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_mat2; ?>"><?php echo $count_mat2; ?></div>
                                    <div class="chart-bottom-heading"><strong>Matériels En Service</strong>

                                    </div>
                                </div>
								 
								 	<?php 
								$query_mat3 = mysql_query("select * from materiel where ORDI_ETAT='Hors-Service' ")or die(mysql_error());
								$count_mat3 = mysql_num_rows($query_mat3);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_mat3; ?>"><?php echo $count_mat3; ?></div>
                                    <div class="chart-bottom-heading"><strong>Matériels Hors-Service</strong>

                                    </div>
                                </div>
								
								
									<?php 
								$query_peri = mysql_query("select * from peripherique ")or die(mysql_error());
								$count_peri = mysql_num_rows($query_peri);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_peri; ?>"><?php echo $count_peri; ?></div>
                                    <div class="chart-bottom-heading"><strong>Périphériques Enregistrés</strong>

                                    </div>
                                </div>
								
									<?php 
								$query_peri1 = mysql_query("select * from peripherique where PERIP_ETAT='En Stock' ")or die(mysql_error());
								$count_peri1 = mysql_num_rows($query_peri1);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_peri1; ?>"><?php echo $count_peri1; ?></div>
                                    <div class="chart-bottom-heading"><strong>Périphériques En Stock</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_peri2 = mysql_query("select * from peripherique where PERIP_ETAT='En Service' ")or die(mysql_error());
								$count_peri2 = mysql_num_rows($query_peri2);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_peri2; ?>"><?php echo $count_peri2; ?></div>
                                    <div class="chart-bottom-heading"><strong>Périphériques En Service</strong>

                                    </div>
                                </div>
								 
								 	<?php 
								$query_peri3 = mysql_query("select * from peripherique where PERIP_ETAT='Hors-Service' ")or die(mysql_error());
								$count_peri3 = mysql_num_rows($query_peri3);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_peri3; ?>"><?php echo $count_peri3; ?></div>
                                    <div class="chart-bottom-heading"><strong>Périphériques Hors-Service</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_emp = mysql_query("select * from employe")or die(mysql_error());
								$count_emp = mysql_num_rows($query_emp);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_emp; ?>"><?php echo $count_emp ?></div>
                                    <div class="chart-bottom-heading"><strong>Utilisateurs</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_four = mysql_query("select * from fournisseur")or die(mysql_error());
								$count_four = mysql_num_rows($query_four);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_four; ?>"><?php echo $count_four ?></div>
                                    <div class="chart-bottom-heading"><strong>Fournisseurs</strong>

                                    </div>
                                </div>
								
									<?php 
								$query_serv = mysql_query("select * from service")or die(mysql_error());
								$count_serv = mysql_num_rows($query_serv);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_serv; ?>"><?php echo $count_serv ?></div>
                                    <div class="chart-bottom-heading"><strong>Services</strong>

                                    </div>
                                </div>
								
								
								
						
						
                            </div>
                        </div>
                    
                        <!-- /block -->
						