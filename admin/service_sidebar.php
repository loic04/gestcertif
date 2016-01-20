     <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li> <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Accueil</a> </li>
						<li >
                            <a href="employes.php"><i class="icon-chevron-right"></i><i class="icon-user-md"></i>&nbsp;Utilisateurs</a>
                        </li>
						<li>
                            <a href="fournisseurs.php"><i class="icon-chevron-right"></i><i class="icon-group"></i>&nbsp;Fournisseurs</a>
                        </li>
						<li class="active">
                            <a href="localisation.php"><i class="icon-chevron-right"></i><i class="icon-building"></i>&nbsp;Localisations</a>
                        </li>
						<li>
                            <a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Journal des Utilisateurs</a>
                        </li>
						<li>
                            <a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Journal des Activités</a>
                        </li>
		<li class=""><a href="materiels.php"><i class="icon-chevron-right"></i><i class="icon-laptop"></i>&nbsp;Matériels</a></li>
			<li class=""><a href="peripheriques.php"><i class="icon-chevron-right"></i><i class="icon-print"></i>&nbsp;Périphériques</a></li> 
		<li class=""><a href="logiciels.php"><i class="icon-chevron-right"></i><i class="icon-cloud-download"></i>&nbsp;Logiciels</a></li> 
		<li class=""><a href="reservation.php"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>&nbsp;Gestion des réservations</a></li> 
		<li class=""><a href="maintenance.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Gestion des maintenances</a></li>
	
		 <?php if ($row['EMP_DROIT']=="administrateur") {?>
		 <li><a href="../dasboard_employe.php"><i class="icon-chevron-right"></i><i class="icon-desktop"></i>&nbsp;RETOUR</a></li>
		 <?php } ?>
                    </ul>
                </div>