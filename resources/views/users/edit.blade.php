@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Sửa thành viên</h3>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Email <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input readonly class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên đăng nhập</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input readonly class="form-control" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Mật khẩu</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input readonly class="form-control" value="{{ $user->password2 }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">UserID</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input readonly class="form-control" value="{{ $user->userid }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số điện thoại</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input class="form-control" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số dư (xu)</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input name="balance" class="form-control" value="{{ $user->balance }}">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="/shops" class="btn btn-danger" type="button">Huỷ</a>
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>

                    </form>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Danh sách nhân vật</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên trong game</th>
                                        <th>Tên hiển thị</th>
                                        <th>Level</th>
                                        <th>Môn phái</th>
                                        <th>Giới tính</th>
                                        <th>Hiệp nghĩa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->chars() as $item)
                                    <tr>
                                        <th scope="row">
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#char1">{{ $item->char_id }}</button>
                                        </th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->name2 }}</td>
                                        <td>{{ $item->level }}</td>
                                        <td>{{ $item->getClass() }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->reputation }}</td>
                                        <td>{{ $item->name2 }}</td>
                                    </tr>
                                    <div class="modal" id="char1" tabindex="-1" role="dialog"
                                        style="display: none; padding-right: 15px;" aria-modal="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel2">Đổi tên hiển thị</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/users/{{$item->id}}/update_name" method="POST" class="form-horizontal form-label-left">
                                                        @csrf
                                                        <div class="item form-group">
                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên trong game <span
                                                                    class="required">*</span>
                                                            </label>
                                                            <div class="col-md-6 col-sm-6 ">
                                                                <input readonly class="form-control" value="{{ $item->name }}">
                                                            </div>
                                                        </div>
                                                        <div class="item form-group">
                                                            <label class="col-form-label col-md-3 col-sm-3 label-align">Tên hiển thị</label>
                                                            <div class="col-md-6 col-sm-6 ">
                                                                <input name="name2" class="form-control" value="{{ $item->name2 }}">
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="item form-group">
                                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection