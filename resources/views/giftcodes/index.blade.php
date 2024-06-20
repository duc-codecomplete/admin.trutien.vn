@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Thông tin khuyến mãi</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a href="/giftcodes/add" class="nav navbar-right panel_toolbox">
                        <li>
                            <button href="/giftcodes/add" role="" class="btn btn-success">Thêm Mới</button>
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
                                            <th>Giftcode</th>
                                            <th>Ngày hết hạn</th>
                                            <th>ID Vật Phẩm</th>
                                            <th>Phần thưởng</th>
                                            <th>Số lượng đã dùng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($giftcodes as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1}}</td>
                                            <td>{{$item->giftcode}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->expired)->format("d/m/Y")}}</td>
                                            <td>{{$item->itemid}}</td>
                                            <td>{{$item->award}}</td>
                                            <td>{{$item->quantity }}
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