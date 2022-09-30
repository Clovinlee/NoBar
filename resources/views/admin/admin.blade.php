
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- PRISM -->
    <link rel="stylesheet" href="dev/css/new-prism.css" />
    <!-- Custom styles -->
    <style>
      .page-intro {
        background-color: white;
        width: 100vw;
        height: 100vh;
      }

      mask {
        width: 100%;
      }

      .mask img {
        max-width: 80%;
      }

      @media (max-width: 660px) {
        .mask img {
          width: 100%;
        }
      }
    </style>
  </head>

  <body>
    <div id="full-screen-example" class="sidenav">
      <div class="mt-4">
        <div id="header-content" class="pl-3">
          <img
            src="https://mdbootstrap.com/img/Photos/Avatars/img%20(26).jpg"
            alt="avatar"
            class="rounded-circle img-fluid mb-3"
            style="max-width: 50px;"
          />

          <h4>
            Ann Smith
          </h4>
          <p>ann_s@mdbootstrap.com</p>
        </div>
        <hr class="mb-0" />
      </div>
      <div>
        <ul class="sidenav-menu">
          <li class="sidenav-item">
            <a class="sidenav-link" href="/"> <i class="fas fa-envelope pr-3"></i>Inbox</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link" href="#test-link">
              <i class="fas fa-paper-plane pr-3"></i>Outbox</a
            >
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-address-book pr-3"></i>Contacts</a>
            <ul class="sidenav-collapse">
              <li class="sidenav-item">
                <a class="sidenav-link">Family</a>
              </li>
              <li class="sidenav-item">
                <a class="sidenav-link" href="/previews/mdb-ui-kit/sidenav/1.html">Friends</a>
              </li>
              <li class="sidenav-item">
                <a class="sidenav-link">Work</a>
              </li>
            </ul>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-file pr-3"></i>Drafts</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-heart pr-3"></i>Favourites</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-star pr-3"></i>Starred</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-trash pr-3"></i>Trash</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-ban pr-3"></i>Spam</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"><i class="fas fa-tag pr-3"></i>Categories</a>
            <ul class="sidenav-collapse">
              <li class="sidenav-item">
                <a class="sidenav-link">Social</a>
              </li>
              <li class="sidenav-item">
                <a class="sidenav-link">Notifications</a>
              </li>
              <li class="sidenav-item">
                <a class="sidenav-link">Recent</a>
              </li>
              <li class="sidenav-item">
                <a class="sidenav-link">Uploads</a>
              </li>
              <li class="sidenav-item">
                <a class="sidenav-link">Backups</a>
              </li>
              <li class="sidenav-item">
                <a class="sidenav-link">Offers</a>
              </li>
            </ul>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-sticky-note pr-3"></i>Notes</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-user-circle pr-3"></i>Personal</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-ellipsis-h pr-3"></i>More</a>
          </li>
        </ul>
        <hr class="m-0" />
        <ul class="sidenav-menu">
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-cogs pr-3"></i>Settings</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-user pr-3"></i>Profile</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-shield-alt pr-3"></i>Privacy</a>
          </li>
          <li class="sidenav-item">
            <a class="sidenav-link"> <i class="fas fa-user-astronaut pr-3"></i>Log out</a>
          </li>
        </ul>
      </div>
      <div class="text-center" style="height: 100px;">
        <hr class="mb-4 mt-0" />
        <p>MDBootstrap.com</p>
      </div>
    </div>

    <div class="mdb-page-content text-center page-intro bg-light">
      <div class="mask text-center py-5">
        <button
          id="toggler"
          class="btn btn-primary m-5"
          data-toggle="sidenav"
          y
          data-target="#full-screen-example"
        >
          <i class="fas fa-bars"></i>
        </button>
        <div>
          <img class="rounded" src="https://mdbootstrap.com/img/Photos/Others/img%20(45).jpg" />
        </div>
      </div>
    </div>

    <!-- PRISM -->
    <script type="text/javascript" src="dev/js/new-prism.js"></script>
    <!-- MDB SNIPPET -->
    <script type="text/javascript" src="dev/js/dist/mdbsnippet.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <!-- Custom scripts -->
    <script type="text/javascript"></script>
  </body>
</html>
