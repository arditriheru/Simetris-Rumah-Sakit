<?php
error_reporting(0);
require_once('bdd.php');
$sql = "SELECT id, title, start, end, color FROM events ";
$req = $bdd->prepare($sql);
$req->execute();
$events = $req->fetchAll();
$today    =   date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>SIMETRIS | Kalender</title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/bootstrap.css"/>
	<!-- Add custom CSS here -->
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sb-admin.css"/>
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://pendaftaran.rskiarachmi.co.id/vendors/css/sweetalert.css"/>
	<!-- FullCalendar -->
	<link rel="stylesheet" type="text/css" href='https://pendaftaran.rskiarachmi.co.id/vendors/css/fullcalendar.css'/>
	<!-- Custom CSS -->
	<style>
		body {
			padding-top: 70px;
			/* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
		}
		#calendar {
			max-width: 100%;
		}
		.col-centered{
			float: none;
			margin: 0 auto;
		}
	</style>
	<style>
		.whitetext {
			color: #ffffff;
		}
		.bluetext {
			color: #008cba;
		}
		.redtext {
			color: #e71414;
		}
		.navbar-rachmi{
			background-color:#e67e22;
			border-color:#d35400
		}
		.navbar-brand{
			color:#ffffff;
		}

	</style>
</head>
<body>
	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="https://instagram.com/arditriheru" class="navbar-brand">S I M E T R I S</a>
		</div>
	</nav>

	<!-- Page Content -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<?php
				$id = $_GET['id'];
				if(isset($id)){ ?>
					<a href="../booking/dashboard"
					<button type="button" class="btn btn-danger btn-lg btn-block"><i class="fa fa-arrow-left "></i> Kembali</button>
				</a>
			<?php }else{ ?>
				<a href="javascript: history.back()"
				<button type="button" class="btn btn-danger btn-lg btn-block"><i class="fa fa-arrow-left "></i> Kembali</button>
			</a>
		<?php }	?>
		<br>
		<div id="calendar" class="col-centered">
		</div>
	</div>
</div>
<!-- /.row -->

<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Add Event</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<label for="color" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-10">
							<select name="color" class="form-control" id="color">
								<option value="">Choose</option>
								<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#008000;" value="#008000">&#9724; Green</option>						  
								<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
								<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
								<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>

							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="start" class="col-sm-2 control-label">Start date</label>
						<div class="col-sm-10">
							<input type="text" name="start" class="form-control" id="start" readonly>
						</div>
					</div>
					<div class="form-group">
						<label for="end" class="col-sm-2 control-label">End date</label>
						<div class="col-sm-10">
							<input type="text" name="end" class="form-control" id="end" readonly>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="title" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-10">
							<input type="text" name="title" class="form-control" id="title" placeholder="Title">
						</div>
					</div>
					<div class="form-group">
						<label for="color" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-10">
							<select name="color" class="form-control" id="color">
								<option value="">Choose</option>
								<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#008000;" value="#008000">&#9724; Green</option>						  
								<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
								<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
								<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>

							</select>
						</div>
					</div>
					<div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label class="text-danger"><input type="checkbox"  name="delete"> Delete event</label>
							</div>
						</div>
					</div>

					<input type="hidden" name="id" class="form-control" id="id">


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div><!-- container -->
</div>

<!-- jQuery Version 1.11.1 -->
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/jquery.js"></script>
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/font-awesome.js"></script>
<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="https://pendaftaran.rskiarachmi.co.id/vendors/js/bootstrap.min.js"></script>
<!-- FullCalendar -->
<script type="text/javascript" src='https://pendaftaran.rskiarachmi.co.id/vendors/js/moment.min.js'></script>
<script type="text/javascript" src='https://pendaftaran.rskiarachmi.co.id/vendors/js/fullcalendar.min.js'></script>
<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: '<?php echo $today ?>',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			select: function(start, end) {
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);
			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
				edit(event);
			},
			events: [
			<?php foreach($events as $event): 

				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
				?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});

		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}

			id =  event.id;

			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;

			$.ajax({
				url: 'editEventDate.php',
				type: "POST",
				data: {Event:Event},
				success: function(rep) {
					if(rep == 'OK'){
						alert('Tersimpan!');
					}else{
						alert('Gagal menyimpan. Coba Lagi!'); 
					}
				}
			});
		}
	});
</script>
<br><br><?php include "../../system/copyright.php";?><br><br><!-- /#page-wrapper -->
</body>

</html>
