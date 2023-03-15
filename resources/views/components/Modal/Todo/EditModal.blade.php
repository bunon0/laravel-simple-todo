<div class="modal fade" id="todoEditModal{{ $todo->id }}" tabindex="-1"
  aria-labelledby="todoEditModal{{ $todo->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="todoEditModalLabel{{ $todo->id }}">Todoの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('goals.todos.update', [$goal, $todo]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="text" class="form-control" name="title" maxlength="255" value="{{ $todo->title }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-info text-white">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>
