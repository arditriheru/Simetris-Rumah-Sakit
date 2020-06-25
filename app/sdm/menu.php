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
    <a class="navbar-brand">SIMETRIS</a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li class="active"><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <i class="fa fa-check-square-o"></i> User <b class="caret"></b></a>
         <ul class="dropdown-menu">
          <li><a href="user_tampil">Lihat User</a></li>
          <li><a href="user_tambah">Tambah User</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <i class="fa fa-check-square-o"></i> Hak Akses <b class="caret"></b></a>
         <ul class="dropdown-menu">
          <li><a href="pegawai-tampil">Lihat Hak Akses</a></li>
          <li><a href="pegawai-tambah">Tambah Hak Akses</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <i class="fa fa-check-square-o"></i> Surat Masuk <b class="caret"></b></a>
         <ul class="dropdown-menu">
          <li><a href="suratmasuk_tampil">Lihat Surat</a></li>
          <li><a href="suratmasuk_tambah">Tambah Surat</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         <i class="fa fa-check-square-o"></i> Surat Keluar <b class="caret"></b></a>
         <ul class="dropdown-menu">
          <li><a href="suratkeluar_tampil">Lihat Surat</a></li>
          <li><a href="suratkeluar_tambah">Tambah Surat</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right navbar-user">
      <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-gear"></i><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li class="divider"></li>
          <li><a href="logout"><i class="fa fa-power-off"></i> Log Out</a></li>
        </ul>
      </li>
    </ul>