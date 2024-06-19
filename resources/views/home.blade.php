@extends('layouts.master')
@section('content')
<div class="row" style="display: inline-block;">
    <div class=" top_tiles" style="margin: 10px 0;">
        <div class="col-md-3 col-sm-3  tile">
            <span>Thành viên</span>
            <h2>{{ $data["users"] }}</h2>
            <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="125"
                    style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-3 col-sm-3  tile">
            <span>Doanh thu</span>
            <h4>{{ number_format($data["revenue"]) }}đ</h4>
            <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="125"
                    style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-3 col-sm-3  tile">
            <span>Total Sessions</span>
            <h2>231,809</h2>
            <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="125"
                    style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-3 col-sm-3  tile">
            <span>Total Sessions</span>
            <h2>231,809</h2>
            <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="125"
                    style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
        </div>
    </div>
</div>
@endsection