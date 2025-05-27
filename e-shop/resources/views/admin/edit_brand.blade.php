@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa thương hiệu sản phẩm
            </header>
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-arlet" style="color:red;font: size 17px;width:100%;text-align:center">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">
                @foreach($edit_brand as $key=> $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-brand/'.$edit_value->brand_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1"  value="{{$edit_value->brand_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea style="resize: none;" rows="5" name="brand_desc" class="form-control" id="exampleInputPassword1" > {{$edit_value->brand_desc}}</textarea>
                        </div>
                        <button type="submit" name="add_brand" class="btn btn-info">Sửa</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>

    @endsection