	@extends('welcome')
	@section('content')
	<section id="cart_items">
	    <div class="container">
	        <div class="breadcrumbs">
	            <ol class="breadcrumb">
	                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
	                <li class="active">Thanh toán giỏ hàng</li>
	            </ol>
	        </div>

	        <div class="review-payment">
	            <h2>Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ với bạn sớm nhất</h2>
	        </div>
	    </div>
	</section> <!--/#cart_items-->
	@endsection