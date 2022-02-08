<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Bootstrap core CSS -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/business-casual.min.css" rel="stylesheet">

</head>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Durian guarantee premeime grade</span>
    <span class="site-heading-upper">ทุเรียนออนไลน์การัตรีเกรดพรีเมี่ยม</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/">หน้าหลัก
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/about">เกี่ยวกับ</a>
            
          </li>
          @if (Auth::check())
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/Order">สั่งสินค้า</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/buy">รายการชำระเงิน</a>
          </li>

          @if(auth()->user()->admin())
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            การจัดการสินค้า
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/Orderforadmin">สั่งสินค้า</a>
              <a class="dropdown-item" href="/Product">สินค้า</a>
              <a class="dropdown-item" href="/ProductType">ประเภทสินค้า</a>
              <a class="dropdown-item" href="/grade">เกรด</a>
              <div class="dropdown-divider"></div>
              
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ผู้ใช้
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/user">ผู้ใช้</a>
              <a class="dropdown-item" href="/supplier">ผู้ผลิต</a>
              <div class="dropdown-divider"></div>
              
            </div>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              รายงาน
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/profit">กำไรขาดทุน</a>
              <a class="dropdown-item" href="/supplier_order">รายการสั่งสินค้า</a>
              <div class="dropdown-divider"></div>
              
            </div>
          </li>

          @endif
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/logout">ออกจาระบบ</a>
          </li>
          @else
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/register">ลงทะเบียน</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/login">ลงชื่อเข้าใช้</a>
          </li>
          @endif


        </ul>
      </div>
    </div>
  </nav>
  @yield('content')

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; Your Website 2019</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  @yield('script')
</body>

</html>