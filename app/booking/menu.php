 <?php if($status=='Admin'){ ?>
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="https://instagram.com/arditriheru" class="navbar-brand" target="_blank">S I M E T R I S</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-cek.php"><i class="fa fa-check-square-o"></i> Hari Ini</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-plus"></i> Poliklinik <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="booking-filter.php">Lihat</a></li>
              <li><a href="booking-tambah.php">Tambah</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-plus"></i> Tumbuh Kembang <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="tumbang-filter.php">Lihat</a></li>
                <li><a href="tumbang-tambah.php">Tambah</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i> Antenatal Care <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="anc-filter.php">Lihat</a></li>
                  <li><a href="anc-tambah.php">Tambah</a></li>
                </ul>
              </li>
              <li><a href="bell-antrian-filter.php"><i class="fa fa-bell-o"></i> Bell Antrian</a></li>
              <li><a href="whatsapp.php"><i class="fa fa-whatsapp"></i> WhatsApp</a></li>
              <li><a href="../kalender?id=booking.php"><i class="fa fa-calendar"></i> Kalender</a></li>
              <li><a href="covid-skrining.php"><i class="fa fa-pencil-square-o"></i> Skrining</a></li>
              <li><a href="dokter-tambah.php"><i class="fa fa-user-md"></i> Petugas Medis</a></li>
              <li><a href="jadwal-dokter.php"><i class="fa fa-calendar-check-o"></i> Jadwal</a></li>
              <li><a href="info-kamar.php"><i class="fa fa-bed"></i> Info Kamar</a></li>
              <li><a href="laporan-per-dokter.php"><i class="fa fa-search"></i> Pencarian</a></li>
              <li><a href="zona-merah.php"><i class="fa fa-warning"></i> Zona Merah</a></li>
              <li><a href="../../system/tutorial?id_buku=50.php"><i class="fa fa-file"></i> Dokumentasi</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-user">
              <li>
                <a href="https://instagram.com/arditriheru" target="_blank">
                  <span class="label label-success">ONLINE</span>
                </a>
              </li>
              <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $status.' | '.$nama_login;?>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="divider"></li>
                  <li>
                    <a href="logout.php"><i class="fa fa-power-off">
                    </i> Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          <?php }else{ ?>
            <!-- Sidebar -->
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
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="booking-cek.php"><i class="fa fa-check-square-o"></i> Hari Ini</a></li>
                  <li><a href="bell-antrian-filter.php"><i class="fa fa-bell-o"></i> Bell Antrian</a></li>
                  <li><a href="covid-skrining.php"><i class="fa fa-pencil-square-o"></i> Skrining</a></li>
                  <li><a href="jadwal-dokter.php"><i class="fa fa-calendar"></i> Jadwal</a></li>
                  <li><a href="info-kamar.php"><i class="fa fa-bed"></i> Info Kamar</a></li>
                  <li><a href="laporan-per-dokter.php"><i class="fa fa-search"></i> Pencarian</a></li>
                  <li><a href="zona-merah.php"><i class="fa fa-warning"></i> Zona Merah</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                  <li>
                    <a href="https://instagram.com/arditriheru" target="_blank">
                      <span class="label label-success">ONLINE</span>
                    </a>
                  </li>
                  <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $status.' | '.$nama_login;?>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li class="divider"></li>
                      <li>
                        <a href="logout.php"><i class="fa fa-power-off">
                        </i> Log Out</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              <?php } ?>
