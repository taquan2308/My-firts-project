@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Cập nhật danh mục sản phẩm
                </header>
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">',$message,'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="panel-body">
                    @foreach($edit_brand_product as $key => $edit_value)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-brand-product/')}}" method="post">
                                {{--                                                     .$edit_value->category_id --}}
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">
                                        {{$edit_value->brand_desc}}
                                    </textarea> 
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label for="exampleInputPassword1">ID</label>
                                    <textarea style="resize: none" rows="5" name="brand_product_id" class="form-control" id="exampleInputPassword1" placeholder="ID">
                                        {{$edit_value->brand_id}}
                                    </textarea> 
                                </div>
                                <button name="update_brand_product" type="submit" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>

    </div>
</div>
@endsection 