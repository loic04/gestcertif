     <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li> <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Accueil</a> </li>
                        <?php if ($row['EMP_DROIT']=="administrateur") {?>
                        <li>
                            <a href="employes.php"><i class="icon-chevron-right"></i><i class="icon-user-md"></i>&nbsp;Utilisateurs</a>
                        </li>
                        <?php } ?>
                        <?php if ($row['EMP_DROIT']=="administrateur"|| $row['EMP_DROIT']=="operateur") {?>
                        <li class="active">
                            <a href="clients.php"><i class="icon-chevron-right"></i><i class="icon-ok"></i>&nbsp;Clients</a>
                        </li>
                        <li>
                            <a href="certificats.php"><i class="icon-chevron-right"></i><i class="icon-file"></i>&nbsp;Certificats</a>
                        </li>
                        <?php } ?>
                       <?php if ($row['EMP_DROIT']=="administrateur"|| $row['EMP_DROIT']=="auditeur") {?>
                       <li>
                            <a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> Journal des Utilisateurs</a>
                        </li>
                        <li>
                            <a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-eye-open"></i> Journal des Activités</a>
                        </li>
                        <?php } ?>
                        <?php if ($row['EMP_DROIT']=="administrateur" || $row['EMP_DROIT']=="operateur"|| $row['EMP_DROIT']=="auditeur") {?>
                    
                         <li><a href="../dasboard_employe.php"><i class="icon-chevron-right"></i><i class="icon-desktop"></i>&nbsp;RETOUR</a></li>
                         <?php } ?>
                    </ul>
                </div>