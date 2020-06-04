
<div class="row">
	<div class="col-xs-12 col-md-6">
		@foreach($products as $key => $product)

		<div class="row" style="height: 160px; margin-bottom: 15px; border: 1px solid #010101;">
			<div class="col-xs-4 d-inline-block" style="padding: 0px;">
				<img src="public/uploads/product/{{$product->product_image}}" alt="" width="80%" height="100%" />
			</div>
			<div class="col-xs-8">
				<h2>{{number_format($product->product_price).' '.'VNĐ'}}</h2>
	            <h2>{{$product->product_name}}</h2>
	            <div class="form-group" style="display: flex; flex-direction: row; align-items: center;">
	            	<label for="" style="margin-right: 15px;">Số lượng</label>
	            	<input type="number" name="product_{{data_get($product, 'product_id')}}" id="product_{{data_get($product, 'product_id')}}" value="1">
	            </div>
			</div>
		</div>
		@endforeach
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="row">
			<div class="col-xs-12 form-group">
				<div style="margin-bottom: 10px;">
					<label>Họ và tên</label>
				</div>
				<div>
					<input class="form-control" type="text" name="full_name" placeholder="Hãy điền họ và tên của bạn ...">
				</div>
			</div>
			<div class="col-xs-12 form-group">
				<div style="margin-bottom: 10px;">
					<label>Số điện thoại</label>
				</div>
				<div>
					<input class="form-control" type="text" name="phone_number" placeholder="Hãy điền số điện thoại của bạn ...">
				</div>
			</div>
			<div class="col-xs-12 form-group">
				<div style="margin-bottom: 10px;">
					<label>Email</label>
				</div>
				<div>
					<input class="form-control" type="text" name="email" placeholder="Hãy điền địa chỉ email của bạn ...">
				</div>
			</div>

			<div class="col-xs-12 form-group" style="display: flex; flex-direction: row; justify-content: center;">
				<button type="button" id="cart_order" class="btn btn-primary">Đặt hàng</button>
			</div>
		</div>
	</div>
</div>
