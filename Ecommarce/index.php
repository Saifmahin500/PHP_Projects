<?php
require_once 'partials/header.php';
require_once 'partials/navbar.php';
?>

<div class="container_fluid mt-4">
  <div class="row">
    <!-- sidebar -->
    <div class="col-md-3 col-lg-2">
      <?php require_once 'partials/sidebar.php';  ?>
    </div>
    <!-- main contain -->
    <div class="col-md-9 col-lg-10">
      <!--Hero Section -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/07.jpg" class="d-block w-100 slider-img" alt="slide1">
          </div>
          <div class="carousel-item">
            <img src="assets/images/06.jpg" class="d-block w-100 slider-img" alt="...">
          </div>
          <div class="carousel-item">
            <img src="assets/images/08.jpg" class="d-block w-100 slider-img" alt="...">
            <!-- <div class="carousel-caption d-none-block">
              <h5>Welcome to My shop</h5>
              <p>Lorem ipsum dolor sit amet.</p>
            </div> -->
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>

      <!-- products -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mt-2 mb-2">Products</h4>
        <small class="text-muted">Filter by categories from left.</small>
      </div>
      <!-- Products Grid -->
      <div id="productGrid" class="row"></div>



    </div>

  </div>

</div>

<?php require_once 'partials/footer.php'; ?>