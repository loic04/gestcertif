<?php include('session.php'); ?>
<?php include('header_dashboard.php'); ?>
    <body>
		<?php include('navbar_employe.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('certificats_liste_sidebar.php'); ?>
                <div class="span6" id="">
                     <div class="row-fluid">
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Liste des Certificats</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
									<a data-toggle="modal"  id="delete"  class="btn btn-danger" name=""  target="_blank" href="admin/fpdf17_2/exemples/certificat_pdf.php">><i class="icon-print"></i></a>
										<thead>
										    <tr>
                                    <th>Libelle</th>
                                    <th>Prix</th>
                                </tr>
										</thead>
										<tbody>
												 <?php
                                    $emp_query = mysql_query("select * from certificat") or die(mysql_error());
                                    while ($row = mysql_fetch_array($emp_query)) {
                                    $id = $row['cert_id'];
                                        ?>
									<tr>
                                    <td><?php echo $row['libelle_cert']; ?></td>
                                    <td><?php echo $row['prix_cert']; ?></td>
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