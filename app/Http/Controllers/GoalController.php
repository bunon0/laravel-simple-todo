<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $goals = Auth::user()->goals;
    $todos = Auth::user()->todos;
    $tags = Auth::user()->tags;
    return view('goals.index', compact('goals', 'todos', 'tags'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required',
    ]);

    $goal = new Goal();
    $goal->title = $request->input('title');
    $goal->user_id = Auth::id();
    $goal->save();

    return redirect()
      ->route('goals.index')
      ->with('message', 'ゴールを追加しました！');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Goal $goal)
  {
    $request->validate([
      'title' => 'required',
    ]);

    $goal->title = $request->input('title');
    $goal->user_id = Auth::id();
    $goal->save();

    return redirect()
      ->route('goals.index')
      ->with('message', 'ゴールを更新しました!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Goal $goal)
  {
    $goal->delete();

    return redirect()
      ->route('goals.index')
      ->with('message', 'ゴールを削除しました!');
  }
}
