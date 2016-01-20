<?php include('session.php'); ?>
<?php include('header.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('employe_sidebar.php'); ?>
				<div class="span3" id="adduser">
				<?php include('add_employe.php'); ?>		   			
				</div>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Liste Des Employés</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<form action="delete_employe.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal" href="#employe_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										    <tr>
                                    <th></th>
                                    <th>Nom & Prénoms</th>
                                    <th>Nom d'Utilisateur</th>
                                    <th>Mail</th>
									<th>Droit</th>
                                    <th></th>
                                </tr>
										</thead>
										<tbody>
												 <?php
                                    $teacher_query = mysql_query("select * from employe") or die(mysql_error());
                                    while ($row = mysql_fetch_array($teacher_query)) {
                                    $id = $row['EMP_ID'];
                                        ?>
									<tr>
										<td width="30">
										<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
                                    <td><?php echo $row['EMP_NOM'] . " " . $row['EMP_PRENOM']; ?></td> 
                                    <td><?php echo $row['EMP_LOGIN']; ?></td> 
                                     <td><?php echo $row['EMP_MAIL']; ?></td> 
									 <td><?php echo $row['EMP_DROIT']; ?></td> 
									<td width="50"><a href="edit_employe.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i></a></td>
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