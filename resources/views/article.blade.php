@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $post->title }}</h1>

                <p>By. <a href="/blog?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p> {{-- memanggil nama kategori dari database --}}

                @if ($post->image)
                    <div style="max-height:350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>
                @else
                    <img src="https://picsum.photos/1200/400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid"> {{-- img-fluid agar responsif --}}
                @endif
                

                <article class="my-3 fs-5">
                    {!! $post->body !!} {{-- tanda {{ !!...!! }} digunakan agar dapat menjalankan <p>, <h1> dll dalam paragraf --}}
                </article>

                
                
                
                <a href="/blog" class="d-block mt-3 text-decoration-none">Back</a> {{-- d-block digunakan agar text turun ke bawah (enter), mt=margin top --}}
            </div>
        </div>
    </div>

    
@endsection