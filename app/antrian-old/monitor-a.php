<?php include "views/header.php";?>
<?php include "controller/anak-session.php"; ?>
<?php include "controller/kandungan-session.php"; ?>
<body bgcolor="#248ea9" style="margin:0;" onload="waktu()">

	<!-- <marquee direction="left" bgcolor="#ff971d" width="auto"><font class="marquee1">Selamat Datang di RSKIA Rachmi Yogyakarta</font></marquee>
		<marquee direction="right" bgcolor="#005082" width="auto"><font class="marquee2">Melayani Dengan Kasih dan Sayang</font></marquee> -->
		<div id="page-wrapper">
			<div class="row">
				<div align="left" class="col-lg-1">
					<h3 class="whitetext"><?php include "views/digital-timer.php";?></h3>
				</div>
				<div class="col-lg-11">
					<marquee direction="left" bgcolor="#248ea9" width="auto"><font class="marquee1">Selamat Datang di RSKIA Rachmi Yogyakarta</font></marquee>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-3">
							<div class="row">
								<div align="center" class="panel-queue panel-primary-queue">
									<div class="panel-heading">
										<h3>Poli Anak</h3>
									</div>
									<div class="bs-example">
										<?php 
										include "anak-antrian.php";
										?><br><br>
									</div>
								</div>
							</div>
							<div class="row">
								<div align="center" class="panel-queue panel-primary-queue">
									<div class="panel-heading">
										<h3>Poli Kandungan</h3>
									</div>
									<div class="bs-example">
										<?php 
										include "kandungan-antrian.php";
										?><br><br>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-9">
							<video width="100%" height="770px" controls loop>
								<source src="../../../video/Profil.mp4" type=video/mp4>
								</video>
							</div>
						</div>
					</div>
				</div><!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<marquee direction="right" bgcolor="#248ea9" width="auto"><font class="marquee1">Melayani Dengan Kasih dan Sayang</font></marquee>
					</div>
				</div>
				<div id="page-wrapper">
					<div class="row">
						<div align="right"><h4><b class="whitetext">Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> | <a expr:href='data:blog.homepageUrl'><data:blog.title/></a> <a class="whitetext" href="https://instagram.com/arditriheru">Tim Teknologi Informasi</b></a></h4></div>
					</div>
				</div>
				<!-- <br><div class="whitetext" align="center"><h4><b>Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script></b> All Right Reserved.<br><a expr:href='data:blog.homepageUrl'><data:blog.title/></a> <a href="https://instagram.com/arditriheru"><b class="whitetext">Tim Teknologi Informasi</b></a><br>Long Term Support<br><font face="consolas" >Version 5.0</font></h4></div> -->
			</div><!-- /.wrapper -->
		</body>
		<?php include "views/footer.php";?>
