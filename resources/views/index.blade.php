@extends('layouts.app')

@section('content')
  <div class="container">
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#goalAddModal">
      <i class="fa-solid fa-square-plus"></i>
      <span>ゴールの追加</span>
    </button>
    <button type="button" class="btn btn-outline-primary">
      <i class="fa-solid fa-square-plus"></i>
      <span>タグの追加</span>
    </button>
  </div>

  <!-- GoalModal -->
  <div class="modal fade" id="goalAddModal" tabindex="-1" aria-labelledby=goalAddModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="goalAddModalLabel">ゴールの追加</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="post">
          <div class="modal-body">
            <input type="text" class="form-control" placeholder="目標を入力してください">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
            <button type="submit" class="btn btn-primary text-white">登録</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
