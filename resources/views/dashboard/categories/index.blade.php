@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
  </div>

  @if (session()->has('success'))
      <div class="alert alert-success col-lg-6" role="alert">
        {{ session('success') }}
      </div>
  @endif

  <div class="table-responsive col-lg-6">
    <a href="/dashboard/categories/create" class="btn btn-primary mb-3"><svg class="bi mb-1" fill="white"><use xlink:href="#plus-lg"/></svg> Create new category</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $category->name }}</td>
          <td>
            <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info"><svg class="bi" fill="white"><use xlink:href="#eye-fill"/></svg></a>
            
            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning"><svg class="bi" fill="white"><use xlink:href="#pencil-square"/></svg></a>
            
            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure want to delete this post?')"><svg class="bi" fill="white"><use xlink:href="#trash3-fill"/></svg></button>
            </form>
          </td>
        </tr>
        @endforeach
    </tbody>
</table>
  </div>

@endsection