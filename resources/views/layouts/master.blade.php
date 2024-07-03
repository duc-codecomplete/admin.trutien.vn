<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="/assets/images/favicon.ico" type="image/ico" />

  <title>Admin Control Panel</title>

  <!-- Bootstrap -->
  <link href="/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="/assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">


  <!-- bootstrap-progressbar -->
  <link href="/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Bảng điều khiển</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="/assets/images/avatar.png" alt="..." class="img-circle profile_img">
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="/"><i class="fa fa-laptop"></i> Trang chủ</a></li>
                <li><a href="/users"><i class="fa fa-users"></i> Thành viên</a></li>
                <li><a href="/chars"><i class="fa fa-user"></i> Nhân vật game</a></li>
                <li><a href="/deposits"><i class="fa fa-money"></i> Lịch Sử Nạp tiền</a></li>
                <li><a href="/revenue"><i class="fa fa-money"></i> Doanh thu theo ngày</a></li>
                <li><a href="/giftcodes"><i class="fa fa-gift"></i> Giftcode</a></li>
                <li><a href="/shops"><i class="fa fa-shopping-cart"></i> Shop vật phẩm</a></li>
                <li><a href="/mail"><i class="fa fa-envelope"></i> Gửi tín sứ</a></li>
                <li><a href="/promotions"><i class="fa fa-send"></i> Khuyến Mãi</a></li>
                <li><a href="/posts"><i class="fa fa-edit"></i> Tin tức</a></li>
                <li><a href="/guilds"><i class="fa fa-diamond"></i> Bang Hội</a></li>
              </ul>
            </div>

          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="/assets/images/logo.png" alt="">{{ Auth::user()->username }}
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="javascript:;"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">Help</a>
                  <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out pull-right"></i> Thoát</a>
                </div>
              </li>

              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown"
                  aria-expanded="false">
                  <i class="fa fa-bell"></i>
                  <span class="badge bg-red">0</span>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  <li class="nav-item">
                    <a class="dropdown-item">
                      <span>
                        <span>{{ Auth::user()->username }}</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Tài khoản xxx đã nạp xxx tiền...
                      </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <div class="text-center">
                      <a class="dropdown-item">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        @yield('content')
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          TruTienVN - Hoạ Ảnh <a href="https://colorlib.com">Giáng Lâm</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="/assets/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="/assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="/assets/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="/assets/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="/assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="/assets/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="/assets/vendors/Flot/jquery.flot.js"></script>
  <script src="/assets/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="/assets/vendors/Flot/jquery.flot.time.js"></script>
  <script src="/assets/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="/assets/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="/assets/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="/assets/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="/assets/vendors/moment/min/moment.min.js"></script>
  <script src="/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="/assets/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/assets/vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="/assets/vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="/assets/vendors/jszip/dist/jszip.min.js"></script>
  <script src="/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="/assets/vendors/pdfmake/build/vfs_fonts.js"></script>
  <script src="/assets/vendors/select2/dist/js/select2.full.min.js"></script>

<script src="/assets/vendors/parsleyjs/dist/parsley.min.js"></script>

<script src="/assets/vendors/autosize/dist/autosize.min.js"></script>

<script src="/assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="/assets/build/js/custom.js"></script>
  @yield('script')
</body>

</html>