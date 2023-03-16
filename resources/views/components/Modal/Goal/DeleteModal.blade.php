<div class="modal fade" id="goalDeleteModal{{ $goal->id }}" tabindex="-1"
  aria-labelledby="goalDeleteModal{{ $goal->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="goalDeleteModalLabel{{ $goal->id }}">【{{ $goal->title }}】を削除してもよろしいですか？</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('goals.destroy', $goal) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-danger text-white">削除</button>
        </div>
      </form>
    </div>
  </div>
</div>
