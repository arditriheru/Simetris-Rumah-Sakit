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
      <?php 
      if(!isset($_SESSION['sdm_status'])){ ?>
        <ul class="nav navbar-nav side-nav">
          <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-plus"></i> Pegawai <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="pegawai-tambah.php?id=1">Tenaga Medis</a></li>
                <li><a href="pegawai-tambah.php?id=0">Tenaga Non Medis</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right navbar-user">
            <li>
              <a href="https://instagram.com/arditriheru" target="_blank">
                <span class="label label-success">ONLINE</span>
              </a>
            </li>
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li class="divider"></li>
                <li>
                  <a href="login.php"><i class="fa fa-sign-in">
                  </i> Log In</a>
                </li>
              </ul>
            </li>
          </ul>
        <?php }else{ ?>
          <ul class="nav navbar-nav side-nav">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-plus"></i> Pegawai <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="pegawai-tampil.php">Lihat</a></li>
                  <li><a href="pegawai-tambah.php?id=2">Tambah</a></li>
                </ul>
              </li>
              <li><a href="pegawai-tampil.php"><i class="fa fa-search"></i> Pencarian</a></li>
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
