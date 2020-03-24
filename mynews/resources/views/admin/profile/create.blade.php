{{-- layouts/admin.blade.phpを読み込む--}}
@extends('layouts.profile')

{{-- admin.blade.php@yield('title')に'ニュースの新規作成'を埋め込む--}}
@section('title', 'My Profile Create')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む　--}}
@section('content')

<!DOCTYPE html>
<div class = "container">
  <div class = "row">
    <div class = "col-md-8 mx-auto">
      <h2>プロフィール画面</h2>
      <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                  @if (count($errors) > 0)
                      <ul>
                          @foreach($errors->all() as $e)
                              <li>{{ $e }}</li>
                          @endforeach
                      </ul>
                  @endif
                  <label class="col-md-2" for="name">名前</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                  </div>
                  <label class="col-md-2" for="gender">性別</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                  </div>
                  <label class="col-md-2" for="hobby">趣味</label>
                  <div class="col-md-10">
                      <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                  </div>
                  <label class="col-md-2" for="introduction">自己紹介欄</label>
                  <div class="col-md-10">
                      <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                  </div>
                  {{ csrf_field() }}
                  <input type="submit" class="btn btn-primary" value="投稿">
        </form>
    </div>
  </div>
</div>
@endsection
