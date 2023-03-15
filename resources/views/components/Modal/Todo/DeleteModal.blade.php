<div class="modal fade" id="todoDeleteModal{{ $todo->id }}" tabindex="-1"
  aria-labelledby="todoDeleteModal{{ $todo->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="todoDeleteModalLabel{{ $todo->id }}">【{{ $todo->title }}】を削除してもよろしいですか？</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('goals.todos.destroy', [$goal, $todo]) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-danger text-white">削除</button>
        </div>
      </form>
    </div>
  </div>
</div>
