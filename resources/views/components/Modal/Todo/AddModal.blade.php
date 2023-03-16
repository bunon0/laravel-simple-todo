<div class="modal fade" id="todoAddModal{{ $goal->id }}" tabindex="-1" aria-labelledby="todoAddModa{{ $goal->id }}"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="todoAddModalLabel{{ $goal->id }}">Todoの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('goals.todos.store', $goal) }}" method="post">
        @csrf
        <div class="modal-body">
          <input type="text" class="form-control" name="title" maxlength="255" placeholder="Todoを入力してください">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-info text-white">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
