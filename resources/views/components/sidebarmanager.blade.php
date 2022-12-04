
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

.sidebar li .submenu{ 
	list-style: none; 
	margin: 0; 
	padding: 0; 
	padding-left: 1rem; 
	padding-right: 1rem;
}
</style>
<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        
        {{-- <ul class="nav flex-column" id="nav_accordion"> --}}
        <ul class="sidenav-menu">
          <span href="#" class="list-group-item list-group-item-action py-2 ripple pointer" aria-current="true" onclick="PageChange(event)" target="0" id="nav_dashboard">
            <i class="fas fa-tachometer-alt fa-fw me-3"></i>Main dashboard
          </span>
          <span onclick="PageChange(event)" href="/manager/laporan" target="1" id="nav_report_profit" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-bar-chart fa-fw me-3" ></i>
              <span>Report Profit</span>
          </span>
          <span onclick="PageChange(event)" href="" target="2" id="nav_report_movie" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-pie-chart fa-fw me-3" ></i>
              <span>Report Movie</span>
          </span>
          <span onclick="PageChange(event)" href="" target="3" id="nav_report_crowd" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-line-chart fa-fw me-3" ></i>
              <span>Report Crowd</span>
          </span>
          <span onclick="PageChange(event)" href="" target="4" id="nav_report_snack" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-bar-chart fa-fw me-3" ></i>
              <span>Report Snack</span>
         </span>
         <span onclick="PageChange(event)" href="" target="5" id="nav_report_branch" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-bar-chart fa-fw me-3" ></i>
              <span>Report Branch</span>
         </span>
         <span onclick="PageChange(event)" href="" target="6" id="nav_master_karyawan" class="list-group-item list-group-item-action py-2 ripple "><i class="fas fa-bar-chart fa-fw me-3" ></i>
              <span>Master Karyawan</span>
         </span>

          {{-- <li class="nav-item has-submenu"> // ini backup plan untuk submenu pada sidebar
            <a class="nav-link"  href="#">Report</a>
            <ul class="submenu collapse">
              <li><a class="nav-link" href="#">Report Trans Admin</a></li>
              <li><a class="nav-link" href="#">Report Trans User</a></li>
            </ul>
          </li> --}}

          {{-- <li class="sidenav-item">
            <a href="/" class="sidenav-link ripple-surface-primary" data-mdb-toggle="collapse" role="button" aria-expanded="true">
              <div>
                <i class="fas fa-bar-chart fa-fw me-3"></i>
              </div>
              <span>Report</span>
              <i class="fas fa-angle-down rotate-icon" style="transition-property: transform, transform: rotate(180deg);"></i>
            </a>

            <ul class="sidenav-collapse collapse show" style="transition-property: height;">
              <li class="sidenav-item">
                  <a href="#" class="sidenav-link ripple-surface">REPORT TRANS ADMIN</a>
              </li>
            </ul>
          </li> --}}



        
        </ul>
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
        NOBAR MANAGER
      </a>
      <!-- Search form -->
      <form class="d-none d-md-flex input-group w-auto my-auto">
        <input
          autocomplete="off"
          type="search"
          class="form-control rounded"
          placeholder='Search (ctrl + "/" to focus)'
          style="min-width: 225px;"
        />
        <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
      </form>

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <a href="" class="btn btn-primary">LOGOUT</a>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4">
    @yield('body-nav')
  </div>
</main>
<!--Main layout-->
<script>
  document.addEventListener("DOMContentLoaded", function(){
  document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
    element.addEventListener('click', function (e) {

      let nextEl = element.nextElementSibling;
      let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                }
            }
        }
    }); // addEventListener
  }) // forEach
});
</script>
