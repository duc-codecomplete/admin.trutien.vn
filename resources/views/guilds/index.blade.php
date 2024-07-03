@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Bang Hội</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a href="/guilds/add" class="nav navbar-right panel_toolbox">
                        <li>
                            <button href="/guilds/add" role="" class="btn btn-success">Thêm Mới</button>
                        </li>
                    </a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên bang hội</th>
                                            <th>Quản lý</th>
                                            <th>Thành viên</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guilds as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1}}</td>
                                            <td><a href="/guilds/{{$item->id}}/edit">{{$item->name}}</a></td>
                                            <th>
                                                @php
                                                    $username = [];
                                                    foreach ($item->users as $u){
                                                        array_push($username, $u->user->username);
                                                    }
                                                @endphp
                                                {{ implode(", ", $username) }}
                                            </th>
                                            <th>20</th>

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
@endsection