@extends('layout')
   {{--  Mở rộng từ "layout", trong "layout" có section('content') sẽ có nội dung viết thêm vào như dưới đây --}}
@section('content')
    <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Danh Mục Thương Hiệu</h2>
                @foreach($all_brand_product as $key => $brand_product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="public/uploads/product/{{$cate_pro->product_image}}" alt="" />
                                        <h2>{{$cate_pro->product_price.' '.'VNĐ'}}</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                </div>
                        </div>
                    </div>

                @endforeach        
    </div>
@endsection