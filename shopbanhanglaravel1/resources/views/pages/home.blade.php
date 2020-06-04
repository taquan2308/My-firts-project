@extends('layout')
{{--  Mở rộng từ "layout", trong "layout" có section('content') sẽ có nội dung viết thêm vào như dưới đây --}}
@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1>TECHMASTER</h1>
                                <h2>GLOBAL LEADER IN TEST EQUYPMENT SOLUTIONS</h2>
                                <p>Techmaster tin rằng, chúng tôi đang mang đến một định hướng mới cho thói quen tiêu dùng trong lĩnh vực công nghệ - điện tử</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{('public/frontend/images/girl4.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1>TECHMASTER</h1>
                                <h2>DỊCH VỤ ĐO VÀ PHÂN TÍCH RUNG ĐỘNG</h2>
                                <p>Ứng dụng đo và phân tích rung trong hệ thống động cơ khí, chuẩn đoán ngăn ngừa các nguyên nhân tiểm ẩn có khả năng gây hư hại hệ thống, thiết bị. Rung động không mong muốn ở động cơ chủ yếu do các nguyên nhân sau gây ra</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{('public/frontend/images/girl1.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1>TECHMASTER</h1>
                                <h2>DỊCH VỤ ĐO KIỂM - PHÂN TÍCH CHẤT LƯỢNG ĐIỆN NĂNG</h2>
                                <p>Đánh giá năng lượng – đo thực tế mức tiêu thụ năng lượng trước và sau khi cải tiến để đánh giá việc sử dụng thiết bị tiết kiệm năng lượng</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{('public/frontend/images/girl2.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1>TECHMASTER</h1>
                                <h2>DỊCH VỤ CHỤP ẢNH NHIỆT</h2>
                                <p>Dịch vụ chụp ảnh nhiệt giúp mô tả trực quan về các biến đổi của nhiệt độ trong hệ thống, thông qua ảnh nhiệt hồng ngoại. Phương pháp đo – kiểm tra từ xa, không làm ảnh hưởng đến thiết bị, không ngắt quãng nhịp độ làm việc,…. Mà còn tăng mức độ khắc phục tận gốc điểm phát sinh nhiệt.</p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{('public/frontend/images/girl3.jpg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh Mục Sản Phẩm</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                     @foreach($all_category_product as $key => $cate_pro)

                     {{-- Hide ID --}}
                     <input style="display: none;" type="text" value="{{$cate_pro->category_id}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                     {{-- Hide ID --}}

                     <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/')}}">{{$cate_pro->category_name}}</a></h4>
                        </div>
                    </div>

                    @endforeach
                </div><!--/category-products-->

                <div class="brands_products"><!--brands_products-->
                    <h2>Thương Hiệu</h2>
                    @foreach($all_brand_product as $key => $brand_product)

                    {{-- Hide ID --}}
                    <input style="display: none;"  type="text" value="{{$brand_product->brand_id}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                    {{-- Hide ID --}}

                    <a href="{{URL::to('/thuong-hieu-san-pham/')}}"> <span class="pull-right"></span>{{$brand_product->brand_name}}</a>

                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="{{URL::to('/thuong-hieu-san-pham/')}}"> <span class="pull-right"></span>{{$brand_product->brand_name}}</a></li>
                        </ul>
                    </div>
                    @endforeach
                </div><!--/brands_products-->

                {{--  <div class="price-range"><!--price-range-->
                    <h2>Price Range</h2>
                    <div class="well text-center">
                       <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                       <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                   </div>
               </div><!--/price-range-->

               <div class="shipping text-center"><!--shipping-->
                <img src="images/home/shipping.jpg" alt="" />
            </div><!--/shipping--> --}}

        </div>
    </div>

    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Sản Phẩm Mới Nhất</h2>
            @foreach($all_product as $key => $cate_pro)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="public/uploads/product/{{$cate_pro->product_image}}" alt="" />
                            <h2>{{number_format($cate_pro->product_price).' '.'VNĐ'}}</h2>
                            <p>{{$cate_pro->product_name}}</p>
                            <a class="btn btn-default add-to-cart" data-product-id="{{data_get($cate_pro, 'product_id')}}" data-product-name="{{data_get($cate_pro, 'product_name')}}", data-product-cost="{{data_get($cate_pro, 'product_price')}}" data-product-choose="false" onclick="addToCart(this)"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach        
        </div><!--features_items-->
        {{-- <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
                    <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
                    <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
                    <li><a href="#kids" data-toggle="tab">Kids</a></li>
                    <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tshirt" >
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{('public/frontend/images/gallery1.jpg')}}" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}<!--/category-tab-->
        {{-- <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">   
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">  
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/recommend1.jpg')}}" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="" />
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>          
            </div>
        </div> --}}<!--/recommended_items-->        
    </div>
</div>
</div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>e</span>-shopper</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{('public/frontend/images/iframe1.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{('public/frontend/images/iframe2.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{('public/frontend/images/iframe3.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="video-gallery text-center">
                            <a href="#">
                                <div class="iframe-img">
                                    <img src="{{('public/frontend/images/iframe4.png')}}" alt="" />
                                </div>
                                <div class="overlay-icon">
                                    <i class="fa fa-play-circle-o"></i>
                                </div>
                            </a>
                            <p>Circle of Hands</p>
                            <h2>24 DEC 2014</h2>
                        </div>
                    </div>
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
    @stop