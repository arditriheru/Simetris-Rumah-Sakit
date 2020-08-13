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
      <a href="https://instagram.com/arditriheru" class="navbar-brand">S I M E T R I S</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav side-nav">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="booking-cek"><i class="fa fa-check-square-o"></i> Hari Ini</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-plus"></i> Poliklinik <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="booking-filter">Lihat</a></li>
              <li><a href="booking-tambah">Tambah</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-plus"></i> Tumbuh Kembang <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="tumbang-filter">Lihat</a></li>
                <li><a href="tumbang-tambah">Tambah</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i> Antenatal Care <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="anc-filter">Lihat</a></li>
                  <li><a href="anc-tambah">Tambah</a></li>
                </ul>
              </li>
              <li><a href="../kalender"><i class="fa fa-calendar"></i> Kalender</a></li>
              <li><a href="covid-skrining"><i class="fa fa-pencil-square-o"></i> Skrining</a></li>
              <li><a href="dokter-tambah"><i class="fa fa-user-md"></i> Petugas Medis</a></li>
              <li><a href="jadwal-dokter"><i class="fa fa-calendar"></i> Jadwal</a></li>
              <li><a href="info-kamar"><i class="fa fa-bed"></i> Info Kamar</a></li>
              <li><a href="laporan-per-dokter"><i class="fa fa-search"></i> Pencarian</a></li>
              <li><a href="zona-merah"><i class="fa fa-warning"></i> Zona Merah</a></li>
              <li><a href="../../system/tutorial?id_buku=50"><i class="fa fa-file"></i> Dokumentasi</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right navbar-user">
              <li class="dropdown user-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $status.' | '.$nama_login;?>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li class="divider"></li>
                  <li>
                    <a href="logout"><i class="fa fa-power-off">
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
                  <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="booking-cek"><i class="fa fa-check-square-o"></i> Hari Ini</a></li>
                  <li><a href="covid-skrining"><i class="fa fa-pencil-square-o"></i> Skrining</a></li>
                  <li><a href="jadwal-dokter"><i class="fa fa-calendar"></i> Jadwal</a></li>
                  <li><a href="info-kamar"><i class="fa fa-bed"></i> Info Kamar</a></li>
                  <li><a href="laporan-per-dokter"><i class="fa fa-search"></i> Pencarian</a></li>
                  <li><a href="zona-merah"><i class="fa fa-warning"></i> Zona Merah</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                  <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <?php echo $status.' | '.$nama_login;?>&nbsp;<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li class="divider"></li>
                      <li>
                        <a href="logout"><i class="fa fa-power-off">
                        </i> Log Out</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              <?php } ?>
