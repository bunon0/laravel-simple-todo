@extends('layouts.app')

@push('script')
  <script src="{{ asset('js/main.js') }}" defer></script>
@endpush

@section('content')
  <div class="container">

    {{-- FlashMessage --}}
    @if (session('message'))
      <div class="alert alert-success text-center">
        {{ session('message') }}
      </div>
    @endif
    {{-- Error --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="d-grid gap-2 col-8 mx-auto d-md-block mx-md-0 mt-4">
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#goalAddModal">
        <i class="fa-solid fa-square-plus"></i>
        <span>ゴールの追加</span>
      </button>
      <button type="button" class="btn btn-outline-info ms-md-2" data-bs-toggle="modal" data-bs-target="#tagAddModal">
        <i class="fa-solid fa-square-plus"></i>
        <span>タグの追加</span>
      </button>
    </div>

    {{-- AddModal --}}
    <x-Modal.Goal.AddModal />
    <x-Modal.Tag.AddModal :tags="$tags" />
    <x-Modal.Tag.EditModal />
    <x-Modal.Tag.DeleteModal />

    {{-- Goals --}}
    @if ($goals)
      <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-3 g-4 mt-2">
        @foreach ($goals as $goal)
          <div class="col">
            <div class="card bg-primary">
              <div class="card-body">
                {{-- Goal --}}
                <div class="d-flex align-items-center">
                  <h5 class="card-title m-0 text-white">{{ $goal->title }}</h5>
                  {{-- Edit Group --}}
                  <div class="ms-auto d-flex align-items-center">
                    {{-- Todo Add --}}
                    <button type="button" class="btn btn-primary px-2 py-0 bg-white border-0" data-bs-toggle="modal"
                      data-bs-target="#todoAddModal{{ $goal->id }}" style="height: 28px; width:30px;">
                      <i class="fa-solid fa-plus text-info"></i>
                    </button>
                    {{-- Goal Edit --}}
                    <div class="dropdown align-self-start ms-1 bg-white rounded d-flex align-items-center"
                      style="height:28px; width:30px;">
                      <a href="#" class="dropdown-toggle px-2" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-pen-to-square text-info"></i>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#goalEditModal{{ $goal->id }}">ゴールの編集</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#goalDeleteModal{{ $goal->id }}">ゴールの削除</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                {{-- ToDos --}}
                @if ($goal->todos)
                  @foreach ($goal->todos as $todo)
                    <div class="card mt-2">
                      <div class="card-body">
                        <div class="d-flex align-items-center mb-1">
                          @if ($todo->done)
                            <s>
                              <h6 class="card-title m-0 text-gray-100 text-secondary">{{ $todo->title }}</h6>
                            </s>
                          @else
                            <h6 class="card-title m-0">{{ $todo->title }}</h6>
                          @endif
                          {{-- Todo Edit --}}
                          <div class="dropdown align-self-start ms-auto bg-white rounded d-flex align-items-center"
                            style="height:28px; width:30px;">
                            <a href="#" class="dropdown-toggle px-2" id="dropdownMenuButton1"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa-solid fa-pen-to-square text-info"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li>
                                <form action="{{ route('goals.todos.update', [$goal, $todo]) }}" method="post"
                                  class="dropdown-item">
                                  @csrf
                                  @method('PUT')
                                  <input type="hidden" name="title" value="{{ $todo->title }}">
                                  @if ($todo->done)
                                    <button class="btn p-0" type="submit" name="done" value="false">未完了に戻す</button>
                                  @else
                                    <button class="btn p-0" type="submit" name="done" value="true">完了</button>
                                  @endif
                                </form>
                              </li>
                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                  data-bs-target="#todoEditModal{{ $todo->id }}">Todoの編集</a></li>
                              <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                  data-bs-target="#todoDeleteModal{{ $todo->id }}">Todoの削除</a></li>
                            </ul>
                          </div>
                        </div>
                        <p class="card-text"><small
                            class="text-muted">{{ $todo->updated_at->format('Y/m/d H:i:s') }}</small></p>
                        <div class="d-flex">
                          <span class="inline-block p-1 fs-6">tag名</span>
                        </div>
                      </div>
                    </div>

                    <x-Modal.Todo.EditModal :goal="$goal" :todo="$todo" :tags="$tags" />
                    <x-Modal.Todo.DeleteModal :goal="$goal" :todo="$todo" />
                  @endforeach
                @endif
              </div>
            </div>
          </div>

          <x-Modal.Goal.EditModal :goal="$goal" />
          <x-Modal.Goal.DeleteModal :goal="$goal" />
          <x-Modal.Todo.AddModal :goal="$goal" />
        @endforeach
      </div>
    @endif

  </div>
@endsection
