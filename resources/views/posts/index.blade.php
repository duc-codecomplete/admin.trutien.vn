@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tin Tức</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a href="/posts/add" class="nav navbar-right panel_toolbox">
                        <li>
                            <button href="/posts/add" role="" class="btn btn-success">Thêm Mới</button>
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
                                            <th>Tiêu đề</th>
                                            <th>Danh mục</th>
                                            <th>Ngày đăng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1}}</td>
                                            <td>{{$item->title }}</td>
                                            <td>{{ \App\Models\Post::CATEGORIES[$item->category] }}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                <a target="_blank" href="https://trutien.vn/tin-tuc/{{$item->slug}}"><i class="fa fa-eye"></i></a>
                                                <a href="/posts/{{$item->id}}/edit"><i class="fa fa-edit"></i></a>
                                                <a href="/posts/{{$item->id}}/delete"><i class="fa fa-trash-o"></i></a>
                                            </td>

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