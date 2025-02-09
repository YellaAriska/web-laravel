@extends('layouts.main') {{-- mengambil layout di folder layout agar tidak perlu membuat codingan tampilan yang sama --}}

@section('container')
<h1 class="mb-5">Post Categories</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category) {{-- untuk melooping isi array --}}
        <div class="col-md-4">
            <a href="/blog?category={{ $category->slug }}">
                <div class="card text-bg-dark">
                    <img src="https://picsum.photos/500/500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                    <div class="card-img-overlay d-flex align-items-center p-0"> {{-- alasan membuat flexbox agar isinya menjadi flex item dan bisa disimpan di tengah --}}
                    <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                    {{-- fs=font size --}}
                    </div>
                </div>
            </a>
        </div>
        
        @endforeach
    </div>
</div>

@endsection
