@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Thêm mới khuyến mãi</h3>
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
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày bắt đầu <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="start_time" class="form-control" placeholder="dd-mm-yyyy"
                                    type="date" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày kết thúc <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="end_time" class="form-control" placeholder="dd-mm-yyyy"
                                    type="date" required="required">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Kiểu khuyến mãi</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="form-control" name="type">
                                    <option value="double">Tỉ lệ (x2, x3,...)</option>
                                    <option value="percent">Phần Trăm</option>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Giá trị</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="amount" class="form-control" min="1" max="100">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align"></label>
                            <div class="col-md-6 col-sm-6 ">
                                <p>*Lưu ý: Nếu chọn tỉ lệ thì giá trị có thể là 2, 3... còn nếu chọn phần trăm thì giá trị là bao nhiêu phần trăm</p>
                                <p>Không được trùng khoảng thời gian khuyến mãi</p>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="/promotions" class="btn btn-danger" type="button">Huỷ</a>
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