@extends('layouts.master')
@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Doanh thu theo ngày</h3>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
      <div class="x_panel">
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
                      <th>Ngày</th>
                      <th>Doanh thu</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($deposits as $item)
                    <tr>
                      <th>{{ $loop->index + 1}}</th>
                      <td>{{$item->date}}</td>
                      <td>{{number_format($item->sums)}}</td>
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
@section('script')
<script>
  $("#date").change(function() {
        window.location.href = `/deposits?date=${$(this).val()}`
      })
</script>
@endsection
@endsection