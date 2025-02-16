@extends('layouts.main') {{-- mengambil layout di folder layout agar tidak perlu membuat codingan tampilan yang sama --}}

@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>
 
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
            <div class="input-group mb-3">
                @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category')}}">
                @endif
                @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author')}}">
                @endif
                <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                <button class="btn" style="background-color: #c5aded; color: #290d44" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>

@if ($posts->count()) 
    {{-- membuat kondisi jika postingan > 0 maka akan menampilkan --}}
    <div class="card mb-3">
        @if ($posts[0]->image)
            <div style="max-height:350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
            </div>
        @else
            <img src="https://picsum.photos/1200/400" class="card-img-top" alt="{{ $posts[0]->category->name }}">
        @endif
            
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3> {{-- agar judul mengambil dari post index ke 0 , lalu mengambil titlenya--}}

            <p>
                <small class="text-body-secondary">
                    By. <a href="/blog?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                </small>     
            </p> {{-- memanggil nama kategori dari database --}}

            <p class="card-text">{{ $posts[0]->excerpt }}</p>

            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
        </div>
    </div>


<div class="container">
    <div class="row">
        @foreach ($posts->skip(1) as $post) {{-- untuk melooping isi array, skip(1) untuk skip postingan pertama --}}
        <div class="col-md-4 mb-3"> {{-- md=medium mb=margin bottom--}}
            <div class="card">
                <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.6)">
                    <a href="/blog?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a>
                </div>
                {{-- px=padding samping, py=padding atas bawah  --}}
                
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                @else
                    <img src="https://picsum.photos/500/500?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p>
                        <small class="text-body-secondary">
                            By. <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                        </small>     
                    </p> 
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@else
    {{-- jika postingan = 0 --}}
    <p class="text-center fs-4">No post found.</p> {{-- fs = font size --}}
@endif

<div class="d-flex justify-content-center">
    {{ $posts->links() }} 
    {{-- link untuk pindah halaman --}}
</div>

@endsection
