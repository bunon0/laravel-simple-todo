<div class="modal fade" id="tagAddModal" tabindex="-1" aria-labelledby=tagAddModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tagAddModalLabel">タグの追加</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('tags.store') }}" method="post">
        @csrf
        <div class="modal-body">
          <input type="text" class="form-control" name="title" maxlength="255" placeholder="タグを入力してください">
          @if ($tags)
            <ul class="list-unstyled d-flex ms-n3 mt-2">
              @foreach ($tags as $tag)
                <li class="ms-3 d-flex align-items-center">
                  <a href="#"
                    class="btn bg-primary btn-sm text-white text-decoration-none rounded">{{ $tag->title }}</a>
                  <a href="#" class="ms-1">
                    <i class="fa-solid fa-delete-left text-secondary fs-2"></i>
                  </a>
                </li>
              @endforeach
            </ul>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-info text-white">登録</button>
        </div>
      </form>
    </div>
  </div>
</div>
