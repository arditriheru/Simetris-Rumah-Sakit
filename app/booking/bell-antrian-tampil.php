<?php include "views/header.php"; ?>
<nav>
	<div id="wrapper">
		<?php include "menu.php"; ?>
	</div><!-- /.navbar-collapse -->
</nav>
<?php 
$a = mysqli_query($koneksi,
	"SELECT dokter.nama_dokter, sesi.nama_sesi
	FROM booking, dokter, sesi
	WHERE booking.id_dokter=dokter.id_dokter
	AND booking.id_sesi=sesi.id_sesi
	AND booking.id_dokter = '$id_dokter';");
while($b = mysqli_fetch_array($a)){
	$nama_dokter 	= $b['nama_dokter'];
}
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1>Antrian<small> <?php echo $nama_dokter; ?></small></h1>
			<ol class="breadcrumb">
				<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
				<li><a href="booking-filter"><i class="fa fa-bell-o"></i> Antrian</a></li>
				<li class="active"><i class="fa fa-thumb-tack"></i> Poliklinik</li>
			</ol>  
			<?php include "../../system/welcome.php"?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<button name="next" type="submit" 
			class="btn btn-primary" onClick="window.location.reload()"><i class="fa fa-refresh"></i> Refresh</button>
			<a href="bell-antrian-selesai.php?<?php echo 'dokter='.$id_dokter.'&'.'sesi='.$id_sesi ?>"><button name="next" type="submit" 
				class="btn btn-danger""><i class="fa fa-close"></i> Selesai</button></a>
			</div>
			<div align="right" class="col-lg-8">
				<?php 
				$a = mysqli_query($koneksi,
					"SELECT antrian, COUNT(id_booking) AS total
					FROM booking
					WHERE id_dokter='$id_dokter'
					AND id_sesi='$id_sesi'
					AND booking_tanggal='$jadwal';");
				while($b = mysqli_fetch_array($a)){
					$total = $b['total'];
				}

				$id_aktif = $_GET['id'];
				if(isset($id_aktif)){
					mysqli_query($koneksi,"UPDATE booking SET aktif='0' WHERE aktif='1' AND booking_tanggal = '$jadwal' AND id_sesi = '$id_sesi' AND id_dokter='$id_dokter'");
					mysqli_query($koneksi,"UPDATE booking SET aktif='1' WHERE id_booking=$id_aktif");
					$c = mysqli_query($koneksi,
						"SELECT booking.antrian, mr_unit.id_unit
						FROM booking, mr_unit, dokter
						WHERE booking.id_dokter=dokter.id_dokter
						AND dokter.id_unit=mr_unit.id_unit
						AND booking.booking_tanggal = '$jadwal'
						AND booking.id_sesi = '$id_sesi'
						AND booking.id_dokter='$id_dokter'
						AND booking.aktif=1;");
					while($d = mysqli_fetch_array($c)){
						$id_unit	= $d['id_unit'];
						$ant 		= $d['antrian'];
					}
					mysqli_query($koneksi,"UPDATE antrian SET antrian='$ant', total='$total' WHERE id_unit='$id_unit'");
				}
				?>
				<h1><small>Total <?php echo $total; ?> Pasien</small></h1>
			</div>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped tablesorter">
				<thead>
					<tr>
						<th><center>Datang</center></th>
						<th><center>#</center></th>
						<th><center>Bell</center></th>
						<th><center>Timer</center></th>
						<th><center>No.RM</center></th>
						<th><center>Nama</center></th>
						<th><center>Alamat</center></th>
						<th><center>Sesi</center></th>
						<th><center>Action</center></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					$data = mysqli_query($koneksi,"SELECT @no:=@no+1 AS noant, booking.id_booking, booking.id_catatan_medik, booking.alamat, booking.nama, booking.aktif, booking.antrian, dokter.nama_dokter, booking.mulai, booking.akhir, dokter.id_unit, sesi.nama_sesi,
						IF (booking.status='1', 'Datang', 'Belum Datang') AS status
						FROM booking, dokter, sesi
						JOIN (SELECT @no:=0) r
						WHERE booking.id_dokter=dokter.id_dokter
						AND booking.id_sesi=sesi.id_sesi
						AND booking.booking_tanggal = '$jadwal'
						AND booking.id_sesi = '$id_sesi'
						AND booking.id_dokter='$id_dokter' ORDER BY booking.id_booking ASC;");
					while($d = mysqli_fetch_array($data)){
						$id_booking 	= $d['id_booking'];
						?>
						<tr>
							<td><center><?php
							if($d['status']=='Datang'){
								echo "<button type='button' class='btn btn-primary'><i class='fa fa-check'></i></button>";
							}else{
								echo "<button type='button' class='btn btn-danger'><i class='fa fa-times'></i></button>";
							}
							?>
						</center></td>
						<td><center><?php echo $d['noant']; ?></center></td>
						<td>
							<div align="center">
								<?php
								if($d['aktif']=='1'){ ?>
									<button type="button" id="<?php echo $noant; ?>" onclick="mulai(this.id);" class="btn btn-success"><i class='fa fa-volume-up'></i></button>
								<?php }else{
									echo "<a href='?id=$id_booking'><button type='button' class='btn btn-link'><i class='fa fa-stop'></i></button></a>";
								}
								?>
							</div>
						</td>
						<td><center>
							<?php
							if($d['mulai']=="00:00:00"){ ?>

								<a href="jam-dilayani-mulai.php?id_booking=<?php echo $d['id_booking']; ?>"><button type='button' class='btn btn-primary'><i class='fa fa-hourglass-start'></i></button></a>

							<?php }elseif($d['akhir']=="00:00:00"){ ?>

								<a href="jam-dilayani-akhir.php?id_booking=<?php echo $d['id_booking']; ?>"><button type='button' class='btn btn-warning'><i class='fa fa-hourglass-end'></i></button></a>

							<?php }else{

                    $mulai = strtotime($d['mulai']); //waktu mulai
                    $akhir = strtotime($d['akhir']); //waktu akhir
                    $diff  = $akhir - $mulai;
                    $jam   = floor($diff/(60*60));
                    $menit = $diff-$jam*(60*60);
                    echo $jam."' ".floor($menit/60)."''";

                } ?>
            </center></td>
            <td><center><?php echo $d['id_catatan_medik']; ?></center></td>
            <td><center><?php echo $d['nama']; ?></center></td>
            <td><center><?php echo $d['alamat']; ?></center></td>
            <td><center><?php echo $d['nama_sesi']; ?></center></td>
            <td>
            	<div align="center">
            		<a href="booking-detail.php?id_booking=<?php echo $d['id_booking']; ?>"
            			<button type="button" class="btn btn-warning"><i class='fa fa-folder-open-o'></i></button></a>
            		</div>
            	</td>
            	</tr><?php } ?>
            </tbody>
        </table>
    </div>
</div><!-- /#wrapper -->
<?php include "views/footer.php"; ?>

<!-- /#rekaman -->
<audio id="suarabel" src="rekaman/bell-bandara.mp3"></audio>
<audio id="suarabelnomorurut" src="rekaman/nomor-antrian.mp3"></audio>
<?php
if($konter==1){ ?>
	<audio id="suarabelabjad" src="rekaman/a.mp3"></audio> 
	<audio id="suarabelsuarabelloket" src="rekaman/ke-poli-kandungan.mp3"></audio>
<?php }elseif($konter==2){ ?>
	<audio id="suarabelabjad" src="rekaman/b.mp3"></audio>
	<audio id="suarabelsuarabelloket" src="rekaman/ke-poli-anak.mp3"></audio>
<?php }elseif($konter==3){ ?>
	<audio id="suarabelabjad" src="rekaman/c.mp3"></audio> 
	<audio id="suarabelsuarabelloket" src="rekaman/ke-poli-kandungan.mp3"></audio>
<?php } ?>

<audio id="belas" src="rekaman/belas.mp3"></audio> 
<audio id="sebelas" src="rekaman/sebelas.mp3"></audio> 
<audio id="puluh" src="rekaman/puluh.mp3"></audio> 
<audio id="sepuluh" src="rekaman/sepuluh.mp3"></audio> 
<audio id="ratus" src="rekaman/ratus.mp3"></audio> 
<audio id="seratus" src="rekaman/seratus.mp3"></audio>
<?php
		// $id_booking = $_GET['id'];
	// 	SELECT id, name, score, FIND_IN_SET( score, (
	// 		SELECT GROUP_CONCAT( score
	// 			ORDER BY score DESC ) 
	// 		FROM scores )
	// ) AS rank
	// 	FROM scores
$e = mysqli_query($koneksi,
	"SELECT id_booking, nama, FIND_IN_SET( id_booking, (    
	SELECT GROUP_CONCAT( id_booking
	ORDER BY id_booking ASC ) 
	FROM booking 
	WHERE booking_tanggal = '$jadwal'
	AND id_dokter = '$id_dokter'
	AND id_sesi = '$id_sesi')
	) AS noant
	FROM booking
	WHERE id_booking = '$id_aktif';");
while($f = mysqli_fetch_array($e)){
	$tcounter   = $f['noant'];
	$panjang  	= strlen($tcounter);
}
for($i=0;$i<$panjang;$i++){
	?>
	<!--SUARA NOMOR URUT-->
	<audio id="suarabel<?php echo $i;?>"
		src="rekaman/<?php echo substr($tcounter,$i,1); ?>.mp3" >
	</audio>
<?php } ?>
<script type="text/javascript">
	function mulai(clicked_id){
		var variableToSend = clicked_id;
		$.post('bell-antrian-tampil.php', {variable: variableToSend});
			//MAINKAN SUARA BEL PADA SAAT AWAL
			document.getElementById('suarabel').pause();
			document.getElementById('suarabel').currentTime=0;
			document.getElementById('suarabel').play();
			//SET DELAY UNTUK MEMAINKAN REKAMAN NOMOR URUT		
			totalwaktu=document.getElementById('suarabel').duration*1030;	
			//MAINKAN SUARA NOMOR URUT		
			setTimeout(function() {
				document.getElementById('suarabelnomorurut').pause();
				document.getElementById('suarabelnomorurut').currentTime=0;
				document.getElementById('suarabelnomorurut').play();
			}, totalwaktu);
			totalwaktu=totalwaktu+1500;
			//MAINKAN SUARA ABJAD		
			setTimeout(function() {
				document.getElementById('suarabelabjad').pause();
				document.getElementById('suarabelabjad').currentTime=0;
				document.getElementById('suarabelabjad').play();
			}, totalwaktu);
			totalwaktu=totalwaktu+500;
			<?php
				//JIKA KURANG DARI 10 MAKA MAIKAN SUARA ANGKA1
			if($tcounter<10){
				?>
				setTimeout(function() {
					document.getElementById('suarabel0').pause();
					document.getElementById('suarabel0').currentTime=0;
					document.getElementById('suarabel0').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php		
			}elseif($tcounter ==10){
					//JIKA 10 MAKA MAIKAN SUARA SEPULUH
				?>  
				setTimeout(function() {
					document.getElementById('sepuluh').pause();
					document.getElementById('sepuluh').currentTime=0;
					document.getElementById('sepuluh').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php		
			}elseif($tcounter ==11){
					//JIKA 11 MAKA MAIKAN SUARA SEBELAS
				?>  
				setTimeout(function() {
					document.getElementById('sebelas').pause();
					document.getElementById('sebelas').currentTime=0;
					document.getElementById('sebelas').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php		
			}elseif($tcounter < 20){
					//JIKA 12-20 MAKA MAIKAN SUARA ANGKA2+"BELAS"
				?>  				
				setTimeout(function() {
					document.getElementById('suarabel1').pause();
					document.getElementById('suarabel1').currentTime=0;
					document.getElementById('suarabel1').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				setTimeout(function() {
					document.getElementById('belas').pause();
					document.getElementById('belas').currentTime=0;
					document.getElementById('belas').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php		
			}elseif($tcounter < 100){				
					//JIKA PULUHAN MAKA MAINKAN SUARA ANGKA1+PULUH+AKNGKA2
				?>  
				setTimeout(function() {
					document.getElementById('suarabel0').pause();
					document.getElementById('suarabel0').currentTime=0;
					document.getElementById('suarabel0').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				setTimeout(function() {
					document.getElementById('puluh').pause();
					document.getElementById('puluh').currentTime=0;
					document.getElementById('puluh').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				setTimeout(function() {
					document.getElementById('suarabel1').pause();
					document.getElementById('suarabel1').currentTime=0;
					document.getElementById('suarabel1').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php
			}elseif($tcounter == 100){
				//JIKA 100 MAKA MAIKAN SUARA SERATUS
				?>
				setTimeout(function() {
					document.getElementById('seratus').pause();
					document.getElementById('seratus').currentTime=0;
					document.getElementById('seratus').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php
			}elseif($tcounter < 200){
				//JIKA 101-109 MAKA MAIKAN SUARA SERATUS
				?>
				setTimeout(function() {
					document.getElementById('seratus').pause();
					document.getElementById('seratus').currentTime=0;
					document.getElementById('seratus').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				setTimeout(function() {
					document.getElementById('suarabel2').pause();
					document.getElementById('suarabel2').currentTime=0;
					document.getElementById('suarabel2').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php
			}elseif($tcounter == 110){
				//JIKA 101-109 MAKA MAIKAN SUARA SERATUS
				?>
				setTimeout(function() {
					document.getElementById('seratus').pause();
					document.getElementById('seratus').currentTime=0;
					document.getElementById('seratus').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				setTimeout(function() {
					document.getElementById('sepuluh').pause();
					document.getElementById('sepuluh').currentTime=0;
					document.getElementById('sepuluh').play();
				}, totalwaktu);
				totalwaktu=totalwaktu+800;
				<?php
			}else{
					//JIKA LEBIH DARI 100 
					//Karena aplikasi ini masih sederhana maka logina konversi hanya sampai 100
					//Selebihnya akan langsung disebutkan angkanya saja 
					//tanpa kata "RATUS", "PULUH", maupun "BELAS"
				?>
				<?php 
				for($i=0;$i<$panjang;$i++){
					?>
					totalwaktu=totalwaktu+800;
					setTimeout(function() {
						document.getElementById('suarabel<?php echo $i; ?>').pause();
						document.getElementById('suarabel<?php echo $i; ?>').currentTime=0;
						document.getElementById('suarabel<?php echo $i; ?>').play();
					}, totalwaktu);
					<?php
				}
			}
			?>
			totalwaktu=totalwaktu+200;
			setTimeout(function() {
				document.getElementById('suarabelsuarabelloket').pause();
				document.getElementById('suarabelsuarabelloket').currentTime=0;
				document.getElementById('suarabelsuarabelloket').play();
			}, totalwaktu);
			totalwaktu=totalwaktu+200;
			setTimeout(function() {
				document.getElementById('suarabelloket<?php echo $loket; ?>').pause();
				document.getElementById('suarabelloket<?php echo $loket; ?>').currentTime=0;
				document.getElementById('suarabelloket<?php echo $loket; ?>').play();
			}, totalwaktu);	
		}
	</script>