@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>

  @if (session()->has('success'))
      <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
      </div>
  @endif

  <div class="table-responsive col-lg-8">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3"><svg class="bi mb-1" fill="white"><use xlink:href="#plus-lg"/></svg> Create new post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><svg class="bi" fill="white"><use xlink:href="#eye-fill"/></svg></a>
            
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><svg class="bi" fill="white"><use xlink:href="#pencil-square"/></svg></a>
            
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
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