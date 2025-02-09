@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <a href="/dashboard/posts" class="btn btn-success"><svg class="bi" fill="white"><use xlink:href="#arrow-left"/></svg> Back to all my posts</a>
            <a href="" class="btn btn-warning"><svg class="bi"><use xlink:href="#pencil-square"/></svg> Edit</a>
            <a href="" class="btn btn-danger"><svg class="bi" fill="white"><use xlink:href="#trash3-fill"/></svg> Delete</a>

            <img src="https://picsum.photos/1200/400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3"> {{-- img-fluid agar responsif --}}

            <article class="my-3 fs-5">
                {!! $post->body !!} {{-- tanda {{ !!...!! }} digunakan agar dapat menjalankan <p>, <h1> dll dalam paragraf --}}
            </article>

            
            
            
            <a href="/blog" class="d-block mt-3 text-decoration-none">Back</a> {{-- d-block digunakan agar text turun ke bawah (enter), mt=margin top --}}
        </div>
    </div>
</div>
@endsection