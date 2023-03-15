<div class="modal fade" id="goalEditModal{{ $goal->id }}" tabindex="-1"
  aria-labelledby="goalEditModal{{ $goal->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="goalEditModalLabel{{ $goal->id }}">ゴールの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('goals.update', $goal) }}" method="post">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="text" class="form-control" name="title" maxlength="255" value="{{ $goal->title }}">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-info text-white">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>
