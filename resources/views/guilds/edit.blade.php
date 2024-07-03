@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Sửa</h3>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên bang hội<span
                                class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 ">
                                <input value="{{$guild->name}}" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Người quản lý</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select multiple="multiple" class="select2_single form-control" tabindex="-1" name="manager[]">
                                    <option value="">--Chọn tài khoản hoặc để trống--</option>
                                    @foreach ($users as $item)
                                        <option {{ in_array($item->id, $guild->users->pluck("user_id")->toArray()) ? "selected" : ""}} value="{{ $item->id }}" >{{ $item->username }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="/mail" class="btn btn-danger" type="button">Huỷ</a>
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