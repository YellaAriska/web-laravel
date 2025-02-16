@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <a href="/dashboard/posts" class="btn btn-success"><svg class="bi mb-1" fill="white"><use xlink:href="#arrow-left"/></svg> Back to all my posts</a>
            
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><svg class="bi mb-1"><use xlink:href="#pencil-square"/></svg> Edit</a>
            
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you  sure want to delete this post?')"><svg class="bi mb-1" fill="white"><use xlink:href="#trash3-fill"/></svg>Delete</button>
              </form>

            @if ($post->image)
                <div style="max-height:350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                </div>
            @else
                <img src="https://picsum.photos/1200/400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3"> {{-- img-fluid agar responsif --}}
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!} {{-- tanda {{ !!...!! }} digunakan agar dapat menjalankan <p>, <h1> dll dalam paragraf --}}
            </article>
        </div>
    </div>
</div>
@endsection