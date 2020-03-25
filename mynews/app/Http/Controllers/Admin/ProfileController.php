<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;
use App\profileshistories;
use Carbon\Carbon;



class ProfileController extends Controller
{

    public function index(Request $request)
    {
        $name = $request->name;
        if ($name != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name', $name)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'name' => $name]);
    }

    public function add()
    {
      return view('admin.profile.create');
    }

    public function create(Request $request)
    {


      $this->validate($request, Profile::$rules);

      $news = new Profile;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);

      // データベースに保存する
      $news->fill($form);
      $news->save();

      return redirect('admin/profile/');
    }



    public function edit(REQUEST $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {

          // Validationをかける
          $this->validate($request, Profile::$rules);
          // News Modelからデータを取得する
          $profile = Profile::find($request->id);
          // 送信されてきたフォームデータを格納する
          $profile_form = $request->all();
          unset($profile_form['_token']);
          // 該当するデータを上書きして保存する


          $profile->fill($profile_form)->save();

          $profileshistories = new Profileshistories;
          $profileshistories->profile_id = $profile->id;
          $profileshistories->edited_at = Carbon::now();
          $profileshistories->save();
          return redirect('admin/profile');

    }
}
