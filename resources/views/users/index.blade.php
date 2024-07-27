@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Danh sách thành viên</h3>
        </div>
    </div>

    <div class="clearfix"></div>
    <p class="text-muted font-13 m-b-30">
        <i style="color:green" class="fa fa-check-circle"></i> Là tài khoản đã tạo nhân vật trong game.
        <br>
        <i style="color:rgb(206, 201, 201)" class="fa fa-check-circle"></i> Là tài khoản chưa tạo nhân vật trong game.
    </p>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>CharID</th>
                                            <th>Số dư</th>
                                            <th>Email</th>
                                            <th>Ngày tạo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                @if(count($user->chars()) > 0)
                                                <i style="color:green" class="fa fa-check-circle"></i>
                                                @else
                                                <i style="color:rgb(206, 201, 201)" class="fa fa-check-circle"></i>
                                                @endif
                                                {{ $user->username }} (TT{{ $user->userid }})
                                            </td>
                                            <td>{{ $user->main_id }}</td>
                                            <td>{{ $user->balance }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td><a href="/users/{{$user->id}}/edit"><i class="fa fa-edit"></i></a></td>
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