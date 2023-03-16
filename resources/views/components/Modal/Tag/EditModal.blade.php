<div class="modal fade" id="tagEditModal" tabindex="-1" aria-labelledby="tagEditModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tagEditModalLabel">Tagの編集</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" name="tagEditForm">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <input type="text" class="form-control" name="title" value="" maxlength="255">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-info text-white">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>
