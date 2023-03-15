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

    <div class="d-grid gap-2 col-8 mx-auto d-md-block mx-md-0 mt-4">
      <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#goalAddModal">
        <i class="fa-solid fa-square-plus"></i>
        <span>ゴールの追加</span>
      </button>
      <button type="button" class="btn btn-outline-info ms-md-2">
        <i class="fa-solid fa-square-plus"></i>
        <span>タグの追加</span>
      </button>
    </div>

    <x-Modal.Goal.AddModal />

    {{-- Goal & Todo List --}}
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
                    {{-- Todo Edit --}}
                    <div class="dropdown align-self-start bg-white rounded">
                      <a href="#" class="dropdown-toggle px-2" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-plus text-info"></i>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                            data-bs-target="#goalEditModal{{ $goal->id }}">Todoの追加</a></li>
                      </ul>
                    </div>
                    {{-- Goal Edit --}}
                    <div class="dropdown align-self-start ms-1 bg-white rounded">
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
                {{-- ToDo --}}
                <div class="card mt-2">
                  <div class="card-body">
                    <h6 class="card-title mb-1">ゴールのCREATE機能を作成する</h6>
                    <p class="card-text"><small class="text-muted">xxxx年xx月xx日</small></p>
                    <div class="d-flex">
                      <span class="inline-block p-1 fs-6">tag名</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <x-Modal.Goal.EditModal :goal="$goal" />
          <x-Modal.Goal.DeleteModal :goal="$goal" />
        @endforeach
      </div>
    @endif

  </div>
@endsection
