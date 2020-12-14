<!-- Sidebar -->
<div class="sidebar-fixed position-fixed">

    <a class="logo-wrapper waves-effect">
      <H1 style="color: rgb(5, 154, 199); font-weight:700;">AI.JOBS</H1>
    </a>

    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item active waves-effect">
            <i class="fa fa-pie-chart mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-user mr-3"></i>Profile</a>
        <div class="dropdown">
        <a href="#" class="list-group-item list-group-item-action waves-effect dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user mr-3"></i>Lowongan</a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ url('category') }}">Kategori</a>
                  <a class="dropdown-item" href="{{ url('lowongan') }}">Lowongan</a>
                </div>
              </div>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-table mr-3"></i>Tables</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>Maps</a>
        <a href="{{ url('daftar-user') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-users mr-3"></i>Daftar User</a>
    </div>

  </div>
  <!-- Sidebar -->
