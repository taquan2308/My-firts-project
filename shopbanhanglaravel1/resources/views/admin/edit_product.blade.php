@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">',$message,'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">
                    @foreach($edit_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-product')}}" method="post" enctype="multipart/form-data">
                                                                           {{-- add hình ảnh phải có enctype="multipart/form-data" --}}
                                {{csrf_field()}}
                                <input type="text" style="display: none;" name="product_id" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm" value="{{$edit_value->product_id}}">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm" value="{{$edit_value->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm" value="{{$edit_value->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh sản phẩm" value="{{$edit_value->product_image}}"><br>
                                    <img src="{{URL::to('public/uploads/product/'.$edit_value->product_image)}}" width="100px" height="100px" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="5" name="product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm" value="{{$edit_value->product_desc}}">{{$edit_value->product_desc}}
                                    </textarea> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="5" name="product_content" class="form-control" id="exampleInputPassword1" placeholder="Nội dung sản phẩm" value="{{$edit_value->product_content}}">{{$edit_value->product_content}}
                                    </textarea> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="category_id" class="form-control input-lg m-bot15">
                                        @foreach($category_product as $key => $cate_pro)
                                            @if($cate_pro->category_id==$edit_value->category_id)
                                                <option selected value="{{$cate_pro->category_id}}">{{$cate_pro->category_name}}</option>
                                                @else
                                                <option value="{{$cate_pro->category_id}}">{{$cate_pro->category_name}}</option>
                                            @endif
                                        @endforeach
                                        <option value="0">Máy cơ khí</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="brand_id" class="form-control input-lg m-bot15">
                                        @foreach($brand_product as $key => $brand_pro)
                                        {{-- liệt kê 1 đống trong tbl ra --}}
                                            @if($brand_pro->brand_id==$edit_value->brand_id)
                                                <option selected value="{{$brand_pro->brand_id}}">{{$brand_pro->brand_name}}</option>
                                                {{-- nếu gặp cái trùng thì chọn --}}
                                                @else
                                                <option value="{{$brand_pro->brand_id}}">{{$brand_pro->brand_name}}</option>
                                                {{-- nếu ko thì cứ in ra, nhưng tất cả chứa trong hộp option--}}
                                            @endif
                                        @endforeach
                                        <option value="1">MITUTOYO</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="product_status" class="form-control input-lg m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                <button name="add_brand_product" type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                        </div>
                    @endforeach()
                    

                </div>
            </section>

    </div>
</div>
@endsection