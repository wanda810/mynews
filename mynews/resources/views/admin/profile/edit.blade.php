{{-- layouts/admin.blade.phpを読み込む--}}
@extends('layouts.profile')

{{-- admin.blade.php@yield('title')に'ニュースの新規作成'を埋め込む--}}
@section('title', 'My Profile')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む　--}}
@section('content')

<!DOCTYPE html>
<div class = "container">
  <div class = "row">
    <div class = "col-md-8 mx-auto">
      <h2>プロフィール編集画面</h2>
      <form action="{{ action('Admin\ProfileController@update') }}" method="post" multipart="multipart/enctype">

                  @if (count($errors) > 0)
                      <ul>
                          @foreach($errors->all() as $e)
                              <li>{{ $e }}</li>
                          @endforeach
                      </ul>
                  @endif
                  <div class="form-group row">
                    <label class="col-md-2" for="name">名前</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
                    </div>
                 </div>
                 <div class="form-group row">
                    <label class="col-md-2" for="gender">性別</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="gender" value="{{ $profile_form->gender}}">
                    </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-md-2" for="hobby">趣味</label>
                      <div class="col-md-10">
                          <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby}}">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-md-2" for="introduction">自己紹介欄</label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
                    </div>
                  </div>
                  <input type = "hidden" name = "id" value = "{{$profile_form->id}}">
                  {{ csrf_field() }}
                  <input type="submit" class="btn btn-primary" value="更新">
        </form>
    </div>
  </div>
</div>
@endsection
