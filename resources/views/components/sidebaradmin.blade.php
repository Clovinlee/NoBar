<style>
  body {
  background-color: #fbfbfb;
}
@media (min-width: 991.98px) {
  main {
    padding-left: 240px;
  }
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 240px;
  z-index: 600;
}

@media (max-width: 991.98px) {
  .sidebar {
    width: 100%;
  }
}
.sidebar .active {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
  position: relative;
  top: 0;
  height: calc(100vh - 48px);
  padding-top: 0.5rem;
  overflow-x: hidden;
  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
</style>
<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <span href="#" class="list-group-item list-group-item-action py-2 ripple pointer active" aria-current="true" onclick="PageChange(event)" target="0" id="nav_dashboard">
          <i span onclick="PageChange(event)" target="0" class="fas fa-tachometer-alt fa-fw me-3"></i>Main dashboard
        </span>
        <span onclick="PageChange(event)" href="" target="1" id="nav_branch" class="list-group-item list-group-item-action py-2 ripple"
          ><i span onclick="PageChange(event)" target="1" class="fas fa-building fa-fw me-3" ></i><span onclick="PageChange(event)" target="1">Branch</span></span>
        <span id="nav_movie" onclick="PageChange(event)" href="" target="2" class="list-group-item list-group-item-action py-2 ripple"><i span onclick="PageChange(event)" target="2" class="fas fa-money-bill fa-fw me-3"></i><span span onclick="PageChange(event)" target="2">Movie</span></span
        >
        <span onclick="PageChange(event)" href="" target="3" id="nav_snack" class="list-group-item list-group-item-action py-2 ripple"
          ><i span onclick="PageChange(event)" target="3" class="fas fa-coffee fa-fw me-3" ></i><span span onclick="PageChange(event)" target="3">Snack</span></span>
          <span onclick="PageChange(event)" href="" target="4" id="nav_schedule" class="list-group-item list-group-item-action py-2 ripple"
          ><i span onclick="PageChange(event)" target="4" class="fas fa-calendar fa-fw me-3" ></i><span span onclick="PageChange(event)" target="4">Schedule</span></span>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->
  <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#sidebarMenu"
        aria-controls="sidebarMenu"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>

      <!-- Brand -->
      <a class="navbar-brand" href="#">
        <img src="{{asset('assets/img/logo/logo.png')}}" width="50px" alt="">
      </a>

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <form action="{{url('/logout')}}" method="post" class="d-inline">
          @csrf
        <button type="submit" class="btn btn-primary">LOGOUT</button>
        </form>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4"></div>
</main>
<!--Main layout-->
<script>
  
</script>