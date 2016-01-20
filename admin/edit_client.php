<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('clients_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('edit_client_form.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Liste Des Clients</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<form action="delete_client.php" method="post">
  								<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#client_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										    <tr>
                                    <th></th>
                                    <th>Nom</th>
                                    <th>Prenoms</th>
                                    <th>Emploi</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Numero Certificat</th>
                                    <th>Type de Certificat</th>
                                    <th></th>
                                </tr>
										</thead>
										<tbody>
												 <?php
                                    $teacher_query = mysql_query("select * from client LEFT JOIN certificat ON client.certificat_client = certificat.libelle_cert ORDER BY client.nom_client DESC") or die(mysql_error());
                                    while ($row = mysql_fetch_array($teacher_query)) {
                                    $id = $row['client_id'];
                                        ?>
									<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                    <td><?php echo $row['nom_client']; ?></td>
                                    <td><?php echo $row['prenom_client']; ?></td>
                                    <td><?php echo $row['emploi_client']; ?></td>
                                    <td><?php echo $row['mail_client']; ?></td>
                                    <td><?php echo $row['tel_client']; ?></td> 
                                    <td><?php echo $row['certificat_num']; ?></td> 
                                    <td><?php echo $row['certificat_client']; ?></td>
									<td width="50"><a href="edit_client.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i></a></td>
                                </tr>
                            <?php } ?>
                               
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>