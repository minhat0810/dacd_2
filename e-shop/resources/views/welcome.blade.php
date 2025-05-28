<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<style>
    #bookingFormContainer {
        display: none;
        /* Ẩn form ban đầu */
        position: fixed;
        top: 50%;
        left: 50%;

        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        min-width: 700px;
        max-height: 80vh;
        /* Giới hạn chiều cao */
        overflow-y: auto;
        /* Bật cuộn dọc */
    }

    #bookingFormWrapper::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        /* background: rgba(0, 0, 0, 0.5); */
        /* Tạo lớp nền mờ phía sau */
        z-index: -1;
    }

    #bookingFormWrapper h3 {
        margin-bottom: 20px;
        font-size: 24px;
    }

    #bookingForm input {
        width: 100%;
        padding: 8px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #bookingForm button {
        padding: 10px 15px;
        margin-top: 10px;
        border: none;
        cursor: pointer;
    }

    #bookingForm button[type="submit"] {
        background: #28a745;
        color: white;
    }

    #closeBookingForm {
        background: #dc3545;
        color: white;
    }

    #bookingForm input[type="radio"] {
        margin-right: 5px;
    }

    .gender-options {
        display: flex;
        gap: 20px;
        /* Tạo khoảng cách giữa Nam và Nữ */
        align-items: center;
        /* Căn giữa các phần tử */
        margin-bottom: 8px;
    }

    .gender-options label {
        display: flex;
        align-items: center;
        gap: 5px;
        /* Khoảng cách giữa radio button và chữ */
    }
</style>

