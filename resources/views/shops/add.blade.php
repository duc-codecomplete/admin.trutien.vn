@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Thêm mới vật phẩm</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br>
                    <form action="" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                        @endif
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">ID Vật phẩm</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="itemid" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên Vật Phẩm</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="description" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Giá tiền (xu) <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Trạng thái <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="status" id="" class="form-control">
                                    <option value="active">Đang bán</option>
                                    <option value="inactive">Ngừng bán</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="/giftcodes" class="btn btn-danger" type="button">Huỷ</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection