<div class="span3" id="sidebar">
	<img id="avatar" class="img-polaroid" src="admin/uploads/avatar.jpg">
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
	<li class=""><a href="dasboard_employe.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Accueil</a></li>
	   <li class=""><a href="employes.php"><i class="icon-chevron-right"></i><i class="icon-user-md"></i>&nbsp;Utilisateurs</a></li>
	   <li class="active"><a href="clients.php"><i class="icon-chevron-right"></i><i class="icon-ok"></i>&nbsp;Clients</a></li>
	   <li><a href="certificats.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Certificats</a></li> 
	
		 <?php if ($row['EMP_DROIT']=="administrateur"|| $row['EMP_DROIT']=="operateur"|| $row['EMP_DROIT']=="auditeur") {?>
		 <li><a href="admin/dashboard.php"><i class="icon-chevron-right"></i><i class="icon-desktop"></i>&nbsp;Plus d'options</a></li>
		 <?php } ?>
	</ul>
</div>

