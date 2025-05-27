@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa danh mục sản phẩm
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
                @foreach($edit_category as $key=> $edit_value)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/update-category/'.$edit_value->category_id)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" name="category_name" id="exampleInputEmail1" placeholder="Tên danh mục" value="{{$edit_value->category_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none;" rows="5" name="category_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục"> {{$edit_value->category_desc}}</textarea>
                        </div>
                        <button type="submit" name="add_category" class="btn btn-info">Sửa</button>
                    </form>
                </div>
                @endforeach
            </div>
        </section>

    </div>

    @endsection