        <!-- Morris Charts JavaScript -->
	    <script src="admin/js/plugins/morris/raphael.min.js"></script>
	    <script src="admin/js/plugins/morris/morris.min.js"></script>

	    <script>
	     // Bar Chart data
			 //Graph about operateur1

	     <?php //personnal certificate
	     mysql_select_db('gestcertdkb',mysql_connect('localhost','root',''))or die(mysql_error());
		 $query_mat2 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='7' ")or die(mysql_error());
		 $count_mat2 = mysql_num_rows($query_mat2);
		 ?>

		 <?php //SSL certificate
		$query_mat3 = mysql_query("select * from client where certificat_client='SSL OV' and enregistr_par='7' ")or die(mysql_error());
		$count_mat3 = mysql_num_rows($query_mat3);
		?>

		<?php //Stamp certificate
		$query_mat4 = mysql_query("select * from client where certificat_client='Cachet serveur' and enregistr_par='7' ")or die(mysql_error());
		$count_mat4 = mysql_num_rows($query_mat4);

		//Graph about operateur2

		<?php //personnal certificate
	$query_mat5 = mysql_query("select * from client where certificat_client='Personne physique' and enregistr_par='10' ")or die(mysql_error());
	$count_mat5 = mysql_num_rows($query_mat5);
	?>

	<?php //SSL certificate
 $query_mat6 = mysql_query("select * from client where certificat_client='SSL OV' and enregistr_par='10' ")or die(mysql_error());
 $count_mat6 = mysql_num_rows($query_mat6);
 ?>

 <?php //Stamp certificate
 $query_mat7 = mysql_query("select * from client where certificat_client='Cachet serveur' and enregistr_par='10' ")or die(mysql_error());
 $count_mat7 = mysql_num_rows($query_mat7);
		?>


    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            device: 'Personnel',
            geekbench: <?php echo $count_mat2; ?>
        }, {
            device: 'SSL OV',
            geekbench: <?php echo $count_mat3; ?>
        }, {
            device: 'Cachet server',
            geekbench: <?php echo $count_mat4; ?>
        }],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Vendu'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });

		Morris.Bar({
        element: 'morris-bar-chart2',
        data: [{
            device: 'Personnel',
            geekbench: <?php echo $count_mat5; ?>
        }, {
            device: 'SSL OV',
            geekbench: <?php echo $count_mat6; ?>
        }, {
            device: 'Cachet server',
            geekbench: <?php echo $count_mat7; ?>
        }],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Vendu'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        resize: true
    });

	    </script>
<!-- /Morris Charts JavaScript -->

        <script src="admin/bootstrap/js/bootstrap.min.js"></script>
        <script src="admin/vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="admin/assets/scripts.js"></script>
				<script>
				$(function() {
					// Easy pie charts
					$('.chart').easyPieChart({animate: 1000});
				});
				</script>
			<!-- data table -->
		<script src="admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
        <script src="admin/assets/DT_bootstrap.js"></script>
			<!-- jgrowl -->
		<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>
				<script>
				$(function() {
					$('.tooltip').tooltip();
					$('.tooltip-left').tooltip({ placement: 'left' });
					$('.tooltip-right').tooltip({ placement: 'right' });
					$('.tooltip-top').tooltip({ placement: 'top' });
					$('.tooltip-bottom').tooltip({ placement: 'bottom' });
					$('.popover-left').popover({placement: 'left', trigger: 'hover'});
					$('.popover-right').popover({placement: 'right', trigger: 'hover'});
					$('.popover-top').popover({placement: 'top', trigger: 'hover'});
					$('.popover-bottom').popover({placement: 'bottom', trigger: 'hover'});
					$('.notification').click(function() {
						var $id = $(this).attr('id');
						switch($id) {
							case 'notification-sticky':
								$.jGrowl("Stick this!", { sticky: true });
							break;
							case 'notification-header':
								$.jGrowl("A message with a header", { header: 'Important' });
							break;
							default:
								$.jGrowl("Hello world!");
							break;
						}
					});
				});
				</script>
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/uniform.default.css" rel="stylesheet" media="screen">
			<link href="admin/vendors/chosen.min.css" rel="stylesheet" media="screen">
		<!--  -->
		<script src="admin/vendors/jquery.uniform.min.js"></script>
        <script src="admin/vendors/chosen.jquery.min.js"></script>
        <script src="admin/vendors/bootstrap-datepicker.js"></script>
		<!--  -->
			<script src="admin/vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
			<script src="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
			<script src="admin/vendors/ckeditor/ckeditor.js"></script>
			<script src="admin/vendors/ckeditor/adapters/jquery.js"></script>
			<script type="text/javascript" src="admin/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
        $(function() {
            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
				{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
				{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
			]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });
        </script>
		<!-- <script type="text/javascript" src="admin/assets/modernizr.custom.86080.js"></script> -->
		<script src="admin/assets/jquery.hoverdir.js"></script>
		<link rel="stylesheet" type="text/css" href="admin/assets//style.css" />
			<script type="text/javascript">
			$(function() {
				$('#da-thumbs > li').hoverdir();
			});
			</script>
			<script src="admin/vendors/fullcalendar/fullcalendar.js"></script>
			<script src="admin/vendors/fullcalendar/gcal.js"></script>
			<link href="admin/vendors/datepicker.css" rel="stylesheet" media="screen">
			<script src="admin/vendors/bootstrap-datepicker.js"></script>
						<script>
						$(function() {
							$(".datepicker").datepicker();
							$(".uniform_on").uniform();
							$(".chzn-select").chosen();
							$('#rootwizard .finish').click(function() {
								alert('Finished!, Starting over!');
								$('#rootwizard').find("a[href*='tab1']").trigger('click');
							});
						});
						</script>
