<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, Goal $goal)
  {
    $request->validate([
      'title' => 'required',
    ]);

    $todo = new Todo();
    $todo->title = $request->input('title');
    $todo->user_id = Auth::id();
    $todo->goal_id = $goal->id;
    $todo->save();

    return redirect()
      ->route('goals.index')
      ->with('message', 'todoを追加しました！');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
