<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
  public function index()
  {
    $posts = Post::all();
    return view('admin.posts.index', compact('posts'));
  }

  public function create()
  {
    return view('admin.posts.create');
  }

  public function store(PostsCreateRequest $request)
  {
    $input = $request->all();
    $user = Auth::user();
    $user->posts;
    if($file = $request->file('photo_id')){
      $name = time() . $file->getClientOriginalName();
      $file->move('images', $name);
      $photo = Photo::create(['file'=>$name]);
      $input['photo_id'] = $photo->id;
    }
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    return view('admin.posts.edit');
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    //
  }
}