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
				<h2>Xem lại giỏ hàng</h2>
			</div>
			<div class="table-responsive cart_info" style="max-width: 1000px;">
				<?php

				use Gloudemans\Shoppingcart\Facades\Cart;

				$content = Cart::content();
				//  echo '<pre>';
				//  print_r($content);
				//  echo '</pre>';
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image" style="max-width: 50px;">Sản phẩm</td>
							<td class="description"></td>
							<td class="price" style="width: 200px;">Giá</td>
							<td class="quantity" style="width: 150px;">Số lượng</td>
							<td class=" total" style="width: 200px;">Tổng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $v_content)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="100px" height="100px" alt="" style=""></a>
							</td>
							<td class="cart_description" style="max-width: 5rem;">
								<h4><a href="">{{$v_content->name}}</a></h4>
								<p>ID: {{$v_content->id}}</p>
							</td>
							<td class="cart_price">
								<p>{{number_format($v_content->price).' '.'VNĐ'}}</p>
							</td>
							<td class="cart_quantity" style="max-width: 5rem;">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="post">
										{{ csrf_field() }}
										<!-- <a class="cart_quantity_up" href=""> + </a> -->
										<input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
										<!-- <a class="cart_quantity_down" href=""> - </a> -->
										<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
										<input type="submit" value="Cập nhật" class="btn btn-default btn-sm">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal) . ' ' . 'VNĐ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<h4>Chọn hình thức thanh toán</h4>
			<br>
			<form action="{{URL::to('/order-place')}}" method="post">
				{{csrf_field()}}
				<div class="payment-options">
					<span>
						<label><input type="checkbox" name="payment_option" value="1"> Thanh toán bằng tiền mặt</label>
					</span>
					<span>
						<label><input type="checkbox" name="payment_option" value="2"> Thanh toán bằng thẻ ATM </label>
					</span>
					<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
				</div>
			</form>
		</div>
	</section> <!--/#cart_items-->
	@endsection