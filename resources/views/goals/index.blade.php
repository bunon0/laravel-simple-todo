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

    <x-Modal.Goals.AddModal />

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
                          data-bs-target="#goalEditModal{{ $goal->id }}">ゴールの編集</a></li>
                      <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                          data-bs-target="#goalDeleteModal{{ $goal->id }}">ゴールの削除</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <x-Modal.Goals.EditModal :goal="$goal" />
          <x-Modal.Goals.DeleteModal :goal="$goal" />
        @endforeach
      </div>
    @endif

  </div>
@endsection
