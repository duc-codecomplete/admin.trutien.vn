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
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên tài khoản</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="receiver">
                                    <option value="">--Chọn tài khoản hoặc để trống--</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">ID nhân vật<span
                                class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="char_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">ID vật phẩm<span
                                class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="itemid" class="form-control" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số lượng<span
                                class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" value="1" name="quantity" class="form-control" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mô tả
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" name="description" class="form-control">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="/giftcodes" class="btn btn-danger" type="button">Huỷ</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Gửi</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection