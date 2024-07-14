@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Danh sách nhân vật</h3>
                <i style="color:rgb(206, 201, 201)" class="fa fa-check-circle"></i> Nhân vật cần chỉnh sửa lỗi hiển thị tên.
                <br>
            </div>
        <br>
    </div>
    <br>
    @php
    function specialChars($str) {
        return preg_match('/[^a-zA-Z0-9\.]/', $str) > 0;
    }
    @endphp

    <div class="clearfix"></div>
    <br>
    <a href="/chars" type="button" class="btn btn-sm btn-primary">Toàn bộ</a>
    <a href="/chars?need_change=true" type="button" class="btn btn-sm btn-success">Chỉ lỗi tên</a>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>UserID</th>
                                            <th>Tên trong game</th>
                                            <th>Tên hiển thị</th>
                                            <th>Level</th>
                                            <th>Môn phái</th>
                                            <th>Giới tính</th>
                                            <th>Hiệp nghĩa</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($chars as $item)
                                        <tr style="background-color: {{ ($item->name2 == '' && specialChars($item->name)) ? '#efeaea' : '' }} ">
                                            <th scope="row">
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#char{{ $item->char_id }}">{{ $item->char_id }}</button>
                                                    {{ $item->char_id }}
                                            </th>
                                            <td>{{ $item->userid }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->name2 }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>{{ $item->getClass() }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->reputation }}</td>
                                        </tr>
                                        <div class="modal" id="char{{ $item->char_id }}" tabindex="-1" role="dialog"
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
                                                        <form action="/users/{{$item->id}}/update_name" method="POST"
                                                            class="form-horizontal form-label-left">
                                                            @csrf
                                                            <div class="item form-group">
                                                                <label
                                                                    class="col-form-label col-md-3 col-sm-3 label-align">Tên
                                                                    trong game <span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-6 col-sm-6 ">
                                                                    <input readonly class="form-control"
                                                                        value="{{ $item->name }}">
                                                                </div>
                                                            </div>
                                                            <div class="item form-group">
                                                                <label
                                                                    class="col-form-label col-md-3 col-sm-3 label-align">Tên
                                                                    hiển thị</label>
                                                                <div class="col-md-6 col-sm-6 ">
                                                                    <input name="name2" class="form-control"
                                                                        value="{{ $item->name2 }}">
                                                                </div>
                                                            </div>
                                                            <div class="ln_solid"></div>
                                                            <div class="item form-group">
                                                                <div class="col-md-6 col-sm-6 offset-md-3">
                                                                    <a href="/chars" class="btn btn-danger"
                                                                        type="button">Huỷ</a>
                                                                    <button type="submit" class="btn btn-success">Cập
                                                                        nhật</button>
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
</div>

<style>
    .dt-buttons {
        display: none !important;
    }
</style>
@endsection