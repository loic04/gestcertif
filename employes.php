<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>
    <body>
		<?php include('navbar_employe.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('employe_liste_sidebar.php'); ?>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Liste des utilisateurs</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal"  id="delete"  class="btn btn-danger" name=""  target="_blank" href="admin/fpdf17_2/exemples/user_pdf.php">><i class="icon-print"></i></a>
										<thead>
										    <tr>
                                    <th>Nom</th>
                                    <th>Username</th>
									<th>Email</th>
                                    <th>Telephone</th>
                                    <th>Statut</th>

                                </tr>
										</thead>
										<tbody>
												 <?php
                                    $emp_query = mysql_query("select * from employe") or die(mysql_error());
                                    while ($row = mysql_fetch_array($emp_query)) {
                                    $id = $row['EMP_ID'];
                                        ?>
									<tr>
                                    <td><?php echo $row['EMP_NOM'] . " " . $row['EMP_PRENOM']; ?></td> 
                                    <td><?php echo $row['EMP_LOGIN']; ?></td> 
									<td><?php echo $row['EMP_MAIL']; ?></td> 
									<td><?php echo $row['EMP_PHONE']; ?></td>
                                    <td><?php echo $row['EMP_DROIT']; ?></td> 
                               
									
                                </tr>
                            <?php } ?>
                               
										</tbody>
									</table>
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