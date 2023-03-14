@extends('layouts.app')

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

    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#goalAddModal">
      <i class="fa-solid fa-square-plus"></i>
      <span>ゴールの追加</span>
    </button>
    <button type="button" class="btn btn-outline-primary ms-2">
      <i class="fa-solid fa-square-plus"></i>
      <span>タグの追加</span>
    </button>

    {{-- GoalAddModal --}}
    <div class="modal fade" id="goalAddModal" tabindex="-1" aria-labelledby=goalAddModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="goalAddModalLabel">ゴールの追加</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('goals.store') }}" method="post">
            @csrf
            <div class="modal-body">
              <input type="text" class="form-control" name="title" maxlength="255" placeholder="目標を入力してください">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
              <button type="submit" class="btn btn-primary text-white">登録</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- GoalList --}}
    @if ($goals)
      <div class="row row-cols-1 row row-cols-md-2 row-cols-lg-3 g-4 mt-3">
        @foreach ($goals as $goal)
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <h5 class="card-title m-0">{{ $goal->title }}</h5>
                  <div class="dropdown ms-auto">
                    <a href="#" class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <i class="fa-solid fa-pen-to-square text-primary"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                          data-bs-target="#goalEditModal">ゴールの編集</a></li>
                      <li><a class="dropdown-item" href="#">ゴールの削除</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- GoalEditModal --}}
          <div class="modal fade" id="goalEditModal" tabindex="-1" aria-labelledby=goalEditModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="goalEditModalLabel">ゴールの編集</h5>
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
                    <button type="submit" class="btn btn-primary text-white">更新</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif

  </div>
@endsection
