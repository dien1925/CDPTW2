<nav class="navbar navbar-expand-md header-background navbar-dark">
  <a class="navbar-brand" href="{{ route('home') }}">
      <i class="fas fa-home"></i>
      <h5>Home</h5>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
  </button>
  <form class="form-inline" action="{{ route('home.find') }}" method="post">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="search" name="keywords" placeholder="Nhập tên sản phẩm cần tìm">
      <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
  </form>
  <div class="navbar-collapse justify-content-end inner-header" id="collapsibleNavbar">
      <ul class="navbar-nav" style="float: right;">
          @guest
          <li class="nav-item cart-icon">
              <a class="nav-link btn btn-success" href="{{ url('List-Carts') }}">
                  <i class="fas fa-cart-arrow-down"></i>
                  <b>Giỏ hàng</b>
                  @if (Session::has("Cart") != null)
                      <span style="width: 25px;" id="total-quantity-show" class="badge badge-success ml-3">{{ Session::get("Cart")->totalQuanty }}</span>
                  @else
                      <span style="width: 25px;" id="total-quantity-show" class="badge badge-success ml-3">0</span>
                  @endif
              </a>
              <div class="cart-hover">
                  <div id="change-item-cart">
                      <div class="select-items">
                          <table>
                              <tbody>
                                  <tr>
                                      <td class="si-pic"><img src="{{ asset('upload/mn1.webp') }}" style="vertical-align: middle; width:80px;margin-right: 30px" alt=""></td>
                                      <td class="si-text">
                                          <div class="product-selected">
                                              <b>2.999.000 VNĐ x 2</b>
                                              <h6>Màn hình Samsung LS24C360EAEXXV/24 inch/FHD(1920x1080)/75Hz</h6>
                                          </div>
                                      </td>
                                      <td class="si-close">
                                          <h4><a class="" data-id="" role="button"><i class="far fa-times"></i></a></h4>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="select-total">
                          <h6>TỔNG TIỀN:</h6>
                          <h5>4.999.000 VNĐ</h5>
                      </div>
                      <div class="select-button">
                          <a href="{{ url('List-Carts') }}" class="primary-btn view-card"><b>XEM GIỎ HÀNG</b></a>
                          <a href="#" class="primary-btn checkout-btn"><b>THANH TOÁN</b></a>
                      </div>
                      <h4 style="color: #4A235A;">Vui lòng thêm sản phẩm</h4>
                  </div>
              </div>
          </li>
          <li class="nav-item">
              <a class="nav-link btn btn-info" href="{{ route('login') }}"><b>Đăng nhập</b></a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
              <a class="nav-link btn btn-info" href="{{ route('register') }}"><b>Đăng ký</b></a>
          </li>
          @endif
          @else
          <li class="nav-item cart-icon">
              <a class="nav-link btn btn-success" href="{{ url('List-Carts') }}">
                  <i class="fas fa-cart-arrow-down"></i>
                  <b>Giỏ hàng</b>
                  @if (Session::has("Cart") != null)
                      <span style="width: 25px;" id="total-quantity-show" class="badge badge-success ml-3">{{ Session::get("Cart")->totalQuanty }}</span>
                  @else
                      <span style="width: 25px;" id="total-quantity-show" class="badge badge-success ml-3">1</span>
                  @endif
              </a>
              <div class="cart-hover">
                  <div id="change-item-cart">
                      <div class="select-items">
                          <table>
                              <tbody>
                                  <tr>
                                      <td class="si-pic"><img src="{{ asset('upload/mn1.webp') }}" style="vertical-align: middle; width:80px;margin-right: 30px" alt=""></td>
                                      <td class="si-text">
                                          <div class="product-selected">
                                              <b>2.400.000 VNĐ x 2</b>
                                              <h6>Màn hình Samsung LS24C360EAEXXV/24 inch/FHD(1920x1080)/75Hz</h6>
                                          </div>
                                      </td>
                                      <td class="si-close">
                                          <h4><a class="" data-id="" role="button"><i class="far fa-times"></i></a></h4>
                                      </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="select-total">
                          <h6>TỔNG TIỀN:</h6>
                          <h5>2.400.000 VNĐ</h5>
                      </div>
                      <div class="select-button">
                          <a href="{{ url('List-Carts') }}" class="primary-btn view-card"><b>XEM GIỎ HÀNG</b></a>
                          <a href="#" class="primary-btn checkout-btn"><b>THANH TOÁN</b></a>
                      </div>
                      <h4 style="color: #4A235A;">Vui lòng thêm sản phẩm</h4>
                  </div>
              </div>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link btn btn-info dropdown-toggle" id="navbarDropdown" role="button" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="fas fa-user"></i> <b>{{ Auth::user()->name }}</b>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  @if ((Auth::check() && Auth::user()->typeuser == 'admin'))
                  <a class="dropdown-item" href="{{ route('admin.index') }}">
                      Trang quản trị
                      <i class="fas fa-tasks"></i>
                  </a>
                  @endif
                  @if ((Auth::check() && Auth::user()->typeuser == 'admin') || (Auth::check() && Auth::user()->typeuser == 'user'))
                  <a class="dropdown-item" href="{{ route('info.index') }}">
                      Thông tin tài khoản
                      <i class="fas fa-user"></i>
                  </a>
                  <a class="dropdown-item" href="{{ route('info.show', Auth::user()->id) }}">
                      Chi tiết đặt hàng
                      <i class="fas fa-info-circle"></i>
                  </a>
                  @endif
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      Đăng xuất
                      <i class="fas fa-sign-out-alt"></i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
          @endguest
      </ul>
  </div>
</nav>

<div class="container-fluid fixed-top" style="margin-top: 58px; z-index: -1; position: absolute;">
  <nav class="navbar hr">
      <a class="nav-link btn btn-primary" href="{{ route('home') }}"><i class="fas fa-home"></i>Trang chủ</a>
      <a class="nav-link" href="{{ route('gioithieu') }}"><i class="far fa-hand-point-right"></i>Giới thiệu</a>
     {{-- <div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i> Sản phẩm
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach ($categories as $category)
            <a class="dropdown-item" href="{{ route('product.show', $category->categoryID) }}">{{ $category->categoryName }}</a>
        @endforeach
    </div>
</div> --}}
<div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bars"></i> Sản phẩm
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">CPU</a>
        <a class="dropdown-item" href="#">Thùng Case</a>
        <a class="dropdown-item" href="#">Màn Hình</a>
        <a class="dropdown-item" href="#">Ram</a>
    </div>
</div>

    
      <div class="nav-item dropdown">
          <a class="nav-link" href="#">
              <i class="fas fa-headset"></i> Liên hệ
          </a>
          <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Chat với tư vấn mua hàng</a>
              <h6 class="dropdown-item">CSKH: <a href="" class="btn-outline-info">+0834474225</a> <i class="fas fa-angle-right"></i></h6>
          </div>
      </div>
      <a class="nav-link" href="{{ route('build.index') }}" style="padding-left: 0px; padding-right: 30px;"><i class="fas fa-tools"></i> Xây dựng cấu hình</a>
  </nav>
</div>
