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
          @if ($tags)
            <ul class="list-unstyled d-flex flex-wrap ms-n3 mt-2">
              @foreach ($tags as $tag)
                <li class="ms-3 d-flex mt-2 align-items-center">
                  <label>
                    <div class="d-flex align-items-center">
                      @if ($todo->tags()->where('tag_id', $tag->id)->exists())
                        <input type="checkbox" class="form-check-input m-0" name='tag_ids[]' value="{{ $tag->id }}"
                          checked>
                      @else
                        <input type="checkbox" class="form-check-input m-0" name='tag_ids[]'
                          value="{{ $tag->id }}">
                      @endif
                      <span href="#"
                        class="btn bg-primary btn-sm text-white text-decoration-none rounded ms-1">{{ $tag->title }}</span>
                    </div>
                  </label>
                </li>
              @endforeach
            </ul>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">閉じる</button>
          <button type="submit" class="btn btn-info text-white">更新</button>
        </div>
      </form>
    </div>
  </div>
</div>
