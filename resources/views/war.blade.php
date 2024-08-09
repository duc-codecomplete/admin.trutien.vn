@extends("layouts.master")
@section("content")
<h2>War</h2>
<div>
    <form action="" method="POST">
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
<p class="alert alert-danger" style="text-align: center;color:red">{{ Session::get('error') }}</p>
@endif
@if(Session::has('success'))
<p class="alert alert-success" style="text-align: center;color:red">{{ Session::get('success') }}</p>
@endif
<div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Date</label>
    <div class="col-sm-10">
      <input class="form-control" type="date" name="date" id="inputPassword3" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Win</label>
    <div class="col-sm-10">
      <input class="form-control" type="number" name="win" id="inputPassword3" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Mvp Win</label>
    <div class="col-sm-10">
      <input class="form-control" type="number" name="mvpwin" id="inputPassword3" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Lose</label>
    <div class="col-sm-10">
      <input class="form-control" type="number" name="lose" id="inputPassword3" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">MVP Lose</label>
    <div class="col-sm-10">
      <input class="form-control" type="number" name="mvplose" id="inputPassword3" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Total</label>
    <div class="col-sm-10">
      <input class="form-control" type="number" name="total" required>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-success">Gửi quà</button>
    </div>
  </div>
</form>
</div>
@endsection