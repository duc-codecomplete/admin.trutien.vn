@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Thêm mới bài viết</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
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
                        <div class="form-group">
                            <label class="col-md-12 col-sm-12">Tiêu đề</label>
                            <div class="col-md-12 col-sm-12 field-item">
                                <input type="text" value="{{$post->title}}" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 col-sm-12">Danh mục <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-12 col-sm-12 field-item">
                                <select class="form-control" name="category">
                                    @foreach (\App\Models\Post::CATEGORIES as $item => $item_value)
                                    <option value="{{$item}}" @php if ($post->category == $item) {
                                        echo "selected";
                                    } @endphp>{{$item_value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <textarea name="content" id="editor" cols="30" rows="10">{!!$post->content!!}</textarea>
                        <div class="form-group" style="margin-top:50px">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="/posts" class="btn btn-danger" type="button">Huỷ</a>
                                <button type="submit" class="btn btn-success">Cập nhật</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')

<style>
    .field-item {
        margin-bottom: 20px;
    }
</style>

<script src="/assets/ckeditor/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');

    $("#editor").change(function(){
  alert("The text has been changed.");
});
  </script>

@endsection
@endsection