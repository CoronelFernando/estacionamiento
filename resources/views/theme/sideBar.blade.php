<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-car"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Smart Parking</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{url('home')}}">
      <i class="fas fa-map-marked"></i>
      <span>Layout</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('estadisticas')}}">
      <i class="fas fa-chart-pie"></i>
      <span>Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('reservados')}}">
      <i class="fas fa-calendar-alt"></i>
      <span>Reservation</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('historial')}}">
      <i class="fas fa-history"></i>
      <span>History</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('configuracion')}}">
      <i class="fas fa-cogs"></i>
      <span>Settings</span>
    </a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
<!-- End of Sidebar -->