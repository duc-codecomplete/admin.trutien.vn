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
        {{-- <div class="x_title">
          <a href="/promotions/add" class="nav navbar-right panel_toolbox">
            <li>
              <button href="/promotions/add" role="" class="btn btn-success">Thêm Mới</button>
            </li>
          </a>
          <div class="clearfix"></div>
        </div> --}}
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          {{ Session::get('error') }}
        </div>
            <p class="alert" style="text-align: center;color:red">{{ Session::get('error') }}
        </p>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          {{ Session::get('success') }}
        </div>
            <p class="alert" style="text-align: center;color:red">{{ Session::get('error') }}
        </p>
        @endif
        <div class="x_content">
          <div class="row">
            <div class="col-sm-12">
              <div class="card-box table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tài khoản</th>
                      <th>Giá tiền gốc</th>
                      <th>Giá tiền sau khuyến mãi</th>
                      <th>Trạng thái</th>
                      <th>Người xử lý</th>
                      <th>Thời gian xử lý</th>
                      <th>Thời gian nạp</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($deposits as $item)
                    <tr>
                      <th>{{ $loop->index + 1}}</th>
                      <td>{{$item->user->username}}</td>
                      <td>{{number_format($item->amount)}}</td>
                      <td>{{number_format($item->amount_promotion)}}</td>
                      <td>
                        @if($item->status != "pending")
                        <span class="btn btn-sm btn-success">Đã xử lý</span>
                        @else
                        <button type="button" data-toggle="modal" data-target=".modal-deposit-{{$item->id}}"
                          class="btn btn-sm btn-danger">Chưa xử lý</button>
                        @endif
                      </td>
                      <td>{{$item->processing_by ? $item->processing_by->username : ""}}</td>
                      <th>{{$item->processing_time ? \Carbon\Carbon::parse($item->processing_time)->format("d/m/Y H:i:s") : ""}}
                      </th>
                      <td>{{\Carbon\Carbon::parse($item->created_at)->format("d/m/Y H:i:s")}}</td>
                    </tr>

                    <div class="modal fade bs-example-modal-sm modal-deposit-{{$item->id}}" tabindex="-1" role="dialog"
                      aria-modal="true" style="padding-right: 15px; display: none;">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel2">Xử lý nạp KNB</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <p>Nhấn nút xác nhận, đồng thời KNB sẽ được chuyển vào tài khoản của người chơi, cẩn thận khi thao tác, không thể hoàn lại</p>
                            <p>Thông tin giao dịch:</p>
                            <ul>
                              <li>Tài khoản: {{$item->user->username}}</li>
                              <li>Giá tiền gốc: {{number_format($item->amount)}}	</li>
                              <li>Giá tiền sau khuyến mãi: {{number_format($item->amount_promotion)}}</li>
                              <li>Thời gian nạp: {{\Carbon\Carbon::parse($item->created_at)->format("d/m/Y H:i:s")}} </li>
                            </ul>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                            <a href="/deposits/{{$item->id}}/approve"><button type="button" class="btn btn-danger">Xác nhận</button></a>
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
@endsection