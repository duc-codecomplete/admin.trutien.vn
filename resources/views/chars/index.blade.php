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
                                            <th>Char ID</th>
                                            <th>UserID</th>
                                            <th>Tên trong game</th>
                                            <th>Tên hiển thị</th>
                                            <th>Level</th>
                                            <th>Môn phái</th>
                                            <th>Giới tính</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($chars as $item)
                                        <tr style="background-color: {{ ($item->name2 == '' && specialChars($item->name)) ? '#efeaea' : '' }} ">
                                            <th scope="row">
                                                    {{ $item->char_id }}
                                            </th>
                                            <td>{{ $item->userid }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                            <form action="/chars/{{$item->id}}/update_name" method="POST" class="form-horizontal form-label-left">
                                            @csrf
                                                <input required name="name2" value="{{ $item->name2 }}" style="margin-right:5px"><button type="submit">Save</button>
                                            </form>
                                            </td>
                                            <td>{{ $item->level }}</td>
                                            <td>{{ $item->getClass() }}</td>
                                            <td>{{ $item->gender }}</td>
                                        </tr>
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