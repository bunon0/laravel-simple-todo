<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
    ]);

    $tag = new Tag();
    $tag->title = $request->input('title');
    $tag->user_id = Auth::id();
    $tag->save();

    return redirect(route('goals.index'))->with(
      'message',
      'タグを追加しました！'
    );
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Tag $tag)
  {
    $request->validate([
      'title' => 'required|max:255',
    ]);

    $tag->title = $request->input('title');
    $tag->user_id = Auth::id();
    $tag->save();

    return redirect(route('goals.index'))->with(
      'message',
      'タグを更新しました！'
    );
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