<body>
    <?php

    use Illuminate\Support\Facades\Session;

    // echo Session::get('customer_id');
    // echo Session::get('shipping_id');

    ?>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 0374905464</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> dvers000@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <!-- <a href="index.html"><img src="{{'public/frontend/images/home/logo.png'}}" alt="" /></a> -->
                            <span style=" font-size: 24px; font-weight: bold; ">
                                D-Vers</span>
                        </div>
                        <div class="btn-group pull-right">
                            <!-- <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div> -->

                            <!-- <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <!-- <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i> Tài khoản </a></li> -->
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích </a></li>
                                <?php



                                $customer_id = Session::get('customer_id');
                                if ($customer_id != NULL) {
                                ?>
                                    <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán </a></li>
                                <?php
                                } else if ($customer_id != null && $shipping_id != null) {
                                ?>
                                    <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán </a></li>
                                <?php
                                } else {
                                ?>
                                    <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán </a></li>
                                <?php
                                }
                                ?>
                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng </a></li>
                                <?php

                                // use Illuminate\Support\Facades\Session;

                                $customer_id = Session::get('customer_id');
                                if ($customer_id != NULL) {
                                ?>
                                    <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất </a></li>
                                <?php
                                } else {
                                ?>
                                    <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập </a></li>
                                <?php
                                }
                                ?>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <!-- <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="login.html">Login</a></li> -->
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li><a href="{{URL::to('/show_cart')}}">Giỏ hàng</a></li>
                                <li><a href="contact-us.html">LIên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{URL::to('/tim-kiem')}}" method="post">
                            {{csrf_field()}}
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm" />
                                <input style="color: black;" type="submit" value="Tìm" name="search_items" class="btn btn-success btn-sm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol> -->

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1><span>Phòng khám</span>-DVers</h1>
                                    <h2>Giá ưu đãi cực tốt</h2>
                                    <p>... </p>
                                    <button type="button" class="btn btn-default get showBookingForm">Đặt lịch ngay</button>

                                </div>
                                <div class="col-sm-6">
                                    <img src="{{'public/frontend/images/home/banner5.jpeg'}}" class="girl img-responsive" alt="" />

                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Phòng khám</span>-DVers</h1>
                                    <h2>Giá ưu đãi cực tốt</h2>
                                    <p>... </p>
                                    <button type="button" class="btn btn-default get showBookingForm">Đặt lịch ngay</button>

                                </div>
                                <div class="col-sm-6" style="margin-top: 50px;">
                                    <img src="{{'public/frontend/images/home/banner9.jpg'}}" class="girl img-responsive" alt="" width="400px" height="500px" />

                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><span>Phòng khám</span>-DVers</h1>
                                    <h2>Giá ưu đãi cực tốt</h2>
                                    <p>... </p>
                                    <button type="button" class="btn btn-default get showBookingForm">Đặt lịch ngay</button>

                                </div>
                                <div class="col-sm-6">
                                    <img src="{{'public/frontend/images/home/banner8.webp'}}" class="girl img-responsive" alt="" width="600px" height="800px" />

                                </div>
                            </div>


                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <div id="bookingFormContainer">
                            <div id="bookingFormWrapper">
                                <h3>Đặt lịch khám</h3>
                                <form id="bookingForm">
                                    <label>Họ và tên:</label>
                                    <input type="text" name="name" required><br>

                                    <label>Số điện thoại:</label>
                                    <input type="text" name="phone" required><br>

                                    <label>Email:</label>
                                    <input type="text" name="email" required><br>

                                    <label>Địa chỉ:</label>
                                    <input type="text" name="address" required><br>

                                    <label>Giới tính:</label>
                                    <div class="gender-options">
                                        <label><input type="radio" name="gender" value="Nam" required> Nam</label>
                                        <label><input type="radio" name="gender" value="Nữ"> Nữ</label>
                                    </div>

                                    <!-- Ô nhập ngày -->
                                    <label for="appointment_date">Ngày đặt lịch (YYYY/MM/DD):</label>
                                    <input type="text" id="appointment_date" name="appointment_date" required>

                                    <!-- Thư viện Flatpickr -->
                                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
                                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

                                    <!-- Cấu hình định dạng -->
                                    <script>
                                        flatpickr("#appointment_date", {
                                            dateFormat: "Y/m/d" // yyyy/mm/dd
                                        });
                                    </script>


                                    <label>Giờ bắt đầu:</label>
                                    <input type="time" name="appointment_time_start" required><br>

                                    <label>Giờ kết thúc:</label>
                                    <input type="time" name="appointment_time_end" required><br>

                                    <label>Triệu chứng</label>
                                    <input type="text" name="symptom" required><br>

                                    <label>Ghi chú thêm</label>
                                    <input type="text" name="symptom"><br>

                                    <button type="submit">Gửi đặt lịch</button>
                                    <button type="button" id="closeBookingForm">Hủy</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <!-- <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian">
                            @foreach($category as $key => $cate)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="brands_products">
                            <h2>Thương hiệu sản phẩm</h2>
                            @foreach($brand as $key => $brand)
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="{{URL::to('thuong-hieu-san-pham/'.$brand->brand_id)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                </ul>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
    </section> -->

    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>D </span>-Vers</h2>
                            <p>Sản phẩm chất lượng, giá cực ưu đãi</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <!-- <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{'public/frontend/images/home/footer1.jpg'}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>AQUA</p>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{'public/frontend/images/home/footer2.jpg'}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Toshiba</p>

                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{'public/frontend/images/home/footer3.png'}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Samsung</p>

                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{'public/frontend/images/home/footer4.jpg'}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Karofi</p>

                            </div>
                        </div> -->
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Hỗ trợ trực tuyến</a></li>
                                <li><a href="#">Liên hệ với chúng tôi</a></li>
                                <li><a href="#">Tình trạng đơn hàng</a></li>
                                <li><a href="#">Đặt câu hỏi</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Danh mục</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Tủ lạnh</a></li>
                                <li><a href="#">Máy giặt</a></li>
                                <li><a href="#">Điều hòa</a></li>
                                <li><a href="#">Máy quạt</a></li>
                                <li><a href="#">Máy lọc nước</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div> -->
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Về chúng tôi</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin công ty</a></li>
                                <li><a href="#">Lĩnh vực</a></li>
                                <li><a href="#">Vị trí cửa hàng</a></li>
                                <li><a href="#">Số điện thoại</a></li>
                                <li><a href="#">Email</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Cộng tác với chúng tôi</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Địa chỉ email của bạn" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Nhận thông tin cập nhật mới nhất về trang web của chúng tôi</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2024 DVERS. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer><!--/Footer-->



    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    // Cấu hình Flatpickr
    flatpickr("#appointment_date", {
        dateFormat: "Y/m/d", // Định dạng YYYY/MM/DD
        minDate: "today", // Chỉ cho phép chọn từ hôm nay trở đi
    });

    $(".showBookingForm").click(function() {
        $("#bookingFormContainer").fadeIn();
    });

    $("#closeBookingForm").click(function() {
        $("#bookingFormContainer").fadeOut();
    });

    $("#bookingForm").submit(function(event) {
        event.preventDefault(); // Ngăn chặn reload trang

        // Lấy giá trị từ form
        let appointmentDate = $("input[name='appointment_date']").val(); // 2025/05/28
        let timeStart = $("input[name='appointment_time_start']").val(); // 12:35PM
        let timeEnd = $("input[name='appointment_time_end']").val(); // 01:00PM

        // Chuyển đổi ngày: 2025/05/28 -> 2025-05-28
        let formattedDate = appointmentDate.replace(/\//g, '-');

        // Hàm chuyển đổi giờ từ 12h (AM/PM) sang 24h
        function convertTo24Hour(time) {
            let [hours, minutes] = time.match(/(\d+):(\d+)/).slice(1);
            let period = time.includes("PM") ? "PM" : "AM";
            hours = parseInt(hours);
            minutes = parseInt(minutes);

            if (period === "PM" && hours !== 12) hours += 12;
            if (period === "AM" && hours === 12) hours = 0;

            return `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:00.000`;
        }

        // Chuyển đổi giờ sang định dạng 24h
        let formattedTimeStart = convertTo24Hour(timeStart); // 12:35PM -> 12:35:00.000
        let formattedTimeEnd = convertTo24Hour(timeEnd);     // 01:00PM -> 13:00:00.000

        // Ghép ngày và giờ
        let dtStart = `${formattedDate} ${formattedTimeStart}`; // 2025-05-28 12:35:00.000
        let dtEnd = `${formattedDate} ${formattedTimeEnd}`;     // 2025-05-28 13:00:00.000

        let formData = {
            svClass: "ServiceAppointment",
            svName: "SvNew",
            dto: {
                title: "",
                description: "",
                receiver: JSON.stringify({
                    name: $("input[name='name']").val(),
                    phone: $("input[name='phone']").val(),
                    email: $("input[name='email']").val(),
                    address: $("input[name='address']").val(),
                    gender: $("input[name='gender']:checked").val(),
                }),
                dtStart: dtStart,
                timeStart: timeStart,
                dtEnd: dtEnd,
                timeEnd: timeEnd,
                note: $("input[name='symptom']").val()
            }
        };

        $.ajax({
            url: "http://192.168.6.232:8080/cld",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(formData),
            success: function(response) {
                response.receiver = JSON.parse(response.receiver);
                console.log(response.receiver);
                alert("Đặt lịch thành công!");
                $("#bookingFormContainer").fadeOut();
            },
            error: function(xhr, status, error) {
                console.log("Error:", xhr, status, error); // Log chi tiết lỗi
                alert("Có lỗi xảy ra, vui lòng thử lại!");
            }
        });
    });

    $(document).mouseup(function(e) {
        let container = $("#bookingFormContainer");
        let calendar = $(".flatpickr-calendar");
        // Không đóng nếu click vào container hoặc lịch
        if (!container.is(e.target) && container.has(e.target).length === 0 && !calendar.is(e.target) && calendar.has(e.target).length === 0) {
            container.fadeOut();
        }
    });
});
</script>

</body>

</html>