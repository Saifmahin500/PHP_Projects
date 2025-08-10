<!-- Bootstrap 5 CSS & JS CDN  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome CDN -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
  .navbar {
    margin-bottom: 20px;
  }


  body {
    padding-top: 58px;
  }

  /* Navbar Hover Animation */
  .navbar-nav .nav-link {
    position: relative;
    transition: color 0.3s ease;

  }

  .navbar-nav .nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    display: block;
    margin-top: 5px;
    right: 0;
    background: #db47dbff;
    transition: width 0.3s ease;
    -webkit-transition: width 0.3s ease;
  }

  .navbar-nav .nav-link:hover::after {
    width: 100%;
    left: 0;
    background: #140b02ff;
  }

  /* Active Link Highlight */
  .navbar-nav .active>.nav-link {
    color: #070111ff !important;
    font-weight: 600;
  }
  .navbar-brand i,
  .navbar-nav .nav-link i,
  .btn.btn-outline-light i,
  .navbar-nav .nav-link.position-relative i {
    color: #b448cfff !important;
  }
</style>

<nav class="navbar navbar-expand-lg shadow-sm fw-bold fixed-top" style="background-color: #E6E6FA;">
  <div class="container">
    <a class="navbar-brand fw-bold text-uppercase " style="color: #7D3EE4;" href="index.php">
      <i class="fa-solid fa-shop me-2"></i> My Store
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Left Menu -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item active">
          <a class="nav-link" style="color: #7D3EE4;" href="index.php">
            <i class="fa-solid fa-house"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " style="color: #7D3EE4;" href="index.php?view=all">
            <i class="fa-solid fa-th-large"></i> All Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " style="color: #7D3EE4;" href="index.php?view=all">
            <i class="fa-solid fa-info-circle"></i> About Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " style="color: #7D3EE4;" href="index.php?view=all">
            <i class="fa-solid fa-envelope"></i> Contact Us
          </a>
        </li>
      </ul>

      <!-- Search Box -->
      <form class="d-flex me-3" role="search" action="search.php" method="get">
        <input
          class="form-control form-control-sm me-2"
          type="search"
          placeholder="Search products..."
          name="q"
          aria-label="Search" />
        <button class="btn btn-outline-light btn-sm" style="color: #7D3EE4;" type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>

      <!-- Cart & Auth Buttons -->
      <ul class="navbar-nav">
        <li class="nav-item me-3">
          <a class="nav-link position-relative " style="color: #7D3EE4;" href="cart.php">
            <i class="fa-solid fa-cart-shopping fs-5"></i>
            <span
              class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              3
            </span>
          </a>
        </li>

        <!-- login & registration -->
        <li class="nav-item">
          <a class="nav-link btn btn-outline-light btn-sm px-3 me-2" style="color: #7D3EE4;" href="login.php">
            <i class="fa-solid fa-right-to-bracket"></i> Login
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-warning btn-sm px-3" style="color: #7D3EE4;" href="register.php">
            <i class="fa-solid fa-user-plus"></i> Register
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>